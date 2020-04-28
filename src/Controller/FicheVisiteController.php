<?php

namespace App\Controller;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Entity\FicheVisite;
use App\Form\FicheVisiteType;
use App\Repository\FicheVisiteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/fiche/visite")
 */
class FicheVisiteController extends AbstractController
{
    /**
     * @Route("/", name="fiche_visite_index", methods={"GET"})
     */
    public function index(FicheVisiteRepository $ficheVisiteRepository): Response
    {
        return $this->render('fiche_visite/index.html.twig', [
            'fiche_visites' => $ficheVisiteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="fiche_visite_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ficheVisite = new FicheVisite();
        $form = $this->createForm(FicheVisiteType::class, $ficheVisite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ficheVisite);
            $entityManager->flush();

            return $this->redirectToRoute('fiche_visite_index');
        }

        return $this->render('fiche_visite/new.html.twig', [
            'fiche_visite' => $ficheVisite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fiche_visite_show", methods={"GET"})
     */
    public function show(FicheVisite $ficheVisite): Response
    {
        return $this->render('fiche_visite/show.html.twig', [
            'fiche_visite' => $ficheVisite,
        ]);
    }


    /**
     * @Route("/{id}/export", name="fiche_visite_export", methods={"GET"})
     */
    public function export(FicheVisite $ficheVisite): Response
    {
        // Configure Dompdf according to your needs
     $pdfOptions = new Options();
     $pdfOptions->set('defaultFont', 'Arial');
     
     // Instantiate Dompdf with our options
     $dompdf = new Dompdf($pdfOptions);
     $html= $this->render('fiche_visite/export.html.twig', [
            'fiche_visite' => $ficheVisite,
        ]);
        // Load HTML to Dompdf
       $dompdf->loadHtml($html);
        
       // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
       $dompdf->setPaper('A4', 'portrait');

       // Render the HTML as PDF
       $dompdf->render();

       // Output the generated PDF to Browser (inline view)
       $dompdf->stream("mypdf.pdf", [
           "Attachment" => false
       ]);
    }

    /**
     * @Route("/{id}/edit", name="fiche_visite_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FicheVisite $ficheVisite): Response
    {
        $form = $this->createForm(FicheVisiteType::class, $ficheVisite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fiche_visite_index');
        }

        return $this->render('fiche_visite/edit.html.twig', [
            'fiche_visite' => $ficheVisite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fiche_visite_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FicheVisite $ficheVisite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ficheVisite->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ficheVisite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fiche_visite_index');
    }
}
