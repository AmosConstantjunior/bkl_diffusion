<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Profil2Controller extends AbstractController
{
    /**
     * @Route("/profil2", name="profil2")
     */
    public function index()
    {
        return $this->render('profil2/index.html.twig', [
            'controller_name' => 'Profil2Controller',
        ]);
    }
}
