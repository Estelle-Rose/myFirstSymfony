<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SignupType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SignupController extends AbstractController
{
    #[Route('/signup', name: 'signup')]
    public function index( Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder): Response
    {
      
        $user = new User();
        
        $form = $this->createForm(SignupType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            // on créer un password crypté avec le UserPasswordEncoderInterface + fonction encodePassword(le user, le password)
            $passwordCrypted = $encoder->encodePassword($user,$user->getPassword());            
            // on met à jour le password avec le nouveau crypté
            $user->setPassword($passwordCrypted);
            $user->setRoles("ROLE_USER");            
            $manager->persist($user);
            $manager->flush();
            $this->addFlash("success", "Vous êtes inscrit !");
            return $this->redirectToRoute('accueil');

        } 
        return $this->render('signup/index.html.twig', [
            'page_title' => 'Inscription',
            'form' => $form->createView()
          
        ]);
    }
    #[Route('/login', name: 'login')]
    public function login(AuthenticationUtils $util): Response // injection de la dépendance AuthenticationUtils
    {

        return $this->render('signup/login.html.twig', [
            "lastUserName"=> $util->getLastUsername(),
            "error" => $util->getLastAuthenticationError(),
            'page_title' => 'Connexion'         
          
        ]);
    }
    
    #[Route("/logout", name: "logout")]
     
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
