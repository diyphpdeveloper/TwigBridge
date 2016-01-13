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
use Twig_SimpleFilter;
use CmsCanvas\Content\Content as ContentManager;

/**
 * Access CmsCanvas's theme class in your Twig templates.
 */
class Content extends Twig_Extension
{
    /**
     * @var \CmsCanvas\Content\Content
     */
    protected $content;

    /**
     * Create a new config extension
     *
     * @param \CmsCanvas\Content\Content
     */
    public function __construct(ContentManager $content)
    {
        $this->content = $content;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'TwigBridge_Extension_CmsCanvas_Content';
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('entries', [$this->content, 'entries'], ['is_variadic' => true]),
            new Twig_SimpleFunction('entry', [$this->content, 'entry'], ['is_variadic' => true]),
            new Twig_SimpleFunction('navigation', [$this->content, 'navigation'], ['is_variadic' => true]),
            new Twig_SimpleFunction('breadcrumb', [$this->content, 'breadcrumb'], ['is_variadic' => true]),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getFilters()
    {
        return [
            new Twig_SimpleFilter('user_date', [$this->content, 'userDate']),
        ];
    }
}
