<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id',
        'cover'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    public static function getUniqueSlugFrom($value) {
        $slug = Str::slug($value);
        $slug_modificato = $slug;
        $post_esistente = Post::where('slug', $slug)->first();
        $counter = 1;
        while ( $post_esistente ) {
            $slug_modificato = $slug . '-' . $counter;
            $post_esistente = Post::where('slug', $slug_modificato)->first();
            $counter++;
        }
        return $slug_modificato;
    } 

    public function getCoverPathAttribute() {
        return $this->cover ? Storage::disk('images')->url($this->cover) : null;
    }

    public function getDateAttribute() {
        return $this->created_at->format('d/m/Y');
    }

    protected $appends = ['date', 'cover_path'];
}
