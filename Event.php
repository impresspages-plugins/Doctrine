<?php
namespace Plugin\Doctrine;

/**
 * @package   ImpressPages
 */
use Composer\Autoload\ClassLoader;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Plugin\Doctrine\Entity\Log;

/**
 * Created by PhpStorm.
 * User: maskas
 * Date: 16.2.26
 * Time: 15.12
 */
class Event
{
    public static function ipInitFinished_2()
    {
        $isDevMode = ipConfig()->isDevelopmentEnvironment();

        $config = Setup::createAnnotationMetadataConfiguration([], $isDevMode);

        // or if you prefer yaml or XML
        //$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
        //$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);


        $connectionParams = [
            'pdo' => ipDb()->getConnection()
        ];
        $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

        $em = EntityManager::create($conn, $config);
        Service::setEntityManager($em);

//        $log = new Log();
//        $log->setMessage('Test');
//        $log->setLevel('Error');
//        $em->persist($log);
//        $em->flush($log);
//
//
//        $query = $em->createQuery('SELECT l FROM Plugin\Doctrine\Entity\Log l WHERE l.id > 980');
//        $logs = $query->getResult();
//        $firstLog = $logs[0];
//        echo $firstLog->getMessage();
//        echo count($logs);
//        exit;

    }
}
