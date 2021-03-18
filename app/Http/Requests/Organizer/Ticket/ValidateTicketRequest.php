<?php

namespace App\Http\Requests\Organizer\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class ValidateTicketRequest extends FormRequest
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
            'event' => 'required|exists:events,id',
            'ticket' => 'required|exists:tickets,code'
        ];
    }

    public function messages()
    {
        return [
          'event.exists' => 'Invalid event selected',
          'ticket.exists' => 'Invalid ticket code',
          'ticket.required' => 'Enter Ticket Code'
        ];
    }
}
