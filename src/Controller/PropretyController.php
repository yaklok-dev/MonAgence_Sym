<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PropretyController extends AbstractController
{
    /**
     * @Route("/biens", name="proprety")
     */
    public function index()
    {
        return $this->render('proprety/index.html.twig',[
            'current_menu'=>'proprety'
        ]);
    }
}
