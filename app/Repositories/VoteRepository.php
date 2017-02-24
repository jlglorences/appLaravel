<?php
/**
 * Created by PhpStorm.
 * User: jlorences
 * Date: 24/02/2017
 * Time: 12:15
 */

namespace TeachMe\Repositories;


use TeachMe\Entities\Ticket;
use TeachMe\Entities\User;

class VoteRepository
{
    public function vote(User $user, Ticket $ticket)
    {
        if($user->hasVoted($ticket)) return false;

        $user->voted()->attach($ticket);
        return true;
    }

    public function unvote(User $user, Ticket $ticket)
    {
        $user->voted()->detach($ticket);
    }
}