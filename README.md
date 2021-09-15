# Started Lumen Service
Lumen API service dikembangkan menggunakan lumen framework.

**Daftar isi**:
- [Started Lumen Service](#started-lumen-service)
  - [Persyaratan](#persyaratan)
  - [Memulai](#memulai)
  - [Rest API](#rest-api)
    - [Tabel posts](#tabel-posts)

## Persyaratan
- PHP > 7.3

## Memulai
1. Instalasi
   
   ```
   git clone https://github.com/febrihidayan/started-lumen-service.git
   ```
2. `composer install`
3. `copy .env.example .env`
4. Silakan konfigurasi basis data
   
   ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret
   ```
5. `php artisan migrate`
6. `php artisan serve` (http://127.0.0.1:8000)

## Rest API

### Tabel posts

**Get**
```
/v1/post/lists?q=:query&limit=:limit&page=:page
```

**Post**
```
/v1/post
```
Form:
```
- title
- body
- status (0: draft, 1: public)
```

**PUT**
```
/v1/post/{id}
```
Form:
```
- title
- body
- status (0: draft, 1: public)
```

**DELETE**
```
/v1/post/{id}
```