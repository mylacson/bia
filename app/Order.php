<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'orders';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'product_id',
        'created_by',
        'updated_by',
    ];
}
