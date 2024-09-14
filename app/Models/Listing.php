<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;

class Listing extends Model
{
    use HasSlug;
    use HasFactory ;
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
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
