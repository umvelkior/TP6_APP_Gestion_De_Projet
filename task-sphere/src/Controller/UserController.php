<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/user/{id?}', name: 'user_show')]
    public function index(?User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user ,
        ]);
    }
}
