<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SignupType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SignupController extends AbstractController
{
    #[Route('/signup', name: 'signup')]
    public function index( Request $request, EntityManagerInterface $manager): Response
    {
      
        $user = new User();
        
        $form = $this->createForm(SignupType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($user);
            $manager->flush();
            $this->addFlash("success", "Vous êtes inscrit !");
            return $this->redirectToRoute('aliments');

        } 
        return $this->render('signup/index.html.twig', [
            'page_title' => 'Inscription',
            'form' => $form->createView()
          
        ]);
    }
}
