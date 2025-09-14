<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class JobListing extends Model
{
    use HasFactory;
    use HasSlug;
    protected $table = 'job_listings';
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

    public function profile()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
