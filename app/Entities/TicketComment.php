<?php

namespace TeachMe\Entities;



class TicketComment extends Entity
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
