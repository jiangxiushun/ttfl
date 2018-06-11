<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use App\Models\Cates;
use App\Models\Links;

class AppServiceProvider extends ServiceProvider
{
    public static function cates_sub($pid)
    {
        $arr = [];
        $cates = Cates::where('pid',$pid)->get();
        foreach($cates as $k=>$v){
            $v['sub'] = self::cates_sub($v->id);
            $arr[] = $v;
        }
        return $arr;
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 分配全局分类变量
        $sql = "select *,concat(path,',',id) as paths from cates order by paths";
        $data = DB::select($sql);
        $cates_sub = self::cates_sub(0);
        foreach($data as $k=>$v){
            //统计字符串出现的次数
            $n = substr_count($v->paths,',');
            $newcname = str_repeat('|----',$n).$v->cname;
            $data[$k]->cname = $newcname;
        }

        $links = Links::get();
        view()->share(['cates'=>$data,'cates_sub'=>$cates_sub,'links'=>$links]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
