<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            //Edit Form
            return [
                'name' => 'required',
                'description' => 'required',
                'image' => 'max:1000',
                'user_id' => 'required',
                'category_id' => 'required',
                'slider' => 'required',
                'price' => 'required|numeric|min:1|max:99'
            ];
        } else {
            //Create Form
            return [
                'name' => 'required|unique:games,name',
                'description' => 'required',
                'image' => 'required|image|max:1000',
                'user_id' => 'required',
                'category_id' => 'required',
                'slider' => 'required',
                'price' => 'required|numeric|min:1|max:99'
            ];
        }
    }

    public function messages() {
        return[
            'name.required' => 'El campo :attribute es obligatorio',
            'description.required' => 'El campo :attribute es obligatorio',
            'image.required' => 'El campo :attribute es obligatorio',
            'user_id.required' => 'El campo :attribute es obligatorio',
            'category.required' => 'El campo :attribute es obligatorio',
            'slider.required' => 'El campo :attribute es obligatorio',
            'price.required' => 'El campo :attribute es obligatorio'
        ];
    }

    public function attributes() {
        return [
            'name'        => 'Nombre Categoría',
            'description' => 'Descripción',
            'image'       => 'Imagen',
            'user_id'     => 'Usuario',
            'category_id' => 'Categoría',
            'slider'      => 'Slider',
            'price'       => 'Precio'
        ];
    }
}