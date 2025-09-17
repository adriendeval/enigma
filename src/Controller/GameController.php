<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Teams;
use App\Form\TeamCreateFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

final class GameController extends AbstractController
{
    // Page d'accueil du jeu (avec un bouton pour créer une équipe)
    #[Route('/', name: 'app_game')]
    public function index(): Response
    {
        return $this->render('game/index.html.twig');
    }

    // Page pour commencer le jeu (après avoir créé une équipe)
    #[Route('/start', name: 'game_start')]
    public function start(Request $request): Response
    {
        $form = $this->createForm(TeamCreateFormType::class);
        
        return $this->render('game/team.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // Page pour afficher toutes les équipes
    #[Route('/teams', name: 'game_teams')]
    public function teams(EntityManagerInterface $entityManagerInterface): Response
    {
        $teams = $entityManagerInterface->getRepository(Teams::class)->findAll();

        return $this->render('team/index.html.twig', [
            'teams' => $teams,
        ]);
    }
}
