<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic\Test\Extension\Twig;

use Assetic\Extension\Twig\AsseticFilterFunctionFactory;
use Assetic\Extension\Twig\AsseticExtension;
use Assetic\Asset\AssetCollection;
use Assetic\Asset\FileAsset;

class AsseticFilterFunctionFactoryTest extends \PHPUnit\Framework\TestCase
{
    protected function setUp()
    {
        if (!class_exists('\Twig\TwigFunction')) {
            $this->markTestSkipped('Twig is not installed.');
        }
    }

    public function testCreate()
    {
        $function = AsseticFilterFunctionFactory::create('test');
        $this->assertInstanceOf(\Twig\TwigFunction::class, $function);
        $this->assertEquals('test', $function->getName());
    }
}