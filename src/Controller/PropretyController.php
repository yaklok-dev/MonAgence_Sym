<?php

namespace App\Controller;

use App\Entity\Proprety;
use App\Repository\PropretyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class PropretyController extends AbstractController
{
    /**
     * @var PropretyRepository
     */
    private $repository;
    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * PropretyController constructor.
     * @param PropretyRepository $repository
     * @param EntityManagerInterface $em
     */
    public function __construct(PropretyRepository $repository, EntityManagerInterface $em)
    {
        $this->repository=$repository;
        $this->em=$em;
    }

    /**
     * @Route("/biens", name="proprety.index")
     */
    public function index()
    {

        return $this->render('proprety/index.html.twig',[
            'current_menu'=>'proprety'
        ]);
    }

    /**
     * @Route("/biens/{slug}-{id}", name="proprety.show", requirements={"slug": "[a-z0-9/-]*"})
     * @param $slug
     * @param $id
     * @return Response
     */
    public function show( Proprety $proprety,string $slug):Response{

        if($proprety->getSlug()!== $slug){
            return $this->redirectToRoute('property.show',[
                'id'   =>$proprety->getId(),
                'slug' =>$proprety->getSlug()
            ],301);
        }
        return $this->render('proprety/show.html.twig',[
            'proprety'=>$proprety,
            'current_menu'=>'property'

        ]);
    }}
