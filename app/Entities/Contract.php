<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Contract extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = "tb_contracts";

    protected $primaryKey = 'contractID';

    protected $fillable = [
        'clientID', 'code', 'name', 'contract', 'filename', 'obs', 'status'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'clientID', 'clientID');
    }

}
