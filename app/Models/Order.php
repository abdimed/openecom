<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Mpdf\Mpdf as PDF;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function variations()
    {
        return $this->belongsToMany(Variation::class)->withPivot('qty', 'amount');
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

}
