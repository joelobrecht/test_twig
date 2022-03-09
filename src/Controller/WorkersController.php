<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WorkersController extends AbstractController
{
    /**
     * @Route("/", name="app_workers")
     */
    public function index(): Response
    {
        return $this->render('workers/index.html.twig', [
            'controller_name' => 'WorkersController',
        ]);
    }
}
