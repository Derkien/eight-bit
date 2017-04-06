<?php

namespace Derkien\EightBitBundle\Utils;


use Derkien\EightBitBundle\Entity\Location;

class LocationFactory
{
    private $location;

    /**
     * LocationBuilder constructor.
     * @param Location $loc
     */
    public function __construct(Location $loc)
    {
        $this->location = $loc;
    }

    /**
     * Location prototype
     * @param $location
     * @return Location
     */
    public function getLocation($location)
    {
        $new = clone $this->location;
        $new->setName($location['name'] ?? 'unknown');
        $c = $new->getCoordinates();
        $c->setLat($location['coordinates']['lat'] ?? 0);
        $c->setLong($location['coordinates']['long'] ?? 0);
        return $new;
    }
}