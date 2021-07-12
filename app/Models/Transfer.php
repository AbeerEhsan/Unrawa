<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Transfer
 * @package App\Models
 * @version September 25, 2020, 5:53 pm UTC
 *
 * @property \App\Models\Category $category
 * @property \App\Models\Driver $driver
 * @property \Illuminate\Database\Eloquent\Collection $transferCategories
 * @property integer $driver_id
 * @property integer $cart_note
 * @property string $day
 * @property string $date
 * @property string $time
 * @property integer $category_id
 * @property string $to
 */
class Transfer extends Model
{
    // use SoftDeletes;

    public $table = 'transfers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'driver_id',
        'cart_note',
        'day',
        'date',
        'time',
        'category_id',
        'to',
        'img'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'driver_id' => 'integer',
        'cart_note' => 'integer',
        'day' => 'string',
        'date' => 'string',
        'time' => 'string',
        'category_id' => 'integer',
        'to' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'driver_id' => 'required',
        'cart_note' => 'required|integer',
        'day' => 'required|string|max:255',
        'date' => 'required|string|max:255',
        'time' => 'required|string|max:255',
        'categories' => 'required',
        'to' => 'nullable|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'img'=> 'mimes:pdf',

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }

    public function categories()
    {
        return $this->belongsToMany(\App\Models\Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function driver()
    {
        return $this->belongsTo(\App\Models\Driver::class, 'driver_id');
    }
    public function forward()
    {
        return $this->belongsTo(\App\Models\Forward::class,'to', 'id' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transferCategories()
    {
        return $this->hasMany(\App\Models\TransferCategory::class, 'transfer_id');
    }
}






