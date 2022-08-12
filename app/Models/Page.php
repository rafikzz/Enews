<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'tbl_pages';

    protected $fillable = [
        'title','status','slug','image','order','brief','content','category_id'
    ];

    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

    /**
     * Get the category that owns the Page
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function image()
    {
      return (file_exists(public_path('/storage/'.$this->image)))? '/storage/'.$this->image : asset('images/noimgavialable.png');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function isViewedBy(User $user)
    {
       return (bool)$user->page_views->where('page_id', $this->id)->count();
    }

    public function page_views()
    {
        return $this->hasMany(PageView::class,'page_id');
    }
}
