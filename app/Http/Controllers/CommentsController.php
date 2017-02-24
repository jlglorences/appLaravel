<?php

namespace TeachMe\Http\Controllers;

use Illuminate\Auth\Guard;
use Illuminate\Http\Request;

use TeachMe\Entities\Ticket;
use TeachMe\Entities\TicketComment;
use TeachMe\Http\Requests;
use TeachMe\Http\Controllers\Controller;
use TeachMe\Repositories\CommentRespository;
use TeachMe\Repositories\TicketRepository;

class CommentsController extends Controller
{

    protected $commentRepository;
    protected $ticketRepository;

    public function __construct(
        TicketRepository $ticketRepository,
        CommentRespository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->ticketRepository = $ticketRepository;
    }

    public function submit($id, Request $request, Guard $auth)
    {
        $this->validate($request, [
            'comment'   => 'required|max:250',
            'link'      => 'url'
        ]);

        $ticket = $this->ticketRepository->findOrFail($id);

        $this->commentRepository->create(
            $ticket,
            $auth->user(),
            $request->get('comment'),
            $request->get('link')
        );

        session()->flash('success', 'Tu comentario fue guardado exitosamente');
        return redirect()->back();
    }
}
