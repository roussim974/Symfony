<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Form\AnnonceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Service\FileUploader;

class AnnonceController extends Controller
{

    /**
     * @Route("/annonce/add", name="security_add_annonce")
     */
    public function addAnnonce(Request $request, FileUploader $fileUploader)
    {
        $user = $this->getUser();
        $annonce = new Annonce();
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $file = $form->get('picture')->getData();
            $fileName = $fileUploader->upload($file);
            $annonce->setPicture($fileName);
            $annonce->setOwner($user);
            $em->persist($annonce);
            $em->flush();
            return $this->redirectToRoute('security_add_annonce');
        }
        return $this->render('annonce/index.html.twig', [
            'form' => $form->createView()
        ]);
    }



}
