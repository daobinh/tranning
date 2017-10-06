<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return [
            'Name' => 'required|max:100',
            'Price' => 'required|numeric|digits_between:1,2',
            'Photo' => 'required|image|mimes:jpeg,png,gif|max:10240',
            'Description' => 'required|max:300'
        ];
    }

    public function messages(){
        return [
            'Name.required' => 'The Name is required and cannot be empty',
            // 'Name.alpha' => 'Please enter only alphabetic characters',
            'Name.max' => 'The Name must be less than 100 characters',
            'Price.required' => 'The Price is required and cannot be empty',
            'Price.numeric' => 'The Price must be a number',
            'Price.digits_between' => 'The Price must have a length between the given 1 and 2 digits',
            'Photo.required' => 'Please choose a file photo to upload',
            'Photo.mimes' => 'The photo must be in jpeg,png,gif type',
            'Photo.image' => 'Must be photo',
            'Photo.max' => 'The photo must not exceed 10MB in size',
            'Description.required' => 'The Description is required and cannot be empty',
            // 'Description.alpha' => 'Please enter only alphabetic characters',
            'Description.max' => 'The Description must be less than 300 characters'
        ];
        
    }

}
