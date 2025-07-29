<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/course', name: 'course_')]
final class CourseController extends AbstractController
{
    #[Route('/', name: 'list')]
    public function list(): Response
    {
        return $this->render('course/list.html.twig');
    }

    #[Route('/{id}', name: 'show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(int $id): Response
    {
        return $this->render('course/show.html.twig');
    }

    #[Route('/create', name: 'create')]
    public function create(): Response
    {
        return $this->render('course/create.html.twig');
    }

    #[Route('/{id}/edit', name: 'edit', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function edit(int $id): Response
    {
        return $this->render('course/edit.html.twig');
    }


}
