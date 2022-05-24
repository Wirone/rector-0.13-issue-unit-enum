<?php

namespace Rector\IssueReproducer;

use DateTime;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;

class Foo implements ContainerInterface
{
    public static function bar(?DateTime $datetime)
    {
        // ...
    }

    public function set($id, $service)
    {
        // TODO: Implement set() method.
    }

    public function get($id, $invalidBehavior = self::EXCEPTION_ON_INVALID_REFERENCE)
    {
        // TODO: Implement get() method.
    }

    public function has($id)
    {
        // TODO: Implement has() method.
    }

    public function initialized($id)
    {
        // TODO: Implement initialized() method.
    }

    public function getParameter($name)
    {
        // TODO: Implement getParameter() method.
    }

    public function hasParameter($name)
    {
        // TODO: Implement hasParameter() method.
    }

    public function setParameter($name, $value)
    {
        // TODO: Implement setParameter() method.
    }
}
