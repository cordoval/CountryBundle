Contribute by PR this repo
==========================

      https://github.com/cordoval/CountryBundle

Installation
============

  1. Add this bundle to your project as a Git submodule:

          $ git submodule add git@github.com:Exercise/CountryBundle.git src/Bundle/ExerciseCom/CountryBundle

  2. Add this bundle to your application's kernel:

          // application/ApplicationKernel.php
          public function registerBundles()
          {
              return array(
                  // ...
                  new Bundle\ExerciseCom\CountryBundle\CountryBundle(),
                  // ...
              );
          }

  3. Populate your database with countries defined in the csv file:

          php app/console doctrine:fixtures:load --fixtures=src/Bundle/ExerciseCom/CountryBundle/DataFixtures/MongoDB

    or

          php app/console doctrine:fixtures:load --fixtures=src/Bundle/ExerciseCom/CountryBundle/DataFixtures/ORM

    or just

          php app/console doctrine:fixtures:load

  4. Add configuration:

        country:
            db_driver:       orm


Example Usage
-----------------------------

  1. Load all countries:

          $this->get('doctrine')->getRepository('CountryBundle:Country')->findAll();
