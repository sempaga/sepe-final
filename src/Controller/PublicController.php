<?php

namespace App\Controller;

use App\FakeData\Paises;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class PublicController extends AbstractController
{

    public function home()
    {
        return $this->render('public/home.html.twig');
    }

    public function login()
    {
        return $this->render('public/login.html.twig');
    }

   
    public function about()
    {
        return $this->render('public/about.html.twig');
    }
    public function signin()
    {

        $paises = Paises::$paises;
        $response= $this->render('public/signin.html.twig',[
            'paises'=>$paises,
        ]);
        return $response;
    }

    
}