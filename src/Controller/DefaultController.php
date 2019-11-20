<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [

        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('default/about.html.twig', [

        ]);
    }

    /**
     * @Route("/fillsurvey/{id}", name="fillsurvey")
     */
     public function fillsurvey($id)
     {

         if (isset($_POST['volgende'])){
             $id = $id + 1;
         }

         if (isset($_POST['vorige'])){
             $id = $id - 1;
         }

         $yeehaw = $this->getDoctrine()->getRepository(Question::class)->find(['id' => $id]);


         return $this->render('default/fillsurvey.html.twig', [
            'question' => $yeehaw,
             'id' => $id
         ]);
     }
}
