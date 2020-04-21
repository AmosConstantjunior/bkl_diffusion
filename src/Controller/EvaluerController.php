<?php

namespace App\Controller;

use App\Entity\Evaluer;
use App\Form\EvaluerType;
use App\Repository\EvaluerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/evaluer")
 */
class EvaluerController extends AbstractController
{
    /**
     * @Route("/", name="evaluer_index", methods={"GET"})
     */
    public function index(EvaluerRepository $evaluerRepository): Response
    {
        return $this->render('evaluer/index.html.twig', [
            'evaluers' => $evaluerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="evaluer_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $evaluer = new Evaluer();
        $form = $this->createForm(EvaluerType::class, $evaluer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($evaluer);
            $entityManager->flush();

            return $this->redirectToRoute('evaluer_index');
        }

        return $this->render('evaluer/new.html.twig', [
            'evaluer' => $evaluer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="evaluer_show", methods={"GET"})
     */
    public function show(Evaluer $evaluer): Response
    {
        return $this->render('evaluer/show.html.twig', [
            'evaluer' => $evaluer,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="evaluer_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Evaluer $evaluer): Response
    {
        $form = $this->createForm(EvaluerType::class, $evaluer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evaluer_index');
        }

        return $this->render('evaluer/edit.html.twig', [
            'evaluer' => $evaluer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="evaluer_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Evaluer $evaluer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evaluer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($evaluer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('evaluer_index');
    }
}
