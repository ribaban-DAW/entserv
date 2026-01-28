<?php

namespace App\Controller;

use App\Entity\Historial;
use App\Form\HistorialType;
use App\Repository\HistorialRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/historial')]
final class HistorialController extends AbstractController
{
    #[Route(name: 'app_historial_index', methods: ['GET'])]
    public function index(HistorialRepository $historialRepository): Response
    {
        return $this->render('historial/index.html.twig', [
            'historials' => $historialRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_historial_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $historial = new Historial();
        $form = $this->createForm(HistorialType::class, $historial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($historial);
            $entityManager->flush();

            return $this->redirectToRoute('app_historial_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('historial/new.html.twig', [
            'historial' => $historial,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_historial_show', methods: ['GET'])]
    public function show(Historial $historial): Response
    {
        return $this->render('historial/show.html.twig', [
            'historial' => $historial,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_historial_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Historial $historial, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(HistorialType::class, $historial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_historial_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('historial/edit.html.twig', [
            'historial' => $historial,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_historial_delete', methods: ['POST'])]
    public function delete(Request $request, Historial $historial, EntityManagerInterface $entityManager): Response
    {
        // Robado de https://stackoverflow.com/questions/29737610/how-to-disable-cascade-deletion-for-many-to-many-relations
        try {
            if ($this->isCsrfTokenValid('delete'.$historial->getId(), $request->getPayload()->getString('_token'))) {
                $entityManager->remove($historial);
                $entityManager->flush();
            }
        } catch (\Doctrine\DBAL\Exception\ForeignKeyConstraintViolationException $e) {
            $this->addFlash('error', 'No se puede eliminar el historial porque está asociado a otros registros.');
            return $this->redirectToRoute('app_historial_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->redirectToRoute('app_historial_index', [], Response::HTTP_SEE_OTHER);
    }
}
