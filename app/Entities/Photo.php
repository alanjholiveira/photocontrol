<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Photo extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = "tb_photos";

    protected $primaryKey = 'photoID';

    protected $fillable = [
        'galleryID', 'filename', 'extension', 'mime', 'confirmation'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'galleryID', 'galleryID');
    }
}


