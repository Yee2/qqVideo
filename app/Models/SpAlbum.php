<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class SpAlbum extends Base
{
    const StatusIng = 1;//更新中
    const StatusEd = 2;//完结

    const TypeMovie = 1;//电影
    const TypeTv = 2;//电视剧
    const TypeCartoon = 3;//动漫
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

    /**
     * 获取随机标题
     * @return mixed
     * author tingfeng <wuzunlin@foxmail.com>
     * created time: 2017/8/31 15:40
     */
    public static function getRandTitle()
    {
        $result = self::orderBy(DB::Raw('rand()'))->limit(1)->value('title');
        return $result;
    }
}
