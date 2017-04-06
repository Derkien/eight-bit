<?php

namespace Derkien\EightBitBundle\Entity;


class Coordinates
{
    protected $long;
    protected $lat;

    public function __construct(float $long = 0, float $lat = 0)
    {
        $this->setLong($long);
        $this->setLat($lat);
    }

    public function __clone()
    {
        $this->setLong(0);
        $this->setLat(0);
    }

    /**
     * @return mixed
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * @param mixed $long
     */
    public function setLong($long)
    {
        $this->long = (float) $long;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     */
    public function setLat($lat)
    {
        $this->lat = (float) $lat;
    }
}