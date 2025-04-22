<?php

namespace App\Controller;

use App\Entity\Project;
use App\Service\ProjectService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    private $projectService;

    // Injection du service ProjectService dans le contrôleur
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    #[Route('/projects/{keyCode}', name: 'project_show')]
    public function show(?Project $project): Response
    {
        return $this->render('project/show.html.twig', [
            'project' => $project,
        ]);
    }

    #[Route('/projects', name: 'project_list')]
    public function list(): Response
    {
        // Utilisation du service pour obtenir les projets de l'utilisateur
        $projects = $this->projectService->getProjectsList($this->getUser());

        return $this->render('project/list.html.twig', [
            'projects' => $projects,
        ]);
    }
}

