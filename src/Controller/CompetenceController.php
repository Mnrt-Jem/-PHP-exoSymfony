<?php

namespace App\Controller;

use App\Form\CompetenceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\competence;
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

class CompetenceController extends AbstractController
{
    /**
     * @Route("/competence", name="competence")
     */
    public function index()
    {
        //$entity->findall;
        return $this->render('competence/index.html.twig', [
            'controller_name' => 'CompetenceController',
        ]);
    }
    /**
     * @Route("/competence/new")
     */
    public function new(Request $request)
    {
        $competence = new competence();

        $form = $this->createForm(CompetenceType::class, $competence);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
        }
        return $this->render('competence/add.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/competence/edit/{competence}")
     * @param Request $request
     */
    public function edit(Request $request, competence $competence)
    {

        $form = $this->createForm(CompetenceType::class, $competence);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
        }
        return $this->render('competence/edit.html.twig', array('form' => $form->createView()));
    }

}
