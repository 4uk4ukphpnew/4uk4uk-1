<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserMarketplaceAdRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'gender_id' => 'required',
            'active' => 'required',
            'featured_image' => 'required',
        ];
    }
}
