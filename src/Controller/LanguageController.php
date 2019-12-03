<?php

namespace App\Controller;

use App\Entity\Framework;
use App\Entity\Language;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
