<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\OffreType;
use App\Entity\offre;
use App\Entity\job;
use App\Entity\competence;
use App\Entity\contrat;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Reponse;

class OffreController extends AbstractController
{
    /**
     * @Route("/offre", name="offre")
     */
    public function index()
    {
        return $this->render('offre/index.html.twig', [
            'controller_name' => 'OffreController',
        ]);
    }
    /**
     * @Route("/offre/new")
     */
    public function new(Request $request)
    {
        $offre = new offre();
;

        $form = $this->createForm(OffreType::class, $offre);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
        }
        return $this->render('offre/add.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/offre/edit/{offre}")
     * @param Request $request
     */
    public function edit(Request $request, offre $offre)
    {

        $form = $this->createForm(OffreType::class, $offre);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
        }
        return $this->render('offre/edit.html.twig', array('form' => $form->createView()));
    }
}
