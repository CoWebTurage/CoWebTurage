<?php

namespace App\Http\Requests\Message;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MessageSendRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'receiver_id' => ['string', 'max:255'],
            'body' => ['string', 'max:255'],
            'location' => ['string', 'max:255', 'nullable']
        ];
    }
}
