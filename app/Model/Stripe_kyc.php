<?php

namespace App\Model;



use Illuminate\Database\Eloquent\Model;

class Stripe_kyc extends Model
{
    protected $table = 'stripe_kyc';
    protected $fillable = [
        'user_id', 'varification_status',
    ];
}