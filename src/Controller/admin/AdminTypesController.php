<?php

namespace App\Controller\admin;

use App\Entity\Type;
use App\Form\CategorieType;
use App\Repository\TypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminTypesController extends AbstractController
{
    #[Route('/admin/categories', name: 'admin_categories')]
    public function index(TypeRepository $repo): Response
    {
        $categories = $repo->findAll();
        return $this->render('admin/admin_types/index.html.twig', [
            'page_title' => 'Gestion des catégories',
            'categories' => $categories
        ]);
    }
    #[Route('/admin/categories/{id}', name: 'delete_categories', methods:['DELETE'])]
    public function deleteCategory(EntityManagerInterface $manager, $id, Request $request): Response
    {
        $category = $manager->getRepository(Type::class)->find($id);
        if (!$category) {
           throw $this->createNotFoundException(
               "La catégorie n'a pas été trouvé en base de données" .$id
           );
       }
        if($this->isCsrfTokenValid('DELETE'.$category->getId(), $request->get('_token'))){
           $manager->remove($category);
           $manager->flush();
           $this->addFlash("success", "La catégorie a bien ét supprimée");
           return $this->redirectToRoute('admin_categories');


        }
    }
    #[Route('/admin/categories/add', name: 'add_categories')]
    #[Route('/admin/categories/update/{id}', name: 'update_categories', methods:['GET','POST'])]
    public function addOrUpdateCategorie(Type $type = null, Request $request, EntityManagerInterface $manager): Response
    {
      if(!$type) {
        
        $type = new Type();
      }
     
        $form = $this->createForm(CategorieType::class, $type);
        $form->handleRequest($request);
          if ($form->isSubmitted() && $form->isValid()) {
              $modification = $type->getId()!== null;
            $manager->persist($type);
            $manager->flush();
            $this->addFlash("success", ($modification) ? "La modification a bien été effectuée" : "La nouvelle catégorie a bien été ajoutée");
            return $this->redirectToRoute("admin_categories"); // retour à la page administration
        }
        return $this->render('admin/admin_types/addOrUpdateType.html.twig', [
            
            'form' => $form->createView(),
            'type' => $type,
            'modification' => $type->getId() !== null
          
        ]);
    }
}
