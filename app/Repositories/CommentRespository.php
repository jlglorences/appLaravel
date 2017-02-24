<?php
/**
 * Created by PhpStorm.
 * User: jlorences
 * Date: 24/02/2017
 * Time: 11:57
 */

namespace TeachMe\Repositories;


use TeachMe\Entities\Ticket;
use TeachMe\Entities\TicketComment;
use TeachMe\Entities\User;

class CommentRespository extends BaseRepository{

    public function getModel()
    {
        return new TicketComment();
    }

    public function create(Ticket $ticket, User $user, $comment, $link = '')
    {
        $comment = new TicketComment(compact('comment', 'link'));
        $comment->user_id = $user->id();
        $ticket->comments()->save($comment);
    }

}