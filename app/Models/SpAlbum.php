<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class SpAlbum extends Base
{
    /**
     * 获取分类最新数据
     * @param int $number
     * @return array
     */
    public static function getCategoryDatas($number = 10)
    {
        $cates = SpVideoType::get();
        $data = [];
        foreach ($cates as $key => $item){
            $data[$item->id] = self::getByTypeId($item->id, $number);
        }
        return $data;
    }

    /**
     * 根据类型ID获取数据
     * @param $id
     * @param int $limit
     * @return mixed
     */
    public static function getByTypeId($id, $limit = 10){
        $result = self::where('type_id', $id)->limit($limit)->orderBy('id', 'desc')->get();
        return $result;
    }

    public static function getHots()
    {
        
    }

    public static function getRandTitle()
    {
        $result = self::orderBy(DB::Raw('rand()'))->limit(1)->value('title');
        return $result;
    }
}
