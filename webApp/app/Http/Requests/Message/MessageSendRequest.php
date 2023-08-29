<?php

namespace App\Http\Requests\Message;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MessageSendRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'sender' => ['string', 'max:255'],
            'receiver' => ['string', 'max:255'],
            'body' => ['string', 'max:255'],
        ];
    }
}
