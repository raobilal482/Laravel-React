<?php

namespace App\Models;

use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /** @use HasFactory<\Database\Factories\PropertyFactory> */
    use HasFactory;

    protected $table = 'listings';
    protected $guarded = ['id'];
    protected $casts = [
    'address' => 'json', // Ya 'array' bhi likh sakte hain
    'meta' => 'json',
    'is_managed' => 'boolean',
];

   public function types()
{
    return $this->belongsTo(Type::class, 'type_id', 'id');
}
public function owner()
    {
        return $this->belongsTo(User::class)->where('type', 'Property Owner')->orderBy('name', 'asc');
    }
}
