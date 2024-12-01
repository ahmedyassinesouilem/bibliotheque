<?php
namespace App\Controller;

use App\Entity\Livre;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilController extends AbstractController
{
    #[Route('/acceuil', name: 'app_acceuil')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        // Récupérer tous les livres
        $livres = $entityManager->getRepository(Livre::class)->findAll();

        // Passer les livres à la vue
        return $this->render('acceuil/index.html.twig', [
            'livres' => $livres,
        ]);
    }
}
