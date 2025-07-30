<?php

namespace App\Controller;

use App\Entity\Course;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/course', name: 'course_')]
final class CourseController extends AbstractController
{
    #[Route('/', name: 'list', methods: ['GET'])]
    public function list(): Response
    {
        return $this->render('course/list.html.twig');
    }

    #[Route('/{id}', name: 'show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(int $id): Response
    {
        return $this->render('course/show.html.twig');
    }

    #[Route('/create', name: 'create', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        dump($request);
        return $this->render('course/create.html.twig');
    }

    #[Route('/{id}/edit', name: 'edit', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function edit(int $id): Response
    {
        return $this->render('course/edit.html.twig');
    }

    #[Route('/demo', name: 'demo', methods: ['GET'])]
    public function demo(EntityManagerInterface $em) : Response{

        $course = new Course();
        $course->setName("Symfony");
        $course->setPublished(true);
        $course->setContent("Le développement web coté serveur avec Symfony");
        $course->setDuration(10);
        $course->setDateCreated(new \DateTimeImmutable("now"));

        // Inserer le cours en BDD
        $em->persist($course);

        dump($course);

        // Commit
        $em->flush();

        dump($course);

        $course->setName("PHP");
        // update
        $em->flush();

        dump($course);

        // delete
        $em->remove($course);

        $em->flush();

        return $this->render('course/list.html.twig');
    }


}
