<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'products';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'unit',
        'amount',
        'money',
        'description',
        'created_by',
        'updated_by',
    ];
}
