<?php

namespace App\Controller;

use App\Entity\Homepage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/homepage", name="create_homepage")
     */
    public function createHomepage(): Response
    {

        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $homepage = new Homepage();
        $homepage->setName('Homepage');
        $homepage->setTitle('New Homepage');
        $homepage->setMetaData('homepage Meta Data');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($homepage);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new homepage with id '.$homepage->getId());
    }
}
