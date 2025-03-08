<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasFactory, Notifiable;

    use HasSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('judul') // Field to generate the slug from
            ->saveSlugsTo('slug'); // Field to store the slug in the database
    }

    protected $primaryKey = 'post_id'; // Specify the custom primary key
    public $incrementing = true; // Ensure Laravel knows the primary key is auto-incrementing
    protected $keyType = 'int'; // Specify the data type of the primary key
    protected $date = ['created_at'];
    protected $table = 'posts';
    /**
     * Get the options for generating the slug.
     */
   
    
    
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id_user',
        'judul',
        'thumbnail',
        'content',
        'slug',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
