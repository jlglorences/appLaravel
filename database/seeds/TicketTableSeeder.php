<?php

use Illuminate\Database\Seeder;
use TeachMe\Entities\Ticket;

class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ticket::class, 50)->create();
    }
}
