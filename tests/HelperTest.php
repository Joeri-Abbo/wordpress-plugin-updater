<?php

namespace PluginUpdater\Tests;

use PHPUnit\Framework\TestCase;
use PluginUpdater\Helper;
use ReflectionClass;

class HelperTest extends TestCase
{
    protected function setUp(): void
    {
        $reflection = new ReflectionClass(Helper::class);
        $property = $reflection->getProperty('instance');
        $property->setValue(null, null);
    }

    public function testGetInstanceReturnsSingleton(): void
    {
        $instance1 = Helper::getInstance();
        $instance2 = Helper::getInstance();
        $this->assertSame($instance1, $instance2);
    }

    public function testGetWorkingDirHasNoTrailingSlash(): void
    {
        $helper = Helper::getInstance();
        $dir = $helper->getWorkingDir();
        $this->assertIsString($dir);
        $this->assertStringEndsNotWith('/', $dir);
    }

    public function testGetPluginsReturnsArray(): void
    {
        $helper = Helper::getInstance();
        $this->assertIsArray($helper->getPlugins());
    }
}
