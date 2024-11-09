<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistrictStoreRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:400'],
            'status' => ['required', 'in:active,disabled'],
            'divison_id' => ['required', 'integer', 'exists:divisons,id'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'status' => $this->input('status') 
                        ? $this->input('status') == "on" 
                        ? 'active' : 'disabled' : 'disabled',
        ]);
    }
}
