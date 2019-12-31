<?php

namespace App\Controller;

use App\Entity\Info;
use App\Form\InfoType;
use App\Repository\InfoRepository;
use App\Service\Ago;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/info", name="info_")
 */
class InfoController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(InfoRepository $infoRepository): Response
    {
        return $this->render('info/index.html.twig', [
            'infos' => $infoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $info = new Info();
        $form = $this->createForm(InfoType::class, $info);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($info);
            $entityManager->flush();

            return $this->redirectToRoute('info_index');
        }

        return $this->render('info/new.html.twig', [
            'info' => $info,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(Info $info, Ago $ago): Response
    {
        $dateFrom = $ago->diffForHumans($info->getCreatedAt());
        return $this->render('info/show.html.twig', [
            'info' => $info, 'dateInt'=> $dateFrom
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Info $info): Response
    {
        $form = $this->createForm(InfoType::class, $info);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('info_index');
        }

        return $this->render('info/edit.html.twig', [
            'info' => $info,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     */
    public function delete(Request $request, Info $info): Response
    {
        if ($this->isCsrfTokenValid('delete'.$info->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($info);
            $entityManager->flush();
        }

        return $this->redirectToRoute('info_index');
    }
}
