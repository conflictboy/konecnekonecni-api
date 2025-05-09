<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;

class ContactFormRequest extends BaseRequest
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
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'text' => 'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'firstname' => __('contactForm.firstname'),
            'lastname' => __('contactForm.lastname'),
            'email' => __('contactForm.email'),
            'text' => __('contactForm.text'),
        ];
    }
}
