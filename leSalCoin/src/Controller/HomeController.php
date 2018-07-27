<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Repository\AnnonceRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home_page")
     */
    public function index(AnnonceRepository $repository)
    {

        $annonces = $repository->findAll ();
        return $this->render (
            "home/index.html.twig", [
                "annonces" => $annonces
            ]);


//        return $this->render('home/index.html.twig', [
//            'controller_name' => 'HomeController',
//        ]);
    }


}
