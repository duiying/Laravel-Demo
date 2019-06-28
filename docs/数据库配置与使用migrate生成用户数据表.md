# 数据库配置与使用migrate生成用户数据表

### 数据库配置
在 .env 文件中, 将
```
APP_URL=http://localhost
```
改成
```
APP_URL=http://127.0.0.1:8000
```
再修改数据库配置
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root
```
然后建数据库 laravel , 重启服务
```shell
php artisan serve
```

### 使用migrate生成用户数据表
执行命令
```shell
php artisan migrate
```
报错如下
```
Specified key was too long
```
在 app/Providers/AppServiceProvider.php 文件中手动配置迁移命令migrate生成的默认字符串长度
```php
public function boot()
{
    Schema::defaultStringLength(191);
}
```
删掉 laravel 数据库中原来的数据表, 重新执行
```shell
php artisan migrate
```
此时, laravel 数据库中多了 users、migrations、password_resets 三张表

### 测试注册功能
注册一个用户  
![laravel-注册](https://raw.githubusercontent.com/duiying/img/master/laravel-注册.jpg)   
提示注册成功  
![laravel-注册成功](https://raw.githubusercontent.com/duiying/img/master/laravel-注册成功.jpg)  

