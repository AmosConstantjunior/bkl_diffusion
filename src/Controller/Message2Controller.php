<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Message2Controller extends AbstractController
{
    /**
     * @Route("/message2", name="message2")
     */
    public function index()
    {
        return $this->render('message2/index.html.twig', [
            'controller_name' => 'Message2Controller',
        ]);
    }
}
