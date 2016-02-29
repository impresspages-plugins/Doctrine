<?php

namespace Plugin\Doctrine\Entity;

/**
 * @Entity @Table(name="ip_log")
 **/
class Log
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    /** @Column(type="string") **/
    protected $message;

    /** @Column(type="string") */
    protected $level;


    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function getMessage()
    {
        return $this->message;
    }
}

