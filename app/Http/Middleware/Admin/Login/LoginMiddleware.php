<?php

namespace App\Http\Middleware\Admin\Login;

use Closure;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 检测是否登录
        if($request->session()->has('user')){
            return $next($request);//执行下一次请求
        }else{
            // 跳转到登录页面
            return redirect('/login'); //重定向
        }
        
    }
}
