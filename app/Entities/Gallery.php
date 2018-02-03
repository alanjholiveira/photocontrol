<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Gallery extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = "tb_galleries";

    protected $primaryKey = 'galleryID';

    protected $fillable = [
        'clientID', 'title', 'path', 'obs', 'status'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'clientID', 'clientID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany(Photo::class, 'galleryID', 'galleryID');
    }
}


