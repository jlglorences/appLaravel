<?php namespace TeachMe\Http\Controllers;

use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Redirect;
use TeachMe\Entities\Ticket;
use TeachMe\Entities\TicketComment;
use TeachMe\Http\Requests;
use TeachMe\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketsController extends Controller {

	public function latest()
    {
        $tickets = Ticket::orderBy('created_at' , 'DESC')->paginate(20);
        return view('tickets/list', compact('tickets'));
    }

    public function popular()
    {
        return view('tickets/list');
    }

    public function open()
    {
        $tickets = Ticket::where('status', 'open')->orderBy('created_at', 'DESC')->paginate(20);
        return view('tickets/list', compact('tickets'));
    }

    public function closed()
    {
        $tickets = Ticket::where('status', 'closed')->orderBy('created_at', 'DESC')->paginate(20);
        return view('tickets/list', compact('tickets'));
    }

    public function details($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets/details', compact('ticket'));
    }

    public function create()
    {
        return view('tickets/create');
    }

    public function store(Request $request, Guard $auth)
    {
        $this->validate($request, [
           'title' => 'required|max:120'
        ]);

        // Forma optima de implementeacion (hace falta indicar en el modelo que debe permitir la asignacion masiva
        // de los campos 'title' y 'status'
        $ticket = $auth->user()->tickets()->create([
            'title'     => $request->get('title'),
            'status'    => 'open'
        ]);

        // forma mas común para implementarlo
        /*
        $ticket = new Ticket();
        $ticket->title = $request->get('title');
        $ticket->status = 'open';
        $ticket->user_id = $auth->user()->id;
        $ticket->save();
        */

        return Redirect::route('tickets.details', $ticket->id);
    }
}
