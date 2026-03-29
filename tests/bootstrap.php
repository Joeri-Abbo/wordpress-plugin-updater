<?php

if (!defined('ABSPATH')) {
    define('ABSPATH', '/tmp/wordpress/');
}

if (!function_exists('is_plugin_active')) {
    function is_plugin_active(string $plugin): bool
    {
        return false;
    }
}

if (!function_exists('get_plugins')) {
    function get_plugins(): array
    {
        return [];
    }
}

if (!function_exists('get_template_directory')) {
    function get_template_directory(): string
    {
        return '/tmp/wordpress/wp-content/themes/test';
    }
}

if (!class_exists('WP_CLI')) {
    class WP_CLI
    {
        public static function success(string $message): void {}
        public static function add_command(string $name, mixed $callable): void {}
    }
}

require_once dirname(__DIR__) . '/vendor/autoload.php';
