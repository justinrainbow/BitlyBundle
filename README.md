Installation
============

  1. Add this bundle and Tijs Verkoyen's Bitly class to your project :

          $ git submodule add git://github.com/popofr13/BitlyBundle.git src/Bundle/BitlyBundle
          $ wget http://classes.verkoyen.eu/modules/bitly/files/php_bitly_2_0_1.zip => extract and copy bitly.php to src/vendor/bitly/Bitly.php

  2. Add the `Bitly` class to your project's autoloader bootstrap script:

          // src/autoload.php
          $loader->registerPrefixes(array(
              'Bitly' => $vendorDir.'/bitly',
          ));

  3. Add this bundle to your application's kernel:

          // application/ApplicationKernel.php
          public function registerBundles()
          {
              return array(
                  // ...
                  new Bundle\BitlyBundle\BitlyBundle(),
                  // ...
              );
          }

  4. Configure the `bitly` service in your YAML or XML configuration:

          # application/config/config.yml
          bitly.api:
            login: myBitlyLogin
            api_key: 123456879

          # application/config/config.xml
          <bitly:api
            login="myBitlyLogin"
            api_key="123456879"
          />

  5. Use it! :)

          # Controller or Command file
          $bitly = $this->container->get('bitly');
          $shortened = $bitly->shorten($url);