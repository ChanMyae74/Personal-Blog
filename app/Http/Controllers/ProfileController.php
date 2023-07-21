<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfileController extends Controller
{


    public function index()
    {
        if (!\auth()->user()->isAdministrator()) {
            return abort(401, 'YOUR ACCOUNT IS NOT AUTHORIZED');
        } else {
            return \view('User.index', [
                'users' => User::all()
            ]);
        }
    }

    public function create()
    {
        if (!\auth()->user()->isAdministrator()) {
            return abort(401, 'YOUR ACCOUNT IS NOT AUTHORIZED');
        } else {
            return \view('user.create');
        }
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'uuid' => Str::uuid()->toString(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return \redirect()->route('users.index')->with('success', 'User Created Successfully');
    }

    /**
     * Update the user's profile information.
     */
    public function userEdit(User $user)
    {
        if (!\auth()->user()->isAdministrator()) {
            return abort(401, 'YOUR ACCOUNT IS NOT AUTHORIZED');
        } else {
            return \view('User.edit',
                [
                    'user' => $user,
                    'roles' => Role::all()
                ]);
        }
    }

    public function userUpdate(Request $request, User $user)
    {
        if (!\auth()->user()->isAdministrator()) {
            return abort(401, 'YOUR ACCOUNT IS NOT AUTHORIZED');
        } else {
            try {
                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'role' => ['required', 'string', 'max:255'],
                ]);
                $role = Role::find($request->role);
                $user_param = [
                    'name' => $request->name,
                    'email' => $request->email,
                ];
                $user->update([...$user_param, 'role' => $role->name]);
            } catch (QueryException $queryException) {
                dd($queryException);
            }
            return \redirect()->route('users.index')->with('success', 'User Updated Successfully');
        }
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
