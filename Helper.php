<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: maskas
 * Date: 16.2.29
 * Time: 22.37
 */

namespace Plugin\Doctrine;


class Helper
{
    public static function tryToInstallDoctrine()
    {
        $activePlugins = \Ip\Internal\Plugins\Service::getActivePluginNames();
        if (!in_array('Composer', $activePlugins)) {
            return false;
        }

        $curConfigJson = \Plugin\Composer\Service::getConfig();
        $config = json_decode($curConfigJson, true);
        if (empty($config['require'])) {
            $config['require'] = [];
        }
        if (empty($config['require']['doctrine/orm'])) {
            $config['require']['doctrine/orm'] = '*';
        }
        \Plugin\Composer\Service::setConfig(json_encode($config));
        set_time_limit(600);
        \Plugin\Composer\Service::install();
        \Plugin\Composer\Event::ipInitFinished_1();
        return true;
    }
}
