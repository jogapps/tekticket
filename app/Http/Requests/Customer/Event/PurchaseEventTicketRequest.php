<?php

namespace App\Http\Requests\Customer\Event;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseEventTicketRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => 'random-slug',
            'event_status_is_open' => $this->route('event')->status == OPEN,
            'event_ticket_status_is_not_closed' => $this->route('event')->ticket_status != CLOSED,
            'event_price_is_on_sale' => $this->route('eventPrice')->is_on_sale
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'quantity' => 'required|numeric',
            'event_status_is_open' => 'accepted',
            'event_ticket_status_is_not_closed' => 'accepted',
            'event_price_is_on_sale' => 'accepted'
        ];
    }

    public function messages()
    {
        return [
            'event_status_is_open.accepted' => 'This is event is either closed or has been postponed',
            'event_ticket_status_is_not_closed.accepted' => 'Ticket sales is closed for this event',
            'event_price_is_on_sale.accepted' => 'You can no longer purchase this ticket for this event, try another ticket',
        ];
    }


}
