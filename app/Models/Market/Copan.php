<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Copan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable= ['code', 'amount', 'discount_ceiling', 'amount_type', 'status', 'type', 'user_id', 'start_date', 'end_date'];
}
