<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'tbl_settings';

    protected $fillable = [
        'logo','contact_information','office_location'
    ];

    public function getOfficeLocationAttribute($value)
    {
        return ucwords($value);
    }

    public function logo()
    {
      return (file_exists(public_path('/storage/'.$this->logo)))? '/storage/'.$this->logo : asset('image/noimgavialable.png');
    }
}
