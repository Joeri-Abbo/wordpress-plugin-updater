<?php
if (class_exists('WP_CLI')) {
    /**
     * Auto update plugins by cli also when inactive
     * @when before_wp_load
     */
    WP_CLI::add_command('pluginUpdater', function ($args, $assoc_args) {
        $stuntDouble = new \PluginUpdater\Runner();
        $stuntDouble->run();
    });
}