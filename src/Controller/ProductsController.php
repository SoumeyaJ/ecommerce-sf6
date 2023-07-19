<?php

namespace App\Controller;

use App\Entity\Products;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


#[Route('/products', name: 'products_')]
class ProductsController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('products/index.html.twig', [
            // 'controller_name' => 'ProductsController',
        ]);
    }

    #[Route('/{id}', name: 'details')]
    // #[ParamConverter('product', class: 'App\Entity\Products')]
    public function details(Products $product): Response
    {
        //  dd($product);
        return $this->render('products/details.html.twig', compact('product'));
    }
}
