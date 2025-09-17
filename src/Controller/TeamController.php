<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\TeamCreateFormType;

final class TeamController extends AbstractController
{
    #[Route('/team', name: 'app_team')]
    public function index(): Response
    {
        return $this->render('team/index.html.twig', [
            'controller_name' => 'TeamController',
        ]);
    }

    #[Route('/team/create', name: 'app_team_create')]
    public function create(): Response
    {

        $form = $this->createForm(TeamCreateFormType::class);

        return $this->render('team/create.html.twig', [
            'controller_name' => 'Créer une équipe',
            'form' => $form->createView(),
        ]);
    }
}
