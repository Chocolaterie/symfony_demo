<?php

namespace App\Service;

use App\Repository\CourseRepository;
use Psr\Log\LoggerInterface;

class CourseService
{
    // Quand on est dans un service on peut injecter que dans le constructeur
    // Alors que dans les controllers on peut ajouter dans les routes/méthodes
    public function __construct(private CourseRepository $courseRepository, private LoggerInterface $logger){
    }

    function getPublishedCourses() {

        $courses = $this->courseRepository->findBy(['published' => true], ['name' => 'DESC'], 5);

        // Logger
        $this->logger->info("La liste des cours publiés a été récupérée avec succès !");

        return $courses;
    }

}
