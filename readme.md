<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
基于 Laravel5.8 的练手项目
</p>

### 部署
```shell
# 安装
composer install
# 配置数据库
cp .env.example .env
# 生成数据表结构
php artisan migrate
# 填充数据
php artisan db:seed
# 启动本地开发服务器
php artisan serve
```

### Nginx
```
server {

    listen 80;

    server_name laravel.com;
    root /data/www/Laravel-Demo/public;
    index index.php index.html index.htm;

    location / {
        # Redirect everything that isn't a real file to index.php
        try_files $uri $uri/ /index.php$is_args$args;
    }

    # deny accessing php files for the /assets directory
    location ~ ^/assets/.*\.php$ {
        deny all;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_pass 127.0.0.1:9000;
        try_files $uri =404;
    }

    location ~* /\. {
        deny all;
    }

}
```


### 访问
http://127.0.0.1:8000/

### 文档
- [Laravel5.8的安装](docs/Laravel5.8的安装.md)
- [生成用户系统](docs/生成用户系统.md)
- [中文语言包配置](docs/中文语言包配置.md)
- [数据库配置与使用migrate生成用户数据表](docs/数据库配置与使用migrate生成用户数据表.md)  
- [创建帖子表和评论表的Migration文件](docs/创建帖子表和评论表的Migration文件.md)  
- [创建帖子和评论模型](docs/创建帖子和评论模型.md)  
- [创建控制器并展示帖子列表数据](docs/创建控制器并展示帖子列表数据.md)
- [使用Seeder自动填充帖子数据](docs/使用Seeder自动填充帖子数据.md)
- [创建帖子](docs/创建帖子.md)
- [创建帖子-表单验证](docs/创建帖子-表单验证.md)
- [创建帖子-提示创建成功的信息](docs/创建帖子-提示创建成功的信息.md)
- [帖子详情](docs/帖子详情.md)  
- [发表帖子评论](docs/发表帖子评论.md)
- [评论列表](docs/评论列表.md)  
- [利用中间件Middleware实现只有登录用户才能发表评论](docs/利用中间件Middleware实现只有登录用户才能发表评论.md)
- [自定义中间件实现对用户发表评论进行限速](docs/自定义中间件实现对用户发表评论进行限速.md)


