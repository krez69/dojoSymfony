<?php

namespace App\Controller;

use App\Entity\Framework;
use App\Entity\Language;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LanguageController extends AbstractController
{
    /**
     * @Route("/language", name="language")
     */
    public function index()
    {
        $languages = $this->getDoctrine()
        ->getRepository(Language::class)
            ->findAll();
        return $this->render('language/index.html.twig', [
            'controller_name' => 'LanguageController',
            'languages'=>$languages,
        ]);
    }

    /**
     * @Route("/language/{id}", name="language_show")
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $repo = $this->getDoctrine()
            ->getRepository(Language::class);

        $language = $repo->find($id);

        return $this->render('language/show.html.twig',[
            'language' => $language
        ]);
    }
}
