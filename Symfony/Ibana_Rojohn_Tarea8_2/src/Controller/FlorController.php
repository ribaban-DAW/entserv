<?php

namespace App\Controller;

use App\Entity\Flor;
use App\Form\FlorType;
use App\Repository\FlorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/flor')]
final class FlorController extends AbstractController
{
    #[Route(name: 'app_flor_index', methods: ['GET'])]
    public function index(FlorRepository $florRepository): Response
    {
        return $this->render('flor/index.html.twig', [
            'flores' => $florRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_flor_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $flor = new Flor();

        $form = $this->createForm(FlorType::class, $flor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($flor);
            $entityManager->flush();

            return $this->redirectToRoute('app_flor_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('flor/new.html.twig', [
            'flor' => $flor,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_flor_show', methods: ['GET'])]
    public function show(Flor $flor): Response
    {
        return $this->render('flor/show.html.twig', [
            'flor' => $flor,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_flor_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Flor $flor, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FlorType::class, $flor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_flor_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('flor/edit.html.twig', [
            'flor' => $flor,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_flor_delete', methods: ['POST'])]
    public function delete(Request $request, Flor $flor, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$flor->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($flor);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_flor_index', [], Response::HTTP_SEE_OTHER);
    }
}
