<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable =
        [
        'id','title','description','salary','rolse','address','deadline','image','job_type','user_id'
        ];

    public function users(){
        return $this->belongsToMany(User::class,'listing_user','listing_id','user_id')
            ->withPivot('interview')
            ->withTimestamps();
    }
}
