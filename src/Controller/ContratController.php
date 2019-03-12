<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
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
use App\Form\ContratType;

class ContratController extends AbstractController
{
    /**
     * @Route("/contrat", name="contrat")
     */
    public function index()
    {
        return $this->render('contrat/index.html.twig', [
            'controller_name' => 'ContratController',
        ]);
    }
    /**
     * @Route("/contrat/new")
     */
    public function new(Request $request)
    {
        $contrat = new contrat();

        $form = $this->createForm(ContratType::class, $contrat);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
        }
        return $this->render('contrat/add.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/contrat/edit/{contrat}")
     * @param Request $request
     */
    public function edit(Request $request, contrat $contrat)
    {

        $form = $this->createForm(ContratType::class, $contrat);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
        }
        return $this->render('contrat/edit.html.twig', array('form' => $form->createView()));
    }
}
