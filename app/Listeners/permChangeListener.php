<?php

namespace App\Listeners;

use App\Events\permChangeEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Cache;
class permChangeListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  permChangeEvent  $event
     * @return void
     */
    public function handle(permChangeEvent $event)
    {
        Cache::store('file')->forget('perms');//清理缓存
        Cache::store('file')->forget('menus');//清理缓存

        $file_path = storage_path('framework/cache') . '/Breadcrumbs.php';
        if (file_exists($file_path))unlink($file_path);
        $this->breadcrumbs($file_path);
    }
    
    public function breadcrumbs($file_path){
        $str = '<?php';
// Home
        $str .= '
    Breadcrumbs::register("admin.index", function ($breadcrumbs) {
        $breadcrumbs->push("首页", route("admin.index"));
    });
';
//首先获取用户下所有的权限
        $perms = Cache::store("file")->rememberForever("perms", function () {
            return \App\Models\Permission::all();
        });;


        $arr = [];
        foreach ($perms as $permission) {
            $arr[$permission->cid][] = $permission;
        }
        foreach ($arr[0] as $v) {
            $index = [];
            $str .= 'Breadcrumbs::register("' . $v->name . '", function ($breadcrumbs){
        $breadcrumbs->push("' . $v->display_name . '", route("' . $v->name . '"));
    });';
            if (isset($arr[$v->id])&&$arr[$v->id]) {
                foreach ($arr[$v->id] as $vv) {
                    if (ends_with($vv->name, '.index')) {
                        $index[$vv->name] = $vv->name;
                        $str .= 'Breadcrumbs::register("' . $vv->name . '", function ($breadcrumbs) {
                        $breadcrumbs->parent("' . $v->name . '");
                        $breadcrumbs->push("' . $vv->display_name . '", route("' . $vv->name . '"));
                    });
                    ';
                    }
                }
                foreach ($arr[$v->id] as $vv) {
                    if (!ends_with($vv->name, '.index')) {
                        $name_arr = explode('.', $vv->name);
                        $index_str = $name_arr[0] . '.' . $name_arr[1] . '.index';
                        $str .= 'Breadcrumbs::register("' . $vv->name . '", function ($breadcrumbs) {
                  ';
                        $name_arr = explode(".", $vv->name);
                        $index_str = $name_arr[0] . "." . $name_arr[1] . ".index";
                        if (isset($index[$index_str])) {
                            $str .= '$breadcrumbs->parent("' . $index[$index_str] . '");
                          ';
                        } else {
                            $str .= '$breadcrumbs->parent("' . $v->name . '");
                            ';
                        }
                        $str .= '$breadcrumbs->push("' . $vv->display_name . '", route("' . $vv->name . '"));
                        ';
                        $str .= '});
                  ';
                    }
                }
            }
        }
        file_put_contents($file_path,$str);
    }
}
