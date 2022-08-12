<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;


    protected $table = 'tbl_menus';

    protected $fillable = [
        'title', 'status', 'image', 'order', 'parent_id', 'link'
    ];

    public function getTitleAttribute($value)
    {

        return ucwords($value);
    }

    public function gettLinkAttribute($value)
    {
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }else
        {
            return url($value);
        }
    }
    /**
     * Get all of the child for the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childs()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('order');
    }

    /**
     * Get the parent that owns the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Menu::class,'parent_id');
    }

    public static function tree()
    {
        return static::with(implode('.', array_fill(0, 100, 'childs')))->where('parent_id', '=', null)->where('status', '=', 1)->orderBy('order')->get();
    }
}
