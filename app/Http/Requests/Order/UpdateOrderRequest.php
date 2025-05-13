<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'driver_id' => 'required|exists:drivers,id',
            'user_id' => 'required|exists:users,id',
            'order_name' => 'required|string',
            'type' => 'required|in:urgent,normal',
            'status'=>'required|in:delivered,failed',
            'delivery_date'=>'nullable|date',

        ];
    }
}
