<?php

namespace PluginUpdater;

class Runner
{
    /**
     * @var Helper
     */
    private Helper $helper;

    /**
     * The construct
     */
    public function __construct()
    {
        $this->helper = Helper::getInstance();
    }

    /**
     * Runner
     * @return void
     */
    public function run()
    {
        foreach ($this->helper->getPlugins() as $plugin) {
            $plugin->update();
        }
    }
}
