<?php

namespace TeachMe\Entities;

class TicketVote extends Entity
{
    public function ticket()
    {
        return $this->belongsTo(User::getClass());
    }

    public function user()
    {
        return $this->belongsTo(User::getClass());
    }
}
