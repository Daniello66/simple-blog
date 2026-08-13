<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Autorizar al usuario para realizar la validación.
     *
     * @return bool
     * @author Daniel Beltrán
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Reglas de validación.
     *
     * @return array
     * @author Daniel Beltrán
     */
    public function rules(): array {
        return [
            'category_id' => 'required|integer',
            'title'       => 'required|string|min:5|max:60',
            'content'     => 'required|string|min:10'
        ];
    }
}
