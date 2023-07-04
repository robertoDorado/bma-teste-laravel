<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Doctrine\DBAL\Types\Type;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Type::addType('timestamp', \Doctrine\DBAL\Types\DateTimeType::class);
        // Ou use o tipo \Doctrine\DBAL\Types\DateTimeType se preferir DateTime ao invés de \DateTimeImmutable
        // Type::addType('timestamp', \Doctrine\DBAL\Types\DateTimeType::class);
    }
}
