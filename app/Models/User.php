<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 根据账号获取用户信息
     * @param $name
     * @return mixed
     * author tingfeng <wuzunlin@foxmail.com>
     * created time: 2017/9/5 10:29
     */
    public static function getByName($name)
    {
        $result = self::where('name', $name)->first();
        return $result;
    }
}
