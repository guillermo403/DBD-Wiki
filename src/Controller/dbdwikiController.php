<?php

namespace App\Controller;

use App\Entity\Perks;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Process\Process;
use Symfony\Component\Routing\Annotation\Route;

class dbdwikiController extends AbstractController
{
    /**
     * @Route("/", name="personajes")
     */
    public function personajes()
    {
        $listaPersonajes = file_get_contents('..//public/js/personajes.json');
        $json_personajes = json_decode($listaPersonajes, true);
        $parametros = array('personajes' => $json_personajes);
        return $this -> render('dbdwiki/index.html.twig', $parametros);
    }

    /**
     * @Route("/noticias", name="noticias")
     */
    public function noticias() {
        return $this -> render('dbdwiki/noticias.html.twig');
    }

    /**
     * @Route("/builds", name="builds")
     */
    public function builds() {
        return $this -> render('dbdwiki/builds.html.twig');
    }

    /**
     * @Route("/login", name="login")
     */
    public function login() {
        return $this -> render('dbdwiki/login.html.twig');
    }

}
