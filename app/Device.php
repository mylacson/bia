<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    const CHUACHOI = 1;
    const DANGCHOI = 2;
    const DANGSUACHUA = 3;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'devices';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'created_by',
        'updated_by',
    ];

    public static function getList(){
        return self::query()->get();
    }

    public static function getByPk($pk)
    {
        return self::find($pk);
    }

    public function getPost()
    {
        return Post::where('device_id',$this->id)->orderBy('created_at','desc')->first();
    }

}
