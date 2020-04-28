<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AttestationClientsController extends AbstractController
{
    /**
     * @Route("/attestation/clients", name="attestation_clients")
     */
    public function index()
    {
        return $this->render('attestation_clients/index.html.twig', [
            'controller_name' => 'AttestationClientsController',
        ]);
    }
}
