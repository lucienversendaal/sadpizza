<?php

namespace App\Http\Requests;

use App\Rules\IsValidSize;
use App\Rules\IsValidTopping;
use Illuminate\Foundation\Http\FormRequest;

class StorePizzaRequest extends FormRequest
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
            'address' => 'required',
            'size' => ['required', 'in:medium,large,extra-large'],
            'toppings'=> ['nullable', new IsValidTopping()],
        ];
    }
}
