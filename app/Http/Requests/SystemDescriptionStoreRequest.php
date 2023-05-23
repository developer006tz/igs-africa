<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SystemDescriptionStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'other' => ['nullable', 'max:255', 'string'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
