<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

use App\Notifications\PasswordReset; // Or the location that you store your notifications (this is default).


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
   
/**
 * Send the password reset notification.
 *
 * @param  string  $token
 * @return void
 */
public function sendPasswordResetNotification($token)
{
    $this->notify(new PasswordReset($token));
}

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

     
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'external_id',
        'external_auth',
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

    protected $withCount = ['auspiciadors'];
    

    //relacion uno a uno

    public function vendedor(){
        return $this->hasOne('App\Models\Vendedor');
    }

    public function serie(){
        return $this->hasOne('App\Models\Serie');
    }

    public function evento(){
        return $this->hasOne('App\Models\Evento');
    }

    public function socio(){
        return $this->hasOne('App\Models\Socio');
    }

    public function strava(){
        return $this->hasOne('App\Models\AtletaStrava');
    }

    public function lote(){
        return $this->hasOne('App\Models\Lote');
    }

    

    //relacion uno a muchos

    public function seriesby(){
        return $this->hasMany('App\Models\Serie');
    }

    public function eventosby(){
        return $this->hasMany('App\Models\Evento');
    }
    
    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }

    public function mantencions(){
        return $this->hasMany('App\Models\Mantencion');
    }

    public function comentarios(){
        return $this->hasMany('App\Models\Comentario');
    }

    public function reactions(){
        return $this->hasMany('App\Models\Reaction');
    }

    public function pedidos(){
        return $this->hasMany('App\Models\Pedido');
    }

    public function gastos(){
        return $this->hasMany('App\Models\Gasto');
    }

    public function retiros(){
        return $this->hasMany('App\Models\Retiro');
    }

    public function pagos(){
        return $this->hasMany('App\Models\Pago');
    }

    public function pista_staffs(){
        return $this->hasMany('App\Models\Pista_staff');
    }

    public function vehiculos(){
        return $this->hasMany('App\Models\Vehiculo');
    }

    public function tickets(){
        return $this->hasMany('App\Models\Ticket');
    }

    public function filmmakers(){
        return $this->hasMany('App\Models\Filmmaker');
    }
    

    //relacion Muchos a muchos

    public function serie_enrolled(){
        return $this->belongsToMany('App\Models\Serie');
    }

    public function evento_enrolled(){
        return $this->belongsToMany('App\Models\Evento');
    }
    
    public function videos(){
        return $this->belongsToMany('App\Models\Video');
    }

    //relacion uno a uno polimorfica
    public function auspiciadors(){
        return $this->morphMany('App\Models\Auspiciador','auspiciadorable');
    }

    
}
