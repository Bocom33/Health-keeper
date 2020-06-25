<?php

namespace App\Controller;

use App\Entity\MedicalRecord;
use App\Form\MedicalRecordType;
use App\Repository\AnnoyanceZoneRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BodyController extends AbstractController
{
    /**
     * @Route("/body", name="body")
     */
    public function index()
    {
        return $this->render('body.html.twig', [
            'controller_name' => 'BodyController',
        ]);
    }

    /**
     * @Route("/body/form/{part}", name="body_part")
     */
    public function part($part, AnnoyanceZoneRepository $annoyanceZoneRepository, UserRepository $userRepository, Request $request, EntityManagerInterface $entityManager)
    {

        $medicalRecord = new MedicalRecord();
        $annoyanceZone = $annoyanceZoneRepository->findOneByName($part);
        $medicalRecord->setAnnoyanceZone($annoyanceZone);
        $medicalRecord->setUser($userRepository->findOneByEmail('user@gmail.com'));
        $medicalRecord->setCreatedAt(new \DateTime());
        $formMedical = $this->createForm(MedicalRecordType::class, $medicalRecord);
        $formMedical->handleRequest($request);
        if ($formMedical->isSubmitted() && $formMedical->isValid()) {
            $entityManager->persist($medicalRecord);
            $entityManager->flush();
            //TODO Add flash messsage and redirect to route avec un recap de toutes les douleurs par exemple
            return $this->redirectToRoute('medical_record_show', [
                'id' => $medicalRecord->getId()]);
        }

        return $this->render('medical/index.html.twig', [
            'form' => $formMedical->createView(),
            'zone' => $annoyanceZone,

        ]);
    }

}
