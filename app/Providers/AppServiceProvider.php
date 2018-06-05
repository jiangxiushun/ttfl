<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use App\Models\Cates;

class AppServiceProvider extends ServiceProvider
{
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
        foreach($data as $k=>$v){
            //统计字符串出现的次数
            $n = substr_count($v->paths,',');
            $newcname = str_repeat('|----',$n).$v->cname;
            $data[$k]->cname = $newcname;
        }
        view()->share('cates',$data);
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
