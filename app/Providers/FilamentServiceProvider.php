<?php

namespace App\Providers;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        FilamentAsset::register([
            Css::make('custom-theme', __DIR__ . '/../../resources/css/filament/admin/theme.css'),
        ]);
    }
} 