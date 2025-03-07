<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    public function user()
        {
        return $this->belongsTo(User::class);
        }
       
        public function customer()
        {
        return $this->belongsTo(Customer::class);
        }

        public function suppliers()
        {
        return $this->belongsTo(Supplier::class);
        }

        public function services()
        {
        return $this->belongsTo(Service::class);
        }
}
