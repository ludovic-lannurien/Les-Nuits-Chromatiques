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
     * Get event collection
     * 
     * @Route("/api/event", name="api_events_get", methods="GET")
     */
    public function getCollection(EventRepository $EventRepository): Response
    {
        $events = $eventRepository->findAll();

        // On demande à Symfony de "sérialiser" nos entités
        // sous forme de JSON
        return $this->json($events, 200, [], ['groups' => 'events_get']);
    }

    /**
     * Get a event by id
     * 
     * @Route("/api/events/{id<\d+>}", name="api_events_get_item", methods="GET")
     */
    public function show(Event $event): Response
    {
        // /!\ JSON Hijacking
        // @see https://symfony.com/doc/current/components/http_foundation.html#creating-a-json-response
        return $this->json($event, Response::HTTP_OK, [], ['groups' => 'events_get']);
    }

    /**
     * Create a new event
     * 
     * @Route("/api/events", name="api_events_post", methods="POST")
     */
    public function create(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager, ValidatorInterface $validator)
    {
        // On récupère le contenu de la requête (du JSON)
        $jsonContent = $request->getContent();

        // On désérialise le JSON vers une entité Movie
        // @see https://symfony.com/doc/current/components/serializer.html#deserializing-an-object
        $event = $serializer->deserialize($jsonContent, Movie::class, 'json');

        // On valide l'entité avec le service Validator
        $errors = $validator->validate($event);

        // Si la validation rencontre des erreurs
        // ($errors se comporte comme un tableau et contient un élément par erreur)
        if (count($errors) > 0) {
            return $this->json(['errors' => $errors], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // On persist, on flush
        $entityManager->persist($event);
        $entityManager->flush();

        // REST nous demande un statut 201 et un header Location: url
        // Si on le fait "à la mano"
        return $this->json(
            // Le film que l'on retourne en JSON directement au front
            $event,
            // Le status code
            // C'est cool d'utiliser les constantes de classe !
            // => ça aide à la lecture du code et au fait de penser objet
            Response::HTTP_CREATED,
            // Un header Location + l'URL de la ressource créée
            ['Location' => $this->generateUrl('api_event_get_item', ['id' => $event->getId()])],
            // Le groupe de sérialisation pour que $movie soit sérialisé sans erreur de référence circulaire
            ['groups' => 'events_get']
        );
    }

    /**
     * @Route("/api/events/{id<\d+>}", name="api_events_put_item", methods={"PUT", "PATCH"})
     */
    public function itemEdit(Event $event = null, SerializerInterface $serializer, ValidatorInterface $validator, EntityManagerInterface $entityManager, Request $request): Response
    {

        // Film non trouvé
        if ($event === null) {
            return new JsonResponse(
                ["message" => "Évènement non trouvé"],
                Response::HTTP_NOT_FOUND
            );
        }

        // Récupère les données de la requête
        $data = $request->getContent();

        // @todo Pour PUT, s'assurer qu'on ait un certain nombre de champs
        // @todo Pour PATCH, s'assurer qu'on au moins un champ
        // sinon => 422 HTTP_UNPROCESSABLE_ENTITY

        // On désérialise le JSON vers *l'entité Movie existante*
        // @see https://symfony.com/doc/current/components/serializer.html#deserializing-in-an-existing-object
        $event = $serializer->deserialize($data, Event::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $event]);

        // On valide l'entité
        $errors = $validator->validate($event);

        // Affichage des erreurs
        if (count($errors) > 0) {

            // Objectif : créer ce format de sortie
            // {
            //     "errors": {
            //         "title": [
            //             "Cette valeur ne doit pas être vide."
            //         ],
            //         "releaseDate": [
            //             "Cette valeur doit être de type string."
            //         ],
            //         "rating": [
            //             "Cette chaîne est trop longue. Elle doit avoir au maximum 1 caractère.",
            //             "Cette valeur doit être l'un des choix proposés."
            //         ]
            //     }
            // }

            // On va créer un joli tableau d'erreurs
            $newErrors = [];

            // Pour chaque erreur
            foreach ($errors as $error) {
                // Astuce ici ! on poush dans un taleau
                // = similaire à la structure des Flash Messages
                // On push le message, à la clé qui contient la propriété
                $newErrors[$error->getPropertyPath()][] = $error->getMessage();
            }

            return new JsonResponse(["errors" => $newErrors], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // Enregistrement en BDD
        $entityManager->flush();

        // @todo Conditionner le message de retour au cas où
        // l'entité ne serait pas modifiée
        return new JsonResponse(["message" => "Film modifié"], Response::HTTP_OK);
    }

    /**
     * Delete a movie
     * 
     * @Route("/api/movies/{id<\d+>}", name="api_movies_delete", methods="DELETE")
     */
    public function delete(Event $event = null, EntityManagerInterface $em)
    {
        if (null === $event) {

            $error = 'Cet évènement n\'existe pas';

            return $this->json(['error' => $error], Response::HTTP_NOT_FOUND);
        }

        $em->remove($event);
        $em->flush();

        return $this->json(['message' => 'Le film a bien été supprimé.'], Response::HTTP_OK);
    }
}
