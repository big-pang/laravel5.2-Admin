# Larval 5.2 Rbac 后台实例

## 说明

基于laravel 5.2 与 zizaco/entrust 权限管理
开箱即用的后台模板.面包线,菜单栏都是基于权限来生成
集成了laravel-debugbar 超好用调试工具
带有日志解析查看模块


## 截图

## ![laravel rbac](http://o7ze7op4t.bkt.clouddn.com/QQ%E6%88%AA%E5%9B%BE20160530163207.png)



![rbac](http://o7ze7op4t.bkt.clouddn.com/QQ%E6%88%AA%E5%9B%BE20160530163112.png)



## 安装

- git clone 到本地
- 执行 `composer install`
- 配置 **.local.env** 中数据库连接信息
- 执行 `php artisan db:seed`
- 执行 `php artisan serve`
- 键入 'localhost:8000/admin'
- 默认后台账号:admin@admin.com 密码:admin

## 使用
- 用户管理中的权限管理添加顶级权限
   比如用户管理, 'admin.user' 只有两段的做左边的菜单栏, 列表页统一为'admin.XXXX.index'
   具体部分可以参照路由与源码,也可以QQ我176608671