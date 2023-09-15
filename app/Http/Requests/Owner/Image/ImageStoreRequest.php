<?php

declare(strict_types=1);

namespace App\Http\Requests\Owner\Image;

use Illuminate\Foundation\Http\FormRequest;

/**
 * class ImageStoreRequest
 *
 * @package App\Http\Requests\Owner\Image
 */
final class ImageStoreRequest extends FormRequest
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
            'owner_id' => 'required|numeric',
            'title' => 'required|string',
            'image' => 'required|mimes:jpg,bmp,png,gif'
        ];
    }
}
