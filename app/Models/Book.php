<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'year',
        'price',
        'img_path',
        'view_count',
        'status',
        'author_id',
        'status',
    ];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id')->first();
    }

    public function getImageUrlAttribute()
    {
        return asset('public' . Storage::url($this->img_path));
    }

    public function getUserHasActionsAttribute(): bool
    {
        return Auth::user()->id === $this->author_id || Auth::user()->role === 'admin';
    }
}
