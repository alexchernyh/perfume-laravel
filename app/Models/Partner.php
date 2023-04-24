<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

   /* public function partnerOperation()
    {
        return $this->belongsTo(PartnerOperation::class);
    }*/

    public function partner_operation()
    {
        return $this->hasMany(PartnerOperation::class)->orderByDesc('id');
    }

    public function partner_category()
    {
        return $this->belongsTo(PartnerCategory::class, 'partner_categories_id', 'id');
    }
    // 1 - perfume
    public function partner_shop1()
    {
        return $this->belongsTo(PartnerCategory::class, 'project1_category', 'id');
    }

    // 2 - bioniks
    public function partner_shop2()
    {
        return $this->belongsTo(PartnerCategory::class, 'project2_category', 'id');
    }
}
