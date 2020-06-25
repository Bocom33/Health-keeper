<?php

namespace App\Controller;

use App\Entity\MedicalRecord;
use App\Repository\MedicalRecordRepository;
use http\Env\Request;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MedicalRecordController extends AbstractController
{
    /**
     * @Route("/medical/record", name="medical_record")
     */
    public function index()
    {
        return $this->render('medical_record/index.html.twig', [
            'controller_name' => 'MedicalRecordController',
        ]);
    }

    /**
     * @Route("/medical/record/show/{id}", name="medical_record_show")
     */
    public function show(MedicalRecord $medicalRecord)
    {
        return $this->render('medical_record/show.html.twig', [
            'medical_record' => $medicalRecord,
        ]);
    }


    /**
     * @Route("/medical/record/all", name="medical_record_all")
     */
    public function all(MedicalRecordRepository $medicalRecordRepository)
    {
        $records = $medicalRecordRepository->findAll();
        return $this->render('medical_record/show_all.html.twig', [
            'records' => $records,
        ]);
    }
}
