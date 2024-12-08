<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\BladePowerPack\View\Components\GoogleFonts;

it('should render HTML when a list of fonts is provided', function (): void {
    expect((new GoogleFonts([
        'Patrick Hand' => [400],
        'Patrick Hand SC' => [400],
        'Roboto' => [100],
    ]))->render())->toMatchSnapshot();
});

it('should render HTML when a list of fonts is provided but no weights are specified', function (): void {
    expect((new GoogleFonts([
        'Patrick Hand',
        'Patrick Hand SC',
        'Roboto',
    ]))->render())->toMatchSnapshot();
});

it('should render HTML when a list of fonts is provided but not all weights are specified', function (): void {
    expect((new GoogleFonts([
        'Patrick Hand',
        'Patrick Hand SC',
        'Roboto' => [100],
    ]))->render())->toMatchSnapshot();
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
