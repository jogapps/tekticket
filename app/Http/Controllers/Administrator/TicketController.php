<?php

namespace App\Http\Controllers\Administrator;

use App\Model\Ticket;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::orderBy('created_at', 'desc')->get();
        return view('backend.tickets.index', compact('tickets'));
    }
}
