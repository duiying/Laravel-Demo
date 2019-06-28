# 创建帖子表和评论表的Migration文件

### 目的
使用 Migration 创建 posts(帖子表) 和 comments(评论表)

### 创建Migration
创建 posts 和 comments 表的 Migration 文件
```shell
php artisan make:migration CreatePostsTable
php artisan make:migration CreateCommentsTable
```
此时, database/migrations 目录下多了两个文件  

### 编辑Migration文件
database/migrations/2019_06_27_134234_create_posts_table.php
```php
public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->integer('user_id');
        $table->string('title')->comment('帖子标题');
        $table->text('content')->comment('内容');
        $table->timestamps();
    });
}
```
database/migrations/2019_06_27_134636_create_comments_table.php
```php
public function up()
{
    Schema::create('comments', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->integer('user_id');
        $table->integer('post_id');
        $table->text('content')->comment('评论内容');
        $table->timestamps();
    });
}
```

### 使用migrate生成数据表
```shell
php artisan migrate
```
此时, 数据库中多了 posts(帖子表) 和 comments(评论表)