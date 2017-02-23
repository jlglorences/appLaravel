<?php

namespace TeachMe\Entities;



class TicketComment extends Entity
{

    protected $fillable = ['comment', 'link'];

    public function ticket()
    {
        return $this->belongsTo(User::getClass());
    }

    public function user()
    {
        return $this->belongsTo(User::getClass());
    }
}
