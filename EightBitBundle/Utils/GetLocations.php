<?php

namespace Derkien\EightBitBundle\Utils;


use Buzz\Client\Curl;
use Derkien\EightBitBundle\Entity\Location;
use Symfony\Component\DependencyInjection\ContainerInterface;

class GetLocations
{
    function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $host
     * @return array
     * @throws \Exception|\LogicException
     */
    public function getLocations(string $host)
    {
        if(!$host){
            throw new \InvalidArgumentException("Host can't be empty");
        }
        $browser = $this->container->get('buzz');
        $client = new Curl();
        $client->setTimeout(10);
        $browser->setClient($client);
        $jsonContent = json_decode($browser->get($host)->getContent(), true);
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new \LogicException(sprintf("Failed to parse json string '%s', error: '%s'", $jsonContent, json_last_error_msg()));
        }
        if(isset($jsonContent['success']) && !$jsonContent['success']){
            $message = $jsonContent['data']['message'] ?? 'An error occurred on service';
            $code = $jsonContent['data']['code'] ?? '500';
            throw new \Exception(sprintf("Message: '%s', code: '%s'", $message, $code));
        }
        $locations = [];// or ArrayCollection;
        if(isset($jsonContent['data']['locations'])){
            $locBuilder = new LocationFactory(new Location());
            foreach ($jsonContent['data']['locations'] as $location) {
                // let's suppose that locations are unique
                $locations[] = $locBuilder->getLocation($location);
            }
        }
        return $locations;
    }
}