<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Team;
use App\Form\TeamCreateFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

final class GameController extends AbstractController
{
    // Page d'accueil du jeu (avec un bouton pour créer une équipe)
    #[Route('/', name: 'app_game')]
    public function index(): Response
    {
        return $this->render('game/index.html.twig', [
            'controller_name' => 'Accueil',
        ]);
    }

    // Page pour commencer le jeu (après avoir créé une équipe)
    #[Route('/start', name: 'game_start')]
    public function start(Request $request): Response
    {
        $form = $this->createForm(TeamCreateFormType::class);
        
        return $this->render('game/start.html.twig', [
            'controller_name' => 'Commencer la partie',
            'form' => $form->createView(),
        ]);
    }
}
