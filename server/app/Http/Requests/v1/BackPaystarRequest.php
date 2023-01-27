<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckCardNumber;

class BackPaystarRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'status'            => 'required',
            'order_id'          => 'required',
            'ref_num'           => 'required',
            'transaction_id'    => 'required',
            'card_number'       => ['required', new CheckCardNumber()],
            'tracking_code'     => 'required',
        ];
    }
}
