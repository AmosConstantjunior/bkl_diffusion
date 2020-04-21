<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Dashboard2Controller extends AbstractController
{
    /**
     * @Route("/dashboard2", name="dashboard2")
     */
    public function index()
    {
        return $this->render('dashboard2/index.html.twig', [
            'controller_name' => 'Dashboard2Controller',
        ]);
    }
}
