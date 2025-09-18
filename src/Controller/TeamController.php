<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\TeamCreateFormType;
use App\Repository\TeamRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use App\Entity\Team;
use Symfony\Component\HttpFoundation\Request;

final class TeamController extends AbstractController
{
    private TeamRepository $teamRepository;
    private EntityManagerInterface $entityManager;
    private FormFactoryInterface $formFactory;

    public function __construct(TeamRepository $teamRepository, EntityManagerInterface $entityManager, FormFactoryInterface $formFactory)
    {
        $this->teamRepository = $teamRepository;
        $this->entityManager = $entityManager;
        $this->formFactory = $formFactory;  
    }

    // Voir toutes les équipes
    #[Route('/teams', name: 'app_team')]
    public function index(): Response
    {
        $teams = $this->teamRepository->findAll();

        return $this->render('team/index.html.twig', [
            'teams' => $teams,
        ]);
    }

    // Créer une équipe
    #[Route('/teams/create', name: 'app_team_create')]
    public function create(Request $request): Response
    {
        $team = new Team();
        $form = $this->createForm(TeamCreateFormType::class, $team);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->entityManager->persist($team);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_team');
        }

        return $this->render('team/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
