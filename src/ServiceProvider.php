<?php

declare(strict_types=1);

namespace BaseCodeOy\BladePowerPack;

use BaseCodeOy\BladePowerPack\View\Components\BunnyFonts;
use BaseCodeOy\BladePowerPack\View\Components\GoogleFonts;
use BaseCodeOy\PackagePowerPack\Package\AbstractServiceProvider;
use Illuminate\Support\Facades\Blade;

final class ServiceProvider extends AbstractServiceProvider
{
    public function packageRegistered(): void
    {
        Blade::component('bunny-fonts', BunnyFonts::class);
        Blade::component('google-fonts', GoogleFonts::class);
    }
}
