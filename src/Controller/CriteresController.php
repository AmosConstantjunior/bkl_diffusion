<?php

namespace App\Controller;

use App\Entity\Criteres;
use App\Form\CriteresType;
use App\Repository\CriteresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/criteres")
 */
class CriteresController extends AbstractController
{
    /**
     * @Route("/", name="criteres_index", methods={"GET"})
     */
    public function index(CriteresRepository $criteresRepository): Response
    {
        return $this->render('criteres/index.html.twig', [
            'criteres' => $criteresRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="criteres_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $critere = new Criteres();
        $form = $this->createForm(CriteresType::class, $critere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($critere);
            $entityManager->flush();

            return $this->redirectToRoute('criteres_index');
        }

        return $this->render('criteres/new.html.twig', [
            'critere' => $critere,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="criteres_show", methods={"GET"})
     */
    public function show(Criteres $critere): Response
    {
        return $this->render('criteres/show.html.twig', [
            'critere' => $critere,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="criteres_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Criteres $critere): Response
    {
        $form = $this->createForm(CriteresType::class, $critere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('criteres_index');
        }

        return $this->render('criteres/edit.html.twig', [
            'critere' => $critere,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="criteres_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Criteres $critere): Response
    {
        if ($this->isCsrfTokenValid('delete'.$critere->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($critere);
            $entityManager->flush();
        }

        return $this->redirectToRoute('criteres_index');
    }
}
