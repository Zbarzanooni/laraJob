<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable =
        [
        'title','description','salary','rolse','address','deadline','image','job_type','user_id'
        ];
}
