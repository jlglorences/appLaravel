<?php

namespace TeachMe\Http\Controllers;

use Illuminate\Http\Request;

use TeachMe\Entities\Ticket;
use TeachMe\Http\Requests;
use TeachMe\Http\Controllers\Controller;
use TeachMe\Repositories\TicketRepository;
use TeachMe\Repositories\VoteRepository;

class VotesController extends Controller{

    protected $ticketRepository;
    protected $voteRepository;

    function __construct(TicketRepository $ticketRepository, VoteRepository $voteRepository)
    {
        $this->ticketRepository = $ticketRepository;
        $this->voteRepository = $voteRepository;
    }

    public function submit($id)
    {
        $ticket = $this->ticketRepository->findOrFail($id);
        $this->voteRepository->vote(auth()->user(), $ticket);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $ticket = $this->ticketRepository->findOrFail($id);
        $this->voteRepository->unvote(auth()->user(), $ticket);

        return redirect()->back();
    }
}
