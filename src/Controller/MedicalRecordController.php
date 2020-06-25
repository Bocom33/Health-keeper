<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/medical", name="medical")
 *
 */
class MedicalRecordController extends AbstractController
{
    public function index (AnnoyanceRepository $annoyanceRepository ) {
        
    }
}
