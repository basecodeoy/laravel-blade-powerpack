<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\BladePowerPack\View\Components;

use Illuminate\View\Component;

final class BunnyFonts extends Component
{
    public function __construct(
        private readonly array $fonts,
    ) {
        //
    }

    #[\Override()]
    public function shouldRender(): bool
    {
        return $this->fonts !== [];
    }

    #[\Override()]
    public function render(): string
    {
        $fonts = collect($this->fonts)->map(function (array|string|null $weights, string $font): string {
            $font = \mb_strtolower(\str_replace(' ', '-', \is_numeric($font) ? $weights : $font));

            if (!\is_array($weights)) {
                $weights = [400];
            }

            return \sprintf('%s:%s', $font, \implode(',', $weights));
        })->implode('|');

        return <<<"blade"
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family={$fonts}&display=swap" rel="stylesheet" />
        blade;
    }
}
