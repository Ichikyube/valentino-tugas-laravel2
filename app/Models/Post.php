<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Sluggable, HasTrixRichText;

    protected $guarded = ['id'];
    protected $fillable = ['title','slug','description', 'media_file', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    // public function scopeFilter($query, array $filters)
    // {

    //     $query->when($filters['search'] ?? false, function ($query, $search) {
    //         return $query->where('title', 'ilike', '%' . $search . '%')
    //             ->orWhere('body', 'ilike', '%' . $search . '%');
    //     });
    // }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($post) {
            $post->trixRichText->each->delete();
            $post->trixAttachments->each->purge();
        });
    }
}
