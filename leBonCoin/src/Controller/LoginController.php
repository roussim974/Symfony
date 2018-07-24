<?php

namespace App\Controller;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        $form = $this->createFormBuilder()
            ->add("name", TextType::class)
            ->add("save", SubmitType::class, ["label" => "create Product"])
            ->getForm();

        return ["form" => $form->createView()];
//        return $this->render('login/login.html.twig', [
//            'controller_name' => 'LoginController',
//        ]);
    }

}
