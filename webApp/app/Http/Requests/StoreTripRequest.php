<?php

namespace App\Http\Requests;

use App\Models\Car;
use Illuminate\Foundation\Http\FormRequest;

class StoreTripRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $car = Car::find($this->car_id);
        return $this->user()->id == $car->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "start_location" => "required|string",
            "end_location" => "required|string",
            "start_time" => "required|date",
            "end_time" => "required|date",
            "price" => "required|numeric",
            "car_id" => "required|integer"
        ];
    }
}
