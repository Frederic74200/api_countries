<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RemplirBdController extends AbstractController
{
    #[Route('/remplir')]
    public function index(): Response
    {


        return $this->render('remplirBd.html.twig');
    }
}
