<?php

namespace App\Models;

use App\Models\Market\Order;
use App\Models\Payment\Payment;
use App\Models\Ticket\Ticket;
use App\Models\Ticket\TicketAdmin;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'email',
        'password',
        'mobile',
        'first_name',
        'last_name',
        'profile_photo_path',
        'activation',
        'user_type',
        'status',
        'current_team_id',
        'email_verified_at',
        'mobile_verified_at',
        'national_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }

    public function ticket(){
        return $this->hasOne(TicketAdmin::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
