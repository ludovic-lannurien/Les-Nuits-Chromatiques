<?php

namespace App\Controller\Api;

use App\Entity\Event;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EventController extends AbstractController
{
    /** 
     * @Route("/api/events", name="api_events_get", methods="GET")
     */
    public function getEvents(EventRepository $eventRepository): Response
    {
        $events = $eventRepository->findAll();

        return $this->json($events, Response::HTTP_OK, [], ['groups' => 'events_get']);
    }

    /**
     * @Route("/api/events/{slug}", name="api_events_get_item", methods="GET")
     */
    public function getEvent(Event $event = null): Response
    {
        // 404
        if (null === $event) {
            return new JsonResponse(
                ["message" => "Évènement non trouvé"],
                Response::HTTP_NOT_FOUND
            );
        }

        return $this->json($event, Response::HTTP_OK, [], ['groups' => 'events_get']);
    }

    /**
     * @Route("/api/events", name="api_events_post", methods="POST")
     */
    public function createEvent(Request $request, SerializerInterface $serializer, EntityManagerInterface $em, ValidatorInterface $validator)
    {
        $jsonContent = $request->getContent();

        $event = $serializer->deserialize($jsonContent, Movie::class, 'json');

        $errors = $validator->validate($event);

        if (count($errors) > 0) {
            return $this->json(['errors' => $errors], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $em->persist($event);
        $em->flush();

        return $this->json(
            $event,
            Response::HTTP_CREATED,
            ['Location' => $this->generateUrl('api_events_get_item', ['slug' => $event->getSlug()])],
            ['groups' => 'events_get']
        );
    }

    /**
     * @Route("/api/events/{slug}", name="api_events_put_item", methods={"PUT", "PATCH"})
     */
    public function editEvent(Event $event = null, SerializerInterface $serializer, ValidatorInterface $validator, EntityManagerInterface $em, Request $request): Response
    {
        // 404
        if (null === $event) {
            return new JsonResponse(
                ["message" => "Évènement non trouvé"],
                Response::HTTP_NOT_FOUND
            );
        }

        $data = $request->getContent();

        $event = $serializer->deserialize($data, Event::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $event]);

        $errors = $validator->validate($event);

        if (count($errors) > 0) {
            $newErrors = [];

            foreach ($errors as $error) {
                $newErrors[$error->getPropertyPath()][] = $error->getMessage();
            }

            return new JsonResponse(["errors" => $newErrors], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $em->flush();

        return new JsonResponse(["message" => "Evènement modifié"], Response::HTTP_OK);
    }

    /**
     * @Route("/api/movies/{slug}", name="api_events_delete", methods="DELETE")
     */
    public function delete(Event $event = null, EntityManagerInterface $em)
    {
        // 404
        if (null === $event) {
            $error = 'Évènement non trouvé';
            return $this->json(
                ['error' => $error],
                Response::HTTP_NOT_FOUND);
        }

        $em->remove($event);
        $em->flush();

        return $this->json(['message' => 'L\'évènement a bien été supprimé.'], Response::HTTP_OK);
    }
}
