<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreContentRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'bail',
                'string',
                'required',
                'max:255',
            ],
            'caption' => [
                'bail',
                'string',
                'required',
            ],
            'photo' => [
                'bail',
                'required',
                'image',
            ],
            'prompt' => [
                'bail',
                'max:255',
                'string',
                'nullable',
            ],
        ];
    }
}
