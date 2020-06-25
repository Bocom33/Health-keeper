<?php

namespace App\Controller;

use App\Entity\AnnoyanceZone;
use App\Form\AnnoyanceZoneType;
use App\Repository\AnnoyanceZoneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/annoyance/zone")
 */
class AnnoyanceZoneController extends AbstractController
{
    /**
     * @Route("/", name="annoyance_zone_index", methods={"GET"})
     */
    public function index(AnnoyanceZoneRepository $annoyanceZoneRepository): Response
    {
        return $this->render('annoyance_zone/index.html.twig', [
            'annoyance_zones' => $annoyanceZoneRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="annoyance_zone_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $annoyanceZone = new AnnoyanceZone();
        $form = $this->createForm(AnnoyanceZoneType::class, $annoyanceZone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annoyanceZone);
            $entityManager->flush();

            return $this->redirectToRoute('annoyance_zone_index');
        }

        return $this->render('annoyance_zone/new.html.twig', [
            'annoyance_zone' => $annoyanceZone,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="annoyance_zone_show", methods={"GET"})
     */
    public function show(AnnoyanceZone $annoyanceZone): Response
    {
        return $this->render('annoyance_zone/show.html.twig', [
            'annoyance_zone' => $annoyanceZone,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="annoyance_zone_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AnnoyanceZone $annoyanceZone): Response
    {
        $form = $this->createForm(AnnoyanceZoneType::class, $annoyanceZone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('annoyance_zone_index');
        }

        return $this->render('annoyance_zone/edit.html.twig', [
            'annoyance_zone' => $annoyanceZone,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="annoyance_zone_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AnnoyanceZone $annoyanceZone): Response
    {
        if ($this->isCsrfTokenValid('delete'.$annoyanceZone->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($annoyanceZone);
            $entityManager->flush();
        }

        return $this->redirectToRoute('annoyance_zone_index');
    }
}
