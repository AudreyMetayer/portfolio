<?php

namespace App\Controller;

use App\Entity\Language;
use App\Entity\Projet;
use App\Form\ProjectType;
use App\Repository\LanguageRepository;
use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/project", name="project_")
 */
class ProjectController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('project/index.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }


    /**
     * @Route("/show", name="show")
     */
    public function show(ProjetRepository $projetRepository): Response
    {
        return $this->render('project/show.html.twig', [
            'projects' => $projetRepository->findAll(),
        ]);
    }



    /**
     * @Route("/new", name="new")
     */

    public function new(ProjetRepository $projetRepository, Request $request) : Response
    {
        $projet = new Projet();
        $form = $this->createForm(ProjectType::class, $projet);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($projet);
            $entityManager->flush();
            return $this->redirectToRoute('home_index');
        }

        return $this->render('project/new.html.twig', [
            "form" => $form->createView(),
        ]);
    }
    

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET", "POST"})
     */
    public function edit(Projet $projet, Request $request)
    {

        $form = $this->createForm(ProjectType::class, $projet);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('project_show');
        }

        return $this->render('project/edit.html.twig', [
            'projet' => $projet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="delete", methods={"DELETE"})
     */

    public function delete(Request $request, Projet $projet) : Response
    {
        if($this->isCsrfTokenValid('delete'.$projet->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($projet);
            $entityManager->flush();

            $this->addFlash('danger', 'Le projet a bien été supprimé.');
        }

        return $this->redirectToRoute('project_show');
    }
}
