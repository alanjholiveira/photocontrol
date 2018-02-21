<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $table = "tb_contracts";

    protected $primaryKey = 'contractID';

    protected $fillable = [
        'clientID', 'code', 'name', 'contract', 'filename', 'obs', 'status'
    ];

    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'clientID', 'clientID');
    }

}
