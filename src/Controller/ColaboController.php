<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class ColaboController extends AbstractController
{
    /**
     * @Route("/colabo", name="colabo_index")
     * @IsGranted("ROLE_USER")
     */
    public function index(): Response
    {
        return $this->render('colabo/index.html.twig', [
            'controller_name' => 'ColaboController',
        ]);
    }
}
