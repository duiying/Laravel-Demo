# 利用中间件Middleware实现只有登录用户才能发表评论

第一种方式是在控制器中实现  
app/Http/Controllers/PostController.php  
```php
public function __construct()
{
    $this->middleware('auth')->only('comment');
}
```

第二种方式是在路由中实现  
routes/web.php
```php
Route::post('/post/{post_id}/comment', 'PostController@comment')->name('post.comment')->middleware('auth');
``` 