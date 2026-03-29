<?php

namespace PluginUpdater\Tests;

use PHPUnit\Framework\TestCase;
use PluginUpdater\Helper;
use PluginUpdater\Model\Plugin;
use ReflectionClass;

class PluginTest extends TestCase
{
    protected function setUp(): void
    {
        $reflection = new ReflectionClass(Helper::class);
        $property = $reflection->getProperty('instance');
        $property->setValue(null, null);
    }

    public function testGetFile(): void
    {
        $plugin = new Plugin('my-plugin/my-plugin.php', ['Name' => 'My Plugin']);
        $this->assertSame('my-plugin/my-plugin.php', $plugin->getFile());
    }

    public function testGetRawPlugin(): void
    {
        $data = ['Name' => 'My Plugin', 'Version' => '1.0.0'];
        $plugin = new Plugin('my-plugin/my-plugin.php', $data);
        $this->assertSame($data, $plugin->getRawPlugin());
    }

    public function testName(): void
    {
        $plugin = new Plugin('my-plugin/my-plugin.php', ['Name' => 'My Plugin']);
        $this->assertSame('My Plugin', $plugin->name());
    }

    public function testIsActiveReturnsFalse(): void
    {
        $plugin = new Plugin('my-plugin/my-plugin.php', ['Name' => 'My Plugin']);
        $this->assertFalse($plugin->isActive());
    }
}
