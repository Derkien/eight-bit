<?php

namespace Derkien\EightBitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EightBitBundle:Default:index.html.twig');
    }

    /**
     * Render data
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \InvalidArgumentException
     */
    public function getDataAction()
    {
        $host = '';
        if($host == ''){
            throw new \InvalidArgumentException("Set up test url with data");
        }
        $data = $this->container->get('eight_bit.utils.curl_utils')->getLocations($host);
        return $this->render('@EightBit/Default/index.html.twig', ['locations' => $data]);
    }

    public function getJsonDataAction()
    {
        return $this->json(
            [
                'data' =>
                    [
                        'locations' =>
                            [
                                0 =>
                                    [
                                        'name' => 'Eiffel Tower',
                                        'coordinates' =>
                                            [
                                                'lat' => 21.12,
                                                'long' => 19.56,
                                            ],
                                    ],
                                1 =>
                                    [
                                        'name' => 'Cathédrale Notre-Dame de Paris',
                                        'coordinates' =>
                                            [
                                                'lat' => 48.8529682,
                                                'long' => 2.3477134,
                                            ],
                                    ],
                                2 =>
                                    [
                                        'name' => 'Ostankino TV Tower',
                                        'coordinates' =>
                                            [
                                                'lat' => 55.819725,
                                                'long' => 37.6094783,
                                            ],
                                    ],
                            ],
                    ],
                'success' => true,
            ]
        );
    }

    public function getJsonErrAction()
    {
        return $this->json(
            [
                'data' =>
                    [
                        'message' => 'Data Error',
                        'code' => '222',
                    ],
                'success' => false,
            ]
        );
    }
}
