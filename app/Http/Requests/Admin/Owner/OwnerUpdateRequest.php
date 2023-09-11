<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin\Owner;

use Illuminate\Foundation\Http\FormRequest;

class OwnerUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|int',
            'name' => 'required|string',
            'email' => 'required|string|email'
        ];
    }
}
