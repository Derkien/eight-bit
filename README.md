# Symfony3 bundle for getting JSON-encoded locations data
Implemented Symfony3 bundle for getting JSON-encoded locations data stored in predefined format (see data examples [here](https://github.com/Derkien/eight-bit/tree/master/EightBitBundle/Resources/data)).

## Description
* Client defined as a service class in a bundle config;
* Client utilize CURL as a transport layer and rely upon third-party bundle [sensio/buzz-bundle](https://github.com/sensiolabs/SensioBuzzBundle);  
* Properly defined exceptions are thrown on CURL errors, malformed JSON response and error JSON response;
* Resulting data are fetched as an array of properly defined PHP objects (`EightBitBundle\Entity\Location`).

## Installation
_If you don't have symfony installed - go [here](http://symfony.com/doc/current/setup.html)._

Installing the bundle via packagist is the quickest and simplest method of installing the bundle. Here are the steps:

### Step 1: Composer require

    $ php composer.phar require derkien/eight-bit-bundle 1.*

### Step 2: Enable the bundle in the kernel

    <?php
    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Derkien\EightBitBundle\EightBitBundle(),
            new \Sensio\Bundle\BuzzBundle\SensioBuzzBundle()
            // ...
        );
    }

That's it! You are ready to use EightBitBundle with symfony3!
