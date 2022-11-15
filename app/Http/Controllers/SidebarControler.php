<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Ticket;
use Illuminate\Support\Carbon;

class SidebarControler extends Controller
{
    protected $desc = "This controller is for sidebar, return the count or each section. eg order statuesed";

    public function ticketStatusCount()
    {
        $data = [
            "totalTickets" => Ticket::count(),
            "pendingTickets" => Ticket::whereStatus(0)->count(),
            "approvedTickets" => Ticket::whereStatus(1)->count(),
            "canceledTickets" => Ticket::whereStatus(2)->count(),
        ];

        return response()->json($data);
    }
}
