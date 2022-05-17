<?php

namespace App\Models\Ticket;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    
    protected $fillable= ['subject', 'description', 'status', 'seen', 'reference_id', 'user_id', 'category_id', 'priority_id', 'ticket_id'];

    public function admin(){
        return $this->belongsTo(TicketAdmin::class, 'reference_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(TicketCategory::class);
    }

    public function priority(){
        return $this->belongsTo(TicketPeriority::class);
    }

    public function parent(){
        return $this->belongsTo($this, 'ticket_id')->with('parent');
    }

    public function children(){
        return $this->hasMany($this, 'ticket_id')->with('children');
    }
}
