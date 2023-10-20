### Installation and Setup
The package can be installed via composer:
```
composer require spatie/laravel-activitylog
```

You can publish the migration with:
```
php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="activitylog-migrations"
```
After the migration has been published you can create the activity_log table by running the migrations:
```
php artisan migrate
```

You can optionally publish the config file with:
```
php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="activitylog-config"
```

You can optionally update .env file with:
```
ACTIVITY_LOGGER_ENABLED=true
```

Finally you should prepare your desired Model (like User.php)
```
<?php

namespace App\Models;


use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class User extends Authenticatable
{
    use LogsActivity;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected static $recordEvents = ['created','updated','deleted'];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('user')
            ->logOnly(['name', 'email'])
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "You have {$eventName} user");
    }

}
```
