<?php

/**
 * Shortcut function to access Doctrine EntityManager without creating an object.
 * @return \Doctrine\ORM\EntityManager
 */
function doctrineEm() {
    return \Plugin\Doctrine\Service::getEntityManager();
}
