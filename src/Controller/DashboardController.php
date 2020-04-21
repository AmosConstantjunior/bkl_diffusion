<?php

namespace App\Controller;

use App\Repository\FicheVisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(FicheVisiteRepository $ficheVisiteRepository)
    {
        $interventions = $ficheVisiteRepository->findAll();
        return $this->render('dashboard/index.html.twig', [
            'interventions' => $interventions,
        ]);

    }
}
