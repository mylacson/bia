<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'posts';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'device_id',
        'name',
        'time_start',
        'time_end',
        'status',
        'money',
        'created_by',
        'updated_by',
    ];
}
