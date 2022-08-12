<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    use HasFactory;

    protected $table = 'tbl_views';
    public $timestamps = false;
    protected $fillable = [
        'user_id','page_id'
    ];




}
