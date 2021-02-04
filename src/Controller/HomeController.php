<?php

namespace App\Controller;

use App\Entity\Picture;
use App\Entity\Projet;
use App\Form\ContactType;
use App\Repository\PictureRepository;
use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/", name="home_")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ProjetRepository $repository, PictureRepository $pictureRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'projects' => $repository->findAll(),
            'pictures' => $pictureRepository->findAll(),

        ]);
    }


}
