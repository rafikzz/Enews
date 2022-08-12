<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'tbl_galleries';

    protected $fillable = [
        'title','status','image','order'
    ];

    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

    public function image()
    {
      return (file_exists(public_path('/storage/'.$this->image)))? '/storage/'.$this->image : asset('image/noimgavialable.png');
    }

    /**
     * Get all of the subgalleries for the Gallery
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subgalleries()
    {
        return $this->hasMany(SubGallery::class);
    }
}
