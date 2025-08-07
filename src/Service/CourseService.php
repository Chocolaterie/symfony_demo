<?php

namespace App\Service;

use App\Repository\CourseRepository;

class CourseService
{
    // Quand on est dans un service on peut injecter que dans le constructeur
    // Alors que dans les controllers on peut ajouter dans les routes/méthodes
    public function __construct(private CourseRepository $courseRepository){
    }

    function getPublishedCourses() {

        $courses = $this->courseRepository->findBy(['published' => true], ['name' => 'DESC'], 5);

        return $courses;
    }
}