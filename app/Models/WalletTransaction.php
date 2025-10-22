<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    use HasFactory;
    protected $table = 'wallet_transactions';
    protected $fillable = [
        'type',
        'wallet_id',
        'amount',
        'description',
        'status',
    ];
    public function wallet(){
        return $this->belongsTo(Wallet::class);
    }
}
