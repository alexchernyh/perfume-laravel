<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerOperation extends Model
{
    use HasFactory;

    /*public function rewardOperation()
    {
        return $this->hasOne(RewardOperation::class);
    }*/

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id', 'id');
    }

    public function partner_operation()
    {
        return $this->belongsTo(RewardOperation::class, 'reward_operations_id', 'id');
    }
}
