<?php

namespace App\Models;

class SpVideoType extends Base
{
    /**
     * 根据ID获取名称
     * @param $id
     * @return mixed
     */
    public static function getNameById($id)
    {
        $result = self::find($id);
        return $result->name;
    }
}
