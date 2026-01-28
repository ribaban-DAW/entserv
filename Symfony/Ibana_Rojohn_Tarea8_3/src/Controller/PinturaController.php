<?php

namespace App\Controller;

use App\Entity\Pintura;
use App\Form\PinturaType;
use App\Repository\PinturaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/pintura')]
final class PinturaController extends AbstractController
{
    #[Route(name: 'app_pintura_index', methods: ['GET'])]
    public function index(PinturaRepository $pinturaRepository): Response
    {
        return $this->render('pintura/index.html.twig', [
            'pinturas' => $pinturaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pintura_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $pintura = new Pintura();
        $form = $this->createForm(PinturaType::class, $pintura);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($pintura);
            $entityManager->flush();

            return $this->redirectToRoute('app_pintura_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pintura/new.html.twig', [
            'pintura' => $pintura,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pintura_show', methods: ['GET'])]
    public function show(Pintura $pintura): Response
    {
        return $this->render('pintura/show.html.twig', [
            'pintura' => $pintura,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pintura_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pintura $pintura, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PinturaType::class, $pintura);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_pintura_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pintura/edit.html.twig', [
            'pintura' => $pintura,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pintura_delete', methods: ['POST'])]
    public function delete(Request $request, Pintura $pintura, EntityManagerInterface $entityManager): Response
    {
        try {
            if ($this->isCsrfTokenValid('delete'.$pintura->getId(), $request->getPayload()->getString('_token'))) {
                $entityManager->remove($pintura);
                $entityManager->flush();
            }
        } catch (\Doctrine\DBAL\Exception\ForeignKeyConstraintViolationException $e) {
            $this->addFlash('error', 'No se puede eliminar la pintura porque está asociada a otros registros.');
        }

        return $this->redirectToRoute('app_pintura_index', [], Response::HTTP_SEE_OTHER);
    }
}
