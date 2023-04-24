<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id', 'id');
    }

    public function subpartner()
    {
        return $this->belongsTo(Partner::class, 'sub_partner_id', 'id');
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shops_id', 'id');
    }
}
