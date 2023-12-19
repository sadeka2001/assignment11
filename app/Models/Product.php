<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sells;

class Product extends Model
{
    use HasFactory;
    use HasFactory;
    protected  $fillable = [
        'name',
        'price',
        'quantity',
        
    ];

    public function sells()
    {
        return $this->hasMany(Sells::class);
    }
}
