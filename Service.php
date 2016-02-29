<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: maskas
 * Date: 16.2.28
 * Time: 20.51
 */

namespace Plugin\Doctrine;


use Doctrine\ORM\EntityManager;

class Service
{
    protected static $em;

    /**
     * @param EntityManager $em
     */
    public static function setEntityManager(EntityManager $em)
    {
        self::$em = $em;
    }

    /**
     * @return EntityManager
     */
    public static function getEntityManager()
    {
        return self::$em;
    }
}
