<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubGallery extends Model
{
    use HasFactory;

    protected $table = 'tbl_sub_galleries';

    protected $fillable = [
        'gallery_id','image'
    ];


    public function image()
    {
      return (file_exists(public_path('/storage/'.$this->image)))? '/storage/'.$this->image : asset('images/noimgavialable.png');
    }
}
