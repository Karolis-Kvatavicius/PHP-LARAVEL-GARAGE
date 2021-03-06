<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TruckRequest extends FormRequest
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
            //visi fieldai required
            'truck_make_year' => 'required|numeric',
            'truck_maker' => 'required|alpha',
            'truck_plate' => 'required|regex:/^\w+\-\d+$/',
            'truck_mech_notices' => 'required',
            'mechanic' => 'required'    
        ];
    }
}
