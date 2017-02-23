<?php

namespace TeachMe\Http\Controllers;

use Illuminate\Http\Request;

use TeachMe\Entities\Ticket;
use TeachMe\Http\Requests;
use TeachMe\Http\Controllers\Controller;

class VotesController extends Controller{

    public function submit($id)
    {
        $ticket = Ticket::findOrFail($id);
        auth()->user()->vote($ticket);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        auth()->user()->unvote($ticket);

        return redirect()->back();
    }
}