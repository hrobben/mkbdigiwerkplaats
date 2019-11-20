<?php

namespace App\Controller;

use App\Entity\Contactform;
use App\Form\ContactformType;
use App\Repository\ContactformRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contactform")
 */
class ContactformController extends AbstractController
{
    /**
     * @Route("/", name="contactform_index", methods={"GET"})
     */
    public function index(ContactformRepository $contactformRepository): Response
    {
        return $this->render('contactform/index.html.twig', [
            'contactforms' => $contactformRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="contactform_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $contactform = new Contactform();
        $form = $this->createForm(ContactformType::class, $contactform);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contactform);
            $entityManager->flush();

            return $this->redirectToRoute('contactform_index');
        }

        return $this->render('contactform/new.html.twig', [
            'contactform' => $contactform,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contactform_show", methods={"GET"})
     */
    public function show(Contactform $contactform): Response
    {
        return $this->render('contactform/show.html.twig', [
            'contactform' => $contactform,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="contactform_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Contactform $contactform): Response
    {
        $form = $this->createForm(ContactformType::class, $contactform);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contactform_index');
        }

        return $this->render('contactform/edit.html.twig', [
            'contactform' => $contactform,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contactform_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Contactform $contactform): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contactform->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contactform);
            $entityManager->flush();
        }

        return $this->redirectToRoute('contactform_index');
    }
}
