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
 * @Route("/contact")
 */
class ContactformController extends AbstractController
{
    /**
     * @Route("/list", name="contactform_index", methods={"GET"})
     */
    public function index(ContactformRepository $contactformRepository): Response
    {
        return $this->render('contactform/index.html.twig', [
            'contactforms' => $contactformRepository->findAll(),
        ]);
    }

    /**
     * @Route("/", name="contactform_new", methods={"GET","POST"})
     */
    public function new(\Swift_Mailer $mailer, Request $request): Response
    {        
        $contactform = new Contactform();
        $form = $this->createForm(ContactformType::class, $contactform);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ( $this->getParameter('env_parameter') == "dev" ) {
                dump($contactform);  // for debug info
            }
            else {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($contactform);
                $entityManager->flush();

                $message = (new \Swift_Message('Confirmation mail'))
                ->setFrom($contactform->getEmail())
                ->setTo($this->getParameter('mail_parameter'))
                ->setBody(
                    $this->renderView(
                        'emails/confirmation.html.twig', [
                            'name' => $contactform->getName(),
                            'email' => $contactform->getEmail()
                        ]
                    ),
                    'text/html'
                )
                ->addPart(
                    $this->renderView(
                        'emails/confirmation.txt.twig',[
                            'name' => $contactform->getName(),
                            'email' => $contactform->getEmail()
                        ]
                    ),
                    'text/plain'
                );
                $mailer->send($message);
            }
            return $this->render('contactform/new.html.twig', [
                'contactform' => $contactform,
                'form' => $form->createView(),
                'submitted' => true
            ]);
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
