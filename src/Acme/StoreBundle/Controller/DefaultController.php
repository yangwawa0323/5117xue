<?php

namespace Acme\StoreBundle\Controller;

use Acme\StoreBundle\Document\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

    public function indexAction($name) {
        return $this->render('AcmeStoreBundle:Default:index.html.twig', array('name' => $name));
    }

    public function createAction() {
        $product = new Product();
        $product->setName('A foo bar');
        $product->setPrice('19.99');

        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->persist($product);
        $dm->flush();

        return new Response('Created product id' . $product->getId());
    }

    public function showAction($id) {
        $product = $this->get('doctrine_mongodb')
                ->getRepository('AcmeStoreBundle:Product')
                ->find($id);
        try{
            if (!$product) {
                throw $this->createNotFoundException('No product found for id ' . $id);
            } else {
                return $this->render("AcmeStoreBundle:Default:product.html.twig", array('product' => $product));
            }
        } catch(\Exception $e) {
            return new Response("No product found for id " . $id);
        }
    }

}
