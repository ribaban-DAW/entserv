<?php

namespace App\Controller;

use App\Entity\Piedra;
use App\Form\PiedraType;
use App\Repository\PiedraRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/piedra')]
final class PiedraController extends AbstractController
{
    #[Route(name: 'app_piedra_index', methods: ['GET'])]
    public function index(PiedraRepository $piedraRepository): Response
    {
        return $this->render('piedra/index.html.twig', [
            'piedras' => $piedraRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_piedra_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $piedra = new Piedra();
        $form = $this->createForm(PiedraType::class, $piedra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($piedra);
            $entityManager->flush();

            return $this->redirectToRoute('app_piedra_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('piedra/new.html.twig', [
            'piedra' => $piedra,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_piedra_show', methods: ['GET'])]
    public function show(Piedra $piedra): Response
    {
        return $this->render('piedra/show.html.twig', [
            'piedra' => $piedra,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_piedra_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Piedra $piedra, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PiedraType::class, $piedra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_piedra_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('piedra/edit.html.twig', [
            'piedra' => $piedra,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_piedra_delete', methods: ['POST'])]
    public function delete(Request $request, Piedra $piedra, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$piedra->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($piedra);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_piedra_index', [], Response::HTTP_SEE_OTHER);
    }
}
