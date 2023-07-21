<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(auth()->user()->isUser()){
            return ResponseAlias::HTTP_UNAUTHORIZED;
        }else{
            return true;
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
            "title" => "required|min:3|unique:posts,title,".$this->route('post')->id,
            "category"=> "required|exists:categories,id",
            "description"=> "required|min:10",
            "body"=> "required|min:3"
        ];
    }
}
