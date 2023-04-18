<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderFormRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'sugar' => ['required', ],
            'quantity' => ['required', 'integer'],
            'order_id' => ['required', ],
            'product_id' => ['required', ],
            'popping_id'  => ['required', ],
            'size_id' => ['required', ],
        ];
    }
}
