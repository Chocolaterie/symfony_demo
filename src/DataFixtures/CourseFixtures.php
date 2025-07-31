<?php

namespace App\DataFixtures;

use App\Entity\Course;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CourseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $course = new Course();
        $course->setName("Symfony");
        $course->setContent("Le développement coté serveur avec Symfony");
        $course->setDuration(10);
        $course->setPublished(true);
        $course->setDateCreated(new \DateTimeImmutable());

        // inserer
        $manager->persist($course);

        $course = new Course();
        $course->setName("PHP");
        $course->setContent("Le développement coté serveur avec PHP");
        $course->setDuration(5);
        $course->setPublished(true);
        $course->setDateCreated(new \DateTimeImmutable());
        // inserer
        $manager->persist($course);

        for ($i = 1 ; $i <= 30 ; $i++) {
            $course = new Course();
            $course->setName("Course $i");
            $course->setContent("Contenu du course $i");
            $course->setDuration(mt_rand(1, 10));
            $course->setPublished(true);
            $course->setDateCreated(new \DateTimeImmutable());
            // inserer
            $manager->persist($course);
        }


        $faker = \Faker\Factory::create('fr_FR');
        for ($i = 1 ; $i <= 30 ; $i++) {
            $course = new Course();
            $course->setName($faker->word);
            $course->setContent($faker->realText);
            $course->setDuration($faker->numberBetween(1,10));
            $course->setPublished($faker->boolean);
            $date = $faker->dateTimeBetween('-30 days', '-1 days');
            $course->setDateCreated(\DateTimeImmutable::createFromMutable($date));
            // inserer
            $manager->persist($course);
        }



        $manager->flush();
    }
}
