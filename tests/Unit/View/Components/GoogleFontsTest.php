<?php

declare(strict_types=1);

use BombenProdukt\BladePowerPack\View\Components\GoogleFonts;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('should render HTML when a list of fonts is provided', function (): void {
    assertMatchesSnapshot((new GoogleFonts([
        'Patrick Hand' => [400],
        'Patrick Hand SC' => [400],
        'Roboto' => [100],
    ]))->render());
});

it('should render HTML when a list of fonts is provided but no weights are specified', function (): void {
    assertMatchesSnapshot((new GoogleFonts([
        'Patrick Hand',
        'Patrick Hand SC',
        'Roboto',
    ]))->render());
});

it('should render HTML when a list of fonts is provided but not all weights are specified', function (): void {
    assertMatchesSnapshot((new GoogleFonts([
        'Patrick Hand',
        'Patrick Hand SC',
        'Roboto' => [100],
    ]))->render());
});

it('should render when a list of fonts is provided', function (): void {
    expect((new GoogleFonts([
        'Patrick Hand' => [400],
        'Patrick Hand SC' => [400],
        'Roboto' => [100],
    ]))->shouldRender())->toBeTrue();
});

it('should not render when an empty list of fonts is provided', function (): void {
    expect((new GoogleFonts([]))->shouldRender())->toBeFalse();
});
