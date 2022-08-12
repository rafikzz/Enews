<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'tbl_categories';

    protected $fillable = [
        'title', 'slug', 'order', 'status'
    ];

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function news()
    {
        return $this->hasMany(Page::class, 'category_id');
    }

    public function active_news()
    {
        return $this->hasMany(Page::class, 'category_id')->where('status',1);
    }

    public function get_news()
    {
        return $this->hasMany(Page::class, 'category_id')->where('status',1)->orderBy('order')->take(5);
    }

}
