<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public function sales()
    {
    return $this->belongsToMany(Sale::class);
    }
    public function suppliers()
        {
        return $this->belongsToMany(Supplier::class);
        }
}
