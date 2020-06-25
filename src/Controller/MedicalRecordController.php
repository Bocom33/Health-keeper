<?php


namespace App\Controller;

use App\Entity\MedicalRecord;
use App\Repository\AnnoyanceRepository;
use App\Entity\Annoyance;
use App\Form\AnnoyanceType;
use App\Repository\AnnoyanceZoneRepository;
use App\Entity\AnnoyanceZone;
use App\Repository\PainIntensityRepository;
use App\Entity\PainIntensityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/medical", name="medical")
 *
 */
class MedicalRecordController extends AbstractController
{

    /**
     * @Route("/", name="_record")
     * @param Request $request
     * @param AnnoyanceRepository $annoyanceRepository
     * @param AnnoyanceZoneRepository $annoyanceZoneRepository
     * @param PainIntensityRepository $painIntensityRepository
     * @return Response
     */

    public function index(
        Request $request,
        AnnoyanceRepository $annoyanceRepository,
        AnnoyanceZoneRepository $annoyanceZoneRepository,
        PainIntensityRepository $painIntensityRepository
    ): Response {

        $medicalRecord = new MedicalRecord;
        $formAnnoyance = $this->createForm(AnnoyanceType::class, $medicalRecord);
        $formAnnoyance->handleRequest($request);

        return $this->render('medical/index.html.twig', [
            'form_annoyance' => $formAnnoyance->createView(),
            'annoyances' => $annoyanceRepository->findAll(),
            'annoyancesZones' => $annoyanceZoneRepository->findAll(),
            'painsIntensities' => $painIntensityRepository->findAll()

        ]);
    }
}
