<?php

namespace PluginUpdater;

use PluginUpdater\Model\Plugin;

class Helper
{
    private static ?Helper $instance = null;
    private ?string $working_dir = null;
    private ?array $plugins = null;

    /**
     * Construct
     */
    private function __construct()
    {
    }

    /**
     * Return the current class
     * @return Helper
     */
    public static function getInstance(): Helper
    {
        if (is_null(self::$instance)) {
            self::$instance = new Helper();
        }

        return self::$instance;
    }

    /**
     * Get working dir
     * @return string|null
     */
    public function getWorkingDir(): ?string
    {
        if (is_null($this->working_dir)) {
            if (defined('ABSPATH')) {
                $this->working_dir = ABSPATH;
            } else {
                $this->working_dir = get_template_directory();
            }

            $this->working_dir = rtrim($this->working_dir, "/");
        }

        return $this->working_dir;
    }

    /**
     * Get plugins
     * @return array
     */
    public function getPlugins(): array
    {
        if (is_null($this->plugins)) {
            if (!empty($plugins = get_plugins())) {
                foreach ($plugins as $file => $plugin) {
                    $this->plugins[] = new Plugin($file, $plugin);
                }
            } else {
                $this->plugins = [];
            }
        }

        return $this->plugins;
    }
}