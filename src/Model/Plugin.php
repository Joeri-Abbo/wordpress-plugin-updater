<?php

namespace PluginUpdater\Model;

use PluginUpdater\Helper;

class Plugin
{
    private array $raw_plugin;
    private string $file;
    private ?bool $isActive = null;
    private ?string $name = null;
    private Helper $helper;

    /**
     * Plugin data to a modal
     * @param string $file
     * @param array $plugin
     */
    public function __construct(string $file, array $plugin)
    {
        $this->file = $file;
        $this->raw_plugin = $plugin;
        $this->helper = Helper::getInstance();
    }

    /**
     * Return raw plugin data
     * @return array
     */
    public function getRawPlugin(): array
    {
        return $this->raw_plugin;
    }

    /**
     * Return raw plugin data
     * @return array
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * Is current plugin active
     * @return bool
     */
    public function isActive(): bool
    {
        if (is_null($this->isActive)) {
            $this->isActive = is_plugin_active($this->file);
        }

        return $this->isActive;
    }

    /**
     * The plugin name
     * @return string|null
     */
    public function name(): string
    {
        if (is_null($this->name)) {
            $this->name = $this->raw_plugin['Name'];
        }

        return $this->name;
    }

    /**
     * Get update command
     * @return string
     */
    private function getUpdateCommand(): string
    {
        return sprintf('cd %s; wp plugin update %s  2>&1', $this->helper->getWorkingDir(), $this->getFile());
    }

    /**
     * Update the plugin
     * @return void
     */
    public function update()
    {
        \WP_CLI::success(sprintf('Start update of %s', $this->name()));
        echo shell_exec($this->getUpdateCommand());
    }
}