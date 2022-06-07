<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ColaboController extends AbstractController
{
    /**
     * @Route("/colabo", name="app_colabo")
     */
    public function index(): Response
    {
        return $this->render('colabo/index.html.twig', [
            'controller_name' => 'ColaboController',
        ]);
    }
}
