<?php

namespace App\Controller;

use App\Form\CandidatureType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\candidature;
use App\Entity\offre;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Reponse;

class CandidatureController extends AbstractController
{
    /**
     * @Route("/candidature", name="candidature")
     */
    public function index()
    {
        return $this->render('candidature/add.html.twig', [
            'controller_name' => 'CandidatureController',
        ]);
    }
    /**
     * @Route("/candidature/new")
     */
    public function new(Request $request)
    {
        $candidature = new candidature();

        $form = $this->createForm(CandidatureType::class, $candidature);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
        }
        return $this->render('candidature/add.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/candidature/edit/{candidature}")
     * @param Request $request
     */
    public function edit(Request $request, candidature $candidature)
    {

        $form = $this->createForm(CandidatureType::class, $candidature);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
        }
        return $this->render('candidature/edit.html.twig', array('form' => $form->createView()));
    }
}
