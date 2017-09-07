<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class SpAlbum extends Base
{
    use SoftDeletes;
    const StatusIng = 1;
    const StatusEd = 2;
    const TypeMovie = 1;
    const TypeTv = 2;
    const TypeDm = 3;
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
     * 随机标题
     * @return mixed
     */
    public static function getRandTitle()
    {
        $result = self::orderBy(DB::Raw('rand()'))->limit(1)->value('title');
        return $result;
    }

    /**
     * 获取随机数据
     * @param $limit 返回条数
     * @return mixed
     */
    public static function getRand($limit)
    {
        $result = self::orderBy(DB::Raw('rand()'))->limit($limit)->get();
        return $result;
    }
    /**
     * 优酷类型
     * @param int $item
     * @return mixed
     */
    public static function getTypeYouku($item = 0){
        $map = [
            [
                'id' => SpAlbum::TypeMovie,
                'type' => '96',
                'desc' => '电影'
            ],
            [
                'id' => SpAlbum::TypeTv,
                'type' => '97',
                'desc' => '电视剧'
            ],
            [
                'id' => SpAlbum::TypeDm,
                'type' => '100',
                'desc' => '动漫'
            ],
        ];
        return $map[$item];
    }

    /**
     * 腾讯视频类型
     * @param int $item
     * @return mixed
     */
    public static function getTypeQq($item = 0){
        $map = [
            [
                'id' => SpAlbum::TypeMovie,
                'type' => 'movie',
                'desc' => '电影'
            ],
            [
                'id' => SpAlbum::TypeTv,
                'type' => 'tv',
                'desc' => '电视剧'
            ],
            [
                'id' => SpAlbum::TypeDm,
                'type' => 'cartoon',
                'desc' => '动漫'
            ],
        ];
        return $map[$item];
    }

    /**
     * 当前视频的类型
     * @return mixed
     * author tingfeng <wuzunlin@foxmail.com>
     * created time: 2017/9/5 13:37
     */
    public function nowType()
    {
        return SpVideoType::where('id', $this->type_id)->value('name');
    }

    /**
     * 视频来源
     * @return string
     * author tingfeng <wuzunlin@foxmail.com>
     * created time: 2017/9/5 13:39
     */
    public function nowParseType()
    {
        switch ($this->parse_type){
            case 'qq':
                $text = '腾讯视频';
                break;
            case 'youku':
                $text = '优酷';
                break;
            default:
                $text = '未知';
                break;
        }
        return $text;
    }

    /**
     * 获取当前缩略图
     * @return mixed
     * author tingfeng <wuzunlin@foxmail.com>
     * created time: 2017/9/5 14:01
     */
    public function nowThumb()
    {
        return SpThumb::where('albums_id', $this->id)->value('thumb');
    }

    /**
     * 删除空格
     * @param $str 字符串
     * @return mixed
     */
    public static function trimall($str){
        $qian = array(" ","　","\t","\n","\r");
        $hou = array("","","","","");
        return str_replace($qian,$hou,$str);
    }
}
