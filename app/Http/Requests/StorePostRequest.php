<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
//        dd(auth()->user()->isAdministrator());
        if (auth()->user()->isAdministrator() || auth()->user()->isAuthor()) {
            return true;
        } else {
            abort(403, 'YOUR ACCOUNT IS UNAUTHORIZED');
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required|min:3|unique:posts,title",
            "category" => "required|exists:categories,id",
            "body" => "required|min:3",
            "description" => "required|min:10",
        ];
    }
}
