<?php

namespace App\Controller;

use App\Repository\FicheVisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HistoriqueController extends AbstractController
{
    /**
     * @Route("/historique", name="historique")
     */
    public function index(FicheVisiteRepository $ficheVisiteRepository)
    {
        $fiche = $ficheVisiteRepository->findAll();
        return $this->render('historique/index.html.twig', [
            'fiches' => $fiche,
        ]);
    }
}
