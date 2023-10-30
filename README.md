<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


### uuid
장점: 여러 서버에 데이터베이스를 쉽게 배포가능
단점: 인덱스를 4배 더 쓴다. 수동으로 작업하기 어렵다.

테이블 생성

php artisan make:model Post -m

Model 생성
Migration 생성

migrations/2023_10_30_162708_create_posts_table.php
$table->string('title');
$table->string('body');

칼럼 추가

php artisan migrate

php artisan tinker

Post::create(['title' => 'post title', 'body' => 'post body']);

Error  Class "Post" not found. 에러가 발생할 경우
composer dump-autoload

id를 삭제한 경우

migrations/2023_10_30_162708_create_posts_table.php 에서 아래 항목 삭제
$table->id();

php artisan migrate:fresh

Post::create(['title' => 'post title', 'body' => 'post body']); 를 실행할 경우
id: 0, 으로 들어간다.

계속 실행하여도 id: 0, 으로 들어간다.

id를 삭제하기 위해서

Post.php 클래스에 아래 추가
protected $primaryKey = null;
public $incrementing = false;

exit
php artisan tinker 재실행
Post::create(['title' => 'post title', 'body' => 'post body']); 를 실행할 경우
id: 0, 가 없다.

uuid를 추가하기 위해서 migrations/2023_10_30_162708_create_posts_table.php 에서 아래 항목 추가
$table->uuid('uuid')->unique();

Post.php 클래스에 아래 수정
protected $fillable = [
    'uuid',
    'title',
    'body',
];

protected $primaryKey = 'uuid';
protected $keyType = 'string';

php artisan migrate:fresh

php artisan tinker 재실행
Post::create(['uuid' => Str::uuid(), 'title' => 'post title', 'body' => 'post body']);

uuid: "5337294e-f1a8-4397-a0eb-b6d0434d1c5d", 확인 가능

*** 모델 이벤트를 사용하여 uuid생성

Post.php 클래스에 아래 수정
    protected $fillable = [
        // 'uuid',
        'title',
        'body',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid();
            }
        });
    }

php artisan tinker 재실행
Post::create(['title' => 'post title', 'body' => 'post body']);

uuid: "c63e6d5e-4ba3-428d-8aad-09f0498fe28a", 확인 가능

다른 방법은 Post.php 클래스에 아래 수정
        static::creating(function($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid();
            }
        });

php artisan tinker 재실행
Post::create(['title' => 'post title', 'body' => 'post body']);

uuid: "8a471a88-74fd-4de1-8a0c-164e0b863a01", 확인 가능

boot()메소드를 분리하기 위해서 trait를 사용한다.

Traits/HasUuid.php 를 만든다.

    protected static function bootHasUuid()
    {
        static::creating(function($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid();
            }
        });
    }

Post.php 클래스에 아래 수정
use HasFactory, HasUuid;
boot() 삭제

php artisan tinker 재실행
Post::create(['title' => 'post title', 'body' => 'post body']);

uuid: "34d187bb-0aef-44ff-addc-7522d06fcedb", 확인 가능
