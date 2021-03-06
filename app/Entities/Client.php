<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $table = "tb_clients";

    protected $primaryKey = 'clientID';

    protected $fillable = [
        'firstname', 'lastname', 'companyname', 'phonenumber', 'address1', 'address2', 'city', 'postcode', 'password'
    ];

    protected $hidden = [
        'password',
    ];

    protected $dates = ['deleted_at'];

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return ucfirst($this->firstname) . ' ' . ucfirst($this->lastname);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'clientID', 'clientID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts()
    {
        return $this->hasMany(Contract::class, 'clientID', 'clientID');
    }


}
