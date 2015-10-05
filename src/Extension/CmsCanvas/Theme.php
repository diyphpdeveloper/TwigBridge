<?php

/**
 * This file is part of the TwigBridge package.
 *
 * @copyright Robert Crowe <hello@vivalacrowe.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TwigBridge\Extension\CmsCanvas;

use Twig_Extension;
use Twig_SimpleFunction;
use CmsCanvas\Theme\Theme as ThemeManager;

/**
 * Access CmsCanvas's theme class in your Twig templates.
 */
class Theme extends Twig_Extension
{
    /**
     * @var \CmsCanvas\Theme\Theme
     */
    protected $theme;

    /**
     * Create a new config extension
     *
     * @param \CmsCanvas\Theme\Theme
     */
    public function __construct(ThemeManager $theme)
    {
        $this->theme = $theme;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'TwigBridge_Extension_CmsCanvas_Theme';
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('theme_head', [$this->theme, 'head']),
            new Twig_SimpleFunction('theme_footer', [$this->theme, 'footer']),
            new Twig_SimpleFunction('theme_asset', [$this->theme, 'asset']),
        ];
    }
}
