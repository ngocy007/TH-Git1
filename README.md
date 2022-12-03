# TH-Git1
## Nhóm NT88
### DANH SÁCH THÀNH VIÊN
| Tên | Chức Vụ | Avatar |
| ------ | ------ | ------ |
| Nguyễn Ngọc Ý | Nhóm Trưởng| <img src="https://img.pokemondb.net/artwork/large/cinccino.jpg" width="50">
| Nguyễn Huỳnh Hoàng Việt | Thành Viên| <img src="#" width="50">
| Phạm Ân Chí | Thành Viên | <img src="#" width="50">
| Cao Hào Kiệt | Thành Viên | <img src="#" width="50">
| Huỳnh Xuân Đạt | Thành Viên | <img src="https://avatars.githubusercontent.com/u/41006973?v=4" width="50">

### HƯỚNG DẪN SỬ DỤNG
Clone project

```bash
  git clone https://github.com/ngocy007/TH-Git1.git
```

Update composer

```bash
  composer update
```

Đổi tên file .env.example thành .env
```bash
  .env
```
Chỉnh sửa file .env
```bash
    APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=http://localhost/
    
    LOG_CHANNEL=stack
    LOG_DEPRECATIONS_CHANNEL=null
    LOG_LEVEL=debug
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=truyen
    DB_USERNAME=root
    DB_PASSWORD=
    
    BROADCAST_DRIVER=log
    CACHE_DRIVER=file
    FILESYSTEM_DISK=local
    QUEUE_CONNECTION=sync
    SESSION_DRIVER=file
    SESSION_LIFETIME=120
    
    MEMCACHED_HOST=127.0.0.1
    
    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379
    
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    MAIL_USERNAME=outsourcetruyenchu@gmail.com
    MAIL_PASSWORD=pxcdtkycdxrvzgtj
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=outsourcetruyenchu@gmail.com
    MAIL_FROM_NAME="${APP_NAME}"
    
    AWS_ACCESS_KEY_ID=
    AWS_SECRET_ACCESS_KEY=
    AWS_DEFAULT_REGION=us-east-1
    AWS_BUCKET=
    AWS_USE_PATH_STYLE_ENDPOINT=false
    
    PUSHER_APP_ID=
    PUSHER_APP_KEY=
    PUSHER_APP_SECRET=
    PUSHER_HOST=
    PUSHER_PORT=443
    PUSHER_SCHEME=https
    PUSHER_APP_CLUSTER=mt1
    
    VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
    VITE_PUSHER_HOST="${PUSHER_HOST}"
    VITE_PUSHER_PORT="${PUSHER_PORT}"
    VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
    VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
    SCOUT_DRIVER=collection
```
Tạo APP_KEY

```bash
  php artisan key:generate
```
Tạo Database

```bash
  php artisan migrate
```
Nếu đã có Database khuyến khích dùng

```bash
  php artisan migrate:fresh
```
Tạo liên kết vào public\storage

```bash
  php artisan storage:link
```
Seed dữ liệu

```bash
  php artisan db:seed
```
Cài Laravel Scout
```bash
  composer require laravel/scout
```
Cài npm
```bash
  npm install
```
Chạy npm
```bash
  npm run dev
```
Chạy server

```bash
  php artisan serve
```

