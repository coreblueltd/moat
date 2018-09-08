# Moat

This package makes it easy to password protect your Laravel staging websites.

# Installation

You can install the package via composer:

```bash
composer require coreblue/moat
```

# Setup

Register the Moat middleware in the application's route middleware groups.

```php
//app/http/Kernel.php
protected $middlewareGroups = [
    'web' => [
        \CoreBlue\Moat\Middleware\ApplyMoat::class,
    ],
];
```

# Usage

To get started with Moat run the following command.

```bash
php artisan moat:create
```

<br/>

Once the create command has been run you will be able to run the following commands.

<br/>

You can enable Moat via:

```bash
php artisan moat:up
```

<br/>


You can disable Moat via:

```bash
php artisan moat:down
```

<br/>

You can set a new password via:

```bash
php artisan moat:password
```

<br/>

You can check the current status via:

```bash
php artisan moat:status
```

