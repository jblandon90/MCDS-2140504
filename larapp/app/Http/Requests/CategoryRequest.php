<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        if ($this->method() == 'PUT') {
            // Edit Form
             return [
            'name' => 'required',
            'description' => 'required',
            'image' => 'max:1000',
            ];
            } else {
            // Create Form
            return [
                'name' => 'required',
                'description' => 'required',
                'image' => 'max:1000',
        ];
        }
        
        }
    
        public function messages() {
            return [
                'name.required' => 'El campo ":attribute" es obligatorio.',
                'description.required'    => 'El campo "Description" es obligatorio.'
            ];
        }
    
        public function attributes() {
            return [
                'name' => 'Nombre Completo'
            ];
        }
    
    }