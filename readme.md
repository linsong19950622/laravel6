##安装
1.配置
- 安装php7.2 和 composer 
- 将文件 .env.example 复制成文件 .env
- 设置 .env 的参数 APP_URL 和 DB

2.执行指令
- composer install
- php artisan key:generate
- php artisan storage:link

3.数据库
- php artisan migrate
