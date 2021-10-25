<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\StoreCustomer;

class StoreCustomer extends FormRequest
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
          'code' => 'required',
          'company_name' => 'required',
          'name' => 'required',
          'country' => 'required',
          'state' => 'required',
          'state' => 'required',
          'city' => 'required',
          'email' => 'required',
          'phone' => 'required',
          'currency' => 'required',
        ];
    }
}
