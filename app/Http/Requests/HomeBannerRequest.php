<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeBannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        'title' => 'required|string|max:255',
        'slogan' => 'required|string|max:255',
        'button' => 'required|string|max:255',
        'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
