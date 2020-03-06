<?php

namespace App\Controller;

use App\Repository\PropretyRepository;
use \Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(PropretyRepository $repository) :Response
    {
        $properties=$repository->findLatest();
        return $this->render('home/index.html.twig',[
            'properties'=>$properties]);
    }
}
