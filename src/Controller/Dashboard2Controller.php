<?php

namespace App\Controller;

use App\Repository\ClientsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Dashboard2Controller extends AbstractController
{
    /**
     * @Route("/dashboard2", name="dashboard2")
     */
    public function index( ClientsRepository $clientsRepository)
    {
        $clients=$clientsRepository->findAll();
        return $this->render('dashboard2/index.html.twig', [
            'clients' => $clients,
        ]);
    }
}
