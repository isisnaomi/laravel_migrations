<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
          'name' => 'required|string',
          'price' => 'required|numeric|min:0',
          'description' => 'required|string',
          'seller' => 'required|exists:sellers',
          'tags'=> 'required|exists:tags',
      ];
    }
}