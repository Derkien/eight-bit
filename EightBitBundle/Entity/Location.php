<?php

namespace Derkien\EightBitBundle\Entity;


class Location
{
    protected $name;
    protected $coordinates;

    public function __construct($name = '', Coordinates $coordinates = null)
    {
        $this->setName($name);
        if (null === $coordinates) {
            $coordinates = new Coordinates(0, 0);
        }
        $this->setCoordinates($coordinates);
    }

    public function __clone()
    {
        $this->coordinates = clone $this->coordinates;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Coordinates
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param Coordinates $coordinates
     */
    public function setCoordinates(Coordinates $coordinates)
    {
        $this->coordinates = $coordinates;
    }
}