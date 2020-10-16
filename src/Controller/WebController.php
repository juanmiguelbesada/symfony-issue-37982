<?php

namespace App\Controller;

use App\Entity\Season;
use App\Form\SeasonFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class WebController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request)
    {
        $season = $this->getDoctrine()->getManager()->find(Season::class, 1);
        $form = $this->createForm(SeasonFormType::class, $season);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd($form->getData());
        }

        return $this->render('web/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
