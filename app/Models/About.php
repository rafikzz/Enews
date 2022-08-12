<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'tbl_abouts';

    protected $fillable = [
        'image','tagline','brief','content','altimage'
    ];



    public function image()
    {
      return (file_exists(public_path('/storage/'.$this->image)))? '/storage/'.$this->image : asset('image/noimgavialable.png');
    }
}
