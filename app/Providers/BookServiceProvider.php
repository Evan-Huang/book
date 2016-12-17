<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BookServiceProvider extends ServiceProvider
{

    /**
     * 指定是否延缓提供者加载。
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     * 执行注册后的启动服务
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     * 在容器中注册绑定
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * 取得提供者所提供的服务。
     *
     * @return array
     */
    public function provides()
    {
        //
    }
}
