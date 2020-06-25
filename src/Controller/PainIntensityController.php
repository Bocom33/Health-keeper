<?php

namespace App\Controller;

use App\Entity\PainIntensity;
use App\Form\PainIntensityType;
use App\Repository\PainIntensityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pain/intensity")
 */
class PainIntensityController extends AbstractController
{
    /**
     * @Route("/", name="pain_intensity_index", methods={"GET"})
     */
    public function index(PainIntensityRepository $painIntensityRepository): Response
    {
        return $this->render('pain_intensity/index.html.twig', [
            'pain_intensities' => $painIntensityRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="pain_intensity_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $painIntensity = new PainIntensity();
        $form = $this->createForm(PainIntensityType::class, $painIntensity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($painIntensity);
            $entityManager->flush();

            return $this->redirectToRoute('pain_intensity_index');
        }

        return $this->render('pain_intensity/new.html.twig', [
            'pain_intensity' => $painIntensity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pain_intensity_show", methods={"GET"})
     */
    public function show(PainIntensity $painIntensity): Response
    {
        return $this->render('pain_intensity/show.html.twig', [
            'pain_intensity' => $painIntensity,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pain_intensity_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PainIntensity $painIntensity): Response
    {
        $form = $this->createForm(PainIntensityType::class, $painIntensity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pain_intensity_index');
        }

        return $this->render('pain_intensity/edit.html.twig', [
            'pain_intensity' => $painIntensity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pain_intensity_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PainIntensity $painIntensity): Response
    {
        if ($this->isCsrfTokenValid('delete'.$painIntensity->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($painIntensity);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pain_intensity_index');
    }
}
