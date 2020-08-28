<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Nelmio\Alice\Loader\NativeLoader;

class AppFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     * @throws \Nelmio\Alice\Throwable\LoadingThrowable
     *
     */
    public function load(ObjectManager $manager)
    {
        $objectSet = (new NativeLoader())->loadFile(__DIR__.'/../../fixtures/data.yml');
        foreach ($objectSet->getObjects() as $object) {
            $manager->persist($object);
        }

        $manager->flush();
    }
}
