# 使用Seeder自动填充帖子数据

### 创建Seeder
```shell
php artisan make:seeder PostSeeder
```
此时, database/seeds 目录下多了 PostSeeder.php 文件

### 编辑Seeder
database/seeds/PostSeeder.php
```php
public function run()
{
    for ($i = 1; $i <= 100; $i++) {
        Post::create([
            'user_id' => 1,
            'title' => '测试标题-' . $i,
            'content' => '测试内容-' . $i,
        ]);
    }
}
```

database/seeds/DatabaseSeeder.php
```php
public function run()
{
     $this->call(PostSeeder::class);
}
```

### 执行填充
```shell
php artisan db:seed
```
此时, posts 表中多了100条数据