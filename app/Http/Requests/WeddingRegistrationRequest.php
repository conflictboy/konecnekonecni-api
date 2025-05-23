<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;

class WeddingRegistrationRequest extends BaseRequest
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
            'escorts' => 'array',
            'escorts.*.firstname' => 'required|string',
            'escorts.*.lastname' => 'required|string',
            'children' => 'array',
            'children.*.name' => 'required|string',
            'isAttending' => 'required|boolean',
            'transport' => 'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'firstname' => __('weddingRegistrationForm.firstname'),
            'lastname' => __('weddingRegistrationForm.lastname'),
            'escorts.*.firstname' => __('weddingRegistrationForm.escortFirstname'),
            'escorts.*.lastname' => __('weddingRegistrationForm.escortLastname'),
            'children.*.name' => __('weddingRegistrationForm.childrenName'),
            'isAttending' => __('weddingRegistrationForm.isAttending'),
            'transport' => __('weddingRegistrationForm.transport'),
        ];
    }
}
