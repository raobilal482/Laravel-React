<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'listings';
    protected $guarded = ['id'];

    protected $casts = [
        'address' => 'array',
        'meta' => 'array',
        'is_managed' => 'boolean',
    ];

    public function types(){
        return $this->belongsTo(Type::class,'type_id','id');
    }
}
