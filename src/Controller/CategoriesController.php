<?php

namespace App\Controller;

use App\Entity\Categories;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


#[Route('/categories', name: 'categories_')]
class CategoriesController extends AbstractController
{
   
    #[Route('/{id}', name: 'list')]
    // #[ParamConverter('product', class: 'App\Entity\Products')]
    public function list(Categories $category): Response
    {
        //  dd($product);

        // On va chercher la liste des produits de chaque catégorie
$products = $category->getProducts();

        return $this->render('categories/list.html.twig', compact('category', 'products'));
    }
}
