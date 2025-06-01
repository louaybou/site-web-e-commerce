<?php

namespace App\Controller;

use App\Entity\Commande;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// Ajoute l'import Stripe
use Stripe\Stripe;
use Stripe\PaymentIntent;

class OrderController extends AbstractController
{
    #[Route('/commander', name: 'valider_commande', methods: ['POST'])]
    public function validerCommande(Request $request, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $produits = json_decode($request->request->get('produits'), true); // tableau de produits
        $total = $request->request->get('total');
        $adresse = $request->request->get('adresse');
        $paiement = $request->request->get('paiement');
        $paymentMethodId = $request->request->get('paymentMethodId'); // Stripe

        if ($paiement === 'card' && $paymentMethodId) {
            \Stripe\Stripe::setApiKey('sk strip'); // Mets ta clé secrète Stripe ici

            try {
                $intent = \Stripe\PaymentIntent::create([
                    'amount' => intval($total * 100), 
                    'currency' => 'eur',
                    'payment_method' => $paymentMethodId,
                    'confirmation_method' => 'manual',
                    'confirm' => true,
                ]);
                if ($intent->status !== 'succeeded') {
                    $this->addFlash('danger', 'Le paiement par carte a échoué.');
                    return $this->redirectToRoute('home');
                }
            } catch (\Exception $e) {
                $this->addFlash('danger', 'Erreur Stripe : ' . $e->getMessage());
                return $this->redirectToRoute('home');
            }
        }

        $commande = new Commande();
        $commande->setUser($user);
        $commande->setCreatedAt(new \DateTimeImmutable());
        $commande->setProduits($produits);
        $commande->setTotal($total);
        $commande->setAdresse($adresse);
        $commande->setPaiement($paiement);
        $commande->setStatut('validee');

        $em->persist($commande);
        $em->flush();

        $this->addFlash('success', 'Votre commande a bien été enregistrée !');
        return $this->redirectToRoute('home');
    }
}