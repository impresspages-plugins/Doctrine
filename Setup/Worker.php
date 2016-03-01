<?php

namespace Plugin\Doctrine\Setup;

use \Ip\Internal\Plugins\Service as PluginService;

class Worker extends \Ip\SetupWorker
{

    public function activate() {
        $requiredPluginName = 'Composer';
        $activePluginNames = PluginService::getActivePluginNames();
        if (!in_array($requiredPluginName, $activePluginNames)) {
            $allPluginNames = PluginService::getAllPluginNames();
            if (in_array($requiredPluginName, $allPluginNames)) {
                PluginService::activatePlugin($requiredPluginName);
            } else {
                throw new \Ip\Exception("This plugin require Composer plugin to be installed first.");
            }
        }
    }

    public function deactivate() {}

    public function remove() {}
}
