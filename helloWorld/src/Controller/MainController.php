<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 17/07/2018
 * Time: 14:42
 */

namespace App\Controller;



use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Routing\Annotation\Route;


class MainController extends Controller
{

    /**
     * @Route("/", name="app_home")
     * @Template("main/home.html.twig")
     */
    public function home()
    {
        return ["project_name" => "yourProject"];
    }



}