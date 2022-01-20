<?php

namespace App\Controller;

use App\Form\SearchCommandType;
use App\Repository\CommandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrackCommandController extends AbstractController
{
    /**
     * @Route("/track/command", name="track_command")
     */
    public function index(Request $request, CommandRepository $commandRepository): Response
    {
        $command = [];
        $form = $this->createForm(SearchCommandType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $search = $form->getData()['search'];
            $command = $commandRepository->findBy(['reference' => $search]);
        }

        return $this->render('chat/track_command/index.html.twig', [
            'form' => $form->createView(),
            'commands' => $command
        ]);
    }
}
