<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketPeriority extends Model
{
    use HasFactory, SoftDeletes;

    protected $table= 'ticket_priorities';

    protected $fillable= ['status','name'];
}
