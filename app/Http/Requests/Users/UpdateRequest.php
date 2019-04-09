<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'sometimes|string|min:3',
            'username' => 'sometimes|string|min:3',
            'city' => 'nullable|string',
            'zip' => 'nullable|string',
            'country' => 'nullable|string',
            'company' => 'nullable|string',
            'address' => 'nullable|string',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'biography' => 'nullable|string',
            'github_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'facebook_link' => 'nullable|url',
            'web_link' => 'nullable|url',
            'is_hireable' => 'nullable|boolean',
        ];
    }
}
