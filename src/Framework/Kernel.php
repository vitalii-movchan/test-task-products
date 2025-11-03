<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Framework;

use Symfony;

/**
 * @see Symfony\Component\HttpKernel\HttpKernel
 * @class Kernel
 * @implements Symfony\Component\HttpKernel\Kernel
 * @uses Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait
 */
class Kernel extends Symfony\Component\HttpKernel\Kernel
{
    use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
}
