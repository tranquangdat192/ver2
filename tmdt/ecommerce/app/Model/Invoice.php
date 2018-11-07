<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'guest_id', 'total', 'detail'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function userId()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function guestId()
    {
        return $this->belongsTo('App\Model\Guest','guest_id');
    }
}
