<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use App\Service\MySlugger;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EventController extends AbstractController
{
    /**
     * @Route("/admin/event/browse", name="admin_event_browse", methods={"GET"})
     */
    public function browse(EventRepository $eventRepository): Response
    {
        $events = $eventRepository->findBy(
            [],
            ['startDatetime' => 'ASC']
        );

        return $this->render('event/browse.html.twig', [
            'events' => $events
        ]);
    }

    /**
     * @Route("/admin/event/read/{slug}", name="admin_event_read", methods={"GET"})
     */
    public function read(Event $event = null): Response
    {

        // 404 ?
        if (null === $event) {
            throw $this->createNotFoundException('Evènement non trouvé.');
        }
        return $this->render('event/read.html.twig', [
            'event' => $event
        ]);
    }

    /**
     * @Route("/admin/event/edit/{slug}", name="admin_event_edit", methods={"GET", "POST"})
     */
    public function edit(Event $event = null, Request $request, MySlugger $slugger): Response
    {
        // 404
        if (null === $event) {
            throw $this->createNotFoundException('Evénement non trouvé.');
        }

        $form = $this->createForm(EventType::class, $event);
        $form->add('Enregister', SubmitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $event->setSlug($slugger->slugify($event->getName()));

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->addFlash('success', 'L\'évènement a bien été modifié.');

            return $this->redirectToRoute('admin_event_read', ['slug' => $event->getSlug()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('event/edit.html.twig', [
            'form' => $form->createView(),
            'event' => $event
        ]);
    }

    /**
     * @Route("/admin/event/add", name="admin_event_add", methods={"GET","POST"})
     */
    public function add(Request $request, MySlugger $slugger): Response
    {
        $event = new Event();

        $form = $this->createForm(EventType::class, $event);
        $form->add('Ajouter', SubmitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $event->setSlug($slugger->slugify($event->getName()));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($event);
            $entityManager->flush();

            $this->addFlash('success', 'L\'évènement a bien été ajouté.');

            return $this->redirectToRoute('admin_event_read', ['slug' => $event->getSlug()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('event/add.html.twig', [
            'form' => $form
        ]);
    }


    /**
     * @Route("/admin/event/delete/{slug}", name="admin_event_delete", methods={"GET"})
     */
    public function delete(Event $event = null, EntityManagerInterface $em): Response
    {
        // 404
        if (null === $event) {
            throw $this->createNotFoundException('Evènement non trouvé.');
        }

        $em->remove($event);
        $em->flush();

        $this->addFlash('success', 'L\'évènement a bien été supprimé.');

        return $this->redirectToRoute('admin_event_browse', [], Response::HTTP_SEE_OTHER);
    }
}
