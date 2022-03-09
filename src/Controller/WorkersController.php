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

        //~ URL appelée nous retournant des données au format JSON
        $data_url = 'http://api.randomuser.me/?results=12';

        //~ On appelle l'URL et on stocke le contenu retourné dans une variable
        $data_contenu = file_get_contents($data_url);

        //~ Les données étant au format JSON, on les décode pour les stocker sous la forme d'un tableau associatif
        $data_array = json_decode($data_contenu, true);

        //~ On pointe directement sur les données du/des utilisateur(s) retourné(s)
        $utilisateurs = $data_array['results'];

        //dd($utilisateurs);

        return $this->render('workers/index.html.twig', [
            'controller_name' => 'WorkersController',
            "workers" => $utilisateurs,
        ]);
    }
}
