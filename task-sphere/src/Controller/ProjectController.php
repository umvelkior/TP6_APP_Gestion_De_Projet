<?php

namespace App\Controller;

use App\Entity\Project;
use App\Entity\User;
use App\Service\ProjectService;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProjectController extends AbstractController
{
    #[Route('/projects/{KeyCode}', name: 'app_project')]
    public function show(?Project $project): Response
    {
        return $this->render('project/index.html.twig', [
            'controller_name' => 'ProjectController'
        ]);
    }

    /*#[Route('/{key}', name: 'show',methods: ['GET'])]
    public function show(?Project $project, UserService $userService): Response
    {
        if (null === $project) {
            return $this->redirectToRoute('project_index');
        }

        $userService->setSelectedProject($this->getUser(), $project);

        return $this->render('project/show.html.twig', [
            'project' => $project
        ]);
    }*/
}
