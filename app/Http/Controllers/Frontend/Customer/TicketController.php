<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\Ticket\TicketCollection;
use Illuminate\Http\Request;
use Auth;

class TicketController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware(function($request, $next) {

            $this->user = Auth::user();

            return $next($request);
        });
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'message' => 'Ticket',
                'status' => 'success',
                'tickets' => new TicketCollection($request->user()->tickets)
            ]);
        }
        return view('frontend.customer.ticket.index');
    }
}
