<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    const SEX_UN = 30;
    const SEX_BOY = 10;
    const SEX_GRIL = 20;


    //指定表名
    protected  $table = 'student';
    //指定主键
    protected  $primaryKey = 'id';
    //自动维护时间戳
    public  $timestamps = true;
    //指定允许批量赋值的字段
    protected $fillable = ['name','age'];
    //指定不允许批量赋值的字段
    protected $guarded = [];
    //更改时间戳
    protected function  getDateFormat()
    {
        return time();
    }

    protected  function asDateTime($value)
    {
        return $value;
    }

    public function sex($ind = null) {

        $arr = [
            self::SEX_UN => '未知',
            self::SEX_BOY => '男',
            self::SEX_GRIL => '女',
        ];

        if ($ind !== null) {
            return array_key_exists($ind, $arr) ? $arr[$ind] : $arr[self::SEX_UN];
        }

        return $arr;
    }

}
