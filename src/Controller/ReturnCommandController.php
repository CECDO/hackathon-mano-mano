<?php

namespace App\Controller;

use App\Entity\Command;
use App\Form\SearchCommandType;
use App\Repository\CommandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReturnCommandController extends AbstractController
{
    /**
     * @Route("/return/command", name="return_command")
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

        return $this->render('chat/return_command/index.html.twig', [
            'form' => $form->createView(),
            'commands' => $command,
        ]);
    }

    /**
     * @Route("/return/command/{id}", name="return_command_id")
     */
    public function step2(Command $command): Response
    {
        return $this->render('chat/return_command/show.html.twig', [
            'command' => $command,
        ]);
    }


    /**
     * @Route("/return/command/change_opinion/{id}", name="return_command_opinion")
     */
    public function opinion(Command $command): Response
    {
        return $this->render('chat/return_command/change.html.twig', [
            'command' => $command,
        ]);
    }
}
