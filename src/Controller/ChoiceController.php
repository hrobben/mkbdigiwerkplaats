<?php

namespace App\Controller;

use App\Entity\Choice;
use App\Form\ChoiceType;
use App\Repository\ChoiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/choice")
 */
class ChoiceController extends AbstractController
{
    /**
     * @Route("/", name="choice_index", methods={"GET"})
     */
    public function index(ChoiceRepository $choiceRepository): Response
    {
        return $this->render('choice/index.html.twig', [
            'choices' => $choiceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="choice_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $choice = new Choice();
        $form = $this->createForm(ChoiceType::class, $choice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($choice);
            $entityManager->flush();

            return $this->redirectToRoute('choice_index');
        }

        return $this->render('choice/new.html.twig', [
            'choice' => $choice,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="choice_show", methods={"GET"})
     */
    public function show(Choice $choice): Response
    {
        return $this->render('choice/show.html.twig', [
            'choice' => $choice,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="choice_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Choice $choice): Response
    {
        $form = $this->createForm(ChoiceType::class, $choice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('choice_index');
        }

        return $this->render('choice/edit.html.twig', [
            'choice' => $choice,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="choice_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Choice $choice): Response
    {
        if ($this->isCsrfTokenValid('delete'.$choice->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($choice);
            $entityManager->flush();
        }

        return $this->redirectToRoute('choice_index');
    }
}
