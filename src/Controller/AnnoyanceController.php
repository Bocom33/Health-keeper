<?php

namespace App\Controller;

use App\Entity\Annoyance;
use App\Form\AnnoyanceType;
use App\Repository\AnnoyanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/annoyance")
 */
class AnnoyanceController extends AbstractController
{
    /**
     * @Route("/", name="annoyance_index", methods={"GET"})
     */
    public function index(AnnoyanceRepository $annoyanceRepository): Response
    {
        return $this->render('annoyance/index.html.twig', [
            'annoyances' => $annoyanceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="annoyance_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $annoyance = new Annoyance();
        $form = $this->createForm(AnnoyanceType::class, $annoyance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annoyance);
            $entityManager->flush();

            return $this->redirectToRoute('annoyance_index');
        }

        return $this->render('annoyance/new.html.twig', [
            'annoyance' => $annoyance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="annoyance_show", methods={"GET"})
     */
    public function show(Annoyance $annoyance): Response
    {
        return $this->render('annoyance/show.html.twig', [
            'annoyance' => $annoyance,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="annoyance_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Annoyance $annoyance): Response
    {
        $form = $this->createForm(AnnoyanceType::class, $annoyance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('annoyance_index');
        }

        return $this->render('annoyance/edit.html.twig', [
            'annoyance' => $annoyance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="annoyance_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Annoyance $annoyance): Response
    {
        if ($this->isCsrfTokenValid('delete'.$annoyance->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($annoyance);
            $entityManager->flush();
        }

        return $this->redirectToRoute('annoyance_index');
    }
}
