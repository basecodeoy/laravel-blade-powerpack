<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\BladePowerPack\View\Components;

use Illuminate\View\Component;

final class GoogleFonts extends Component
{
    public function __construct(
        private readonly array $fonts,
    ) {
        //
    }

    public function shouldRender(): bool
    {
        return \count($this->fonts) > 0;
    }

    public function render(): string
    {
        $fonts = collect($this->fonts)->map(function (array|string|null $weights, string $font): string {
            $font = \str_replace(' ', '+', \is_numeric($font) ? $weights : $font);

            if (\is_array($weights)) {
                return \sprintf('%s:wght@%s', $font, \implode(',', $weights));
            }

            return $font;
        })->implode('&family=');

        return <<<"blade"
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family={$fonts}&display=swap" rel="stylesheet">
        blade;
    }
}
