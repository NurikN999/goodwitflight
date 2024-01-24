<?php

namespace App\Http\Requests;

use App\Enums\StateType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class ApplicationUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'state' => ['string', new Enum(StateType::class)],
            'description' => 'string|nullable',
            'phone_number' => 'string|nullable',
            'email' => 'string|nullable',
        ];
    }
}
