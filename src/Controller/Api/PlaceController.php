<?php

namespace App\Controller\Api;

use App\Entity\Place;
use App\Repository\PlaceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlaceController extends AbstractController
{
    /**
     * @Route("/api/places", name="api_places_get", methods="GET")
     */
    public function getPlaces(PlaceRepository $placeRepository): Response
    {
        $places = $placeRepository->findAll();

        return $this->json($places, Response::HTTP_OK, [], ['groups' => 'places_get']);
    }

    /**
     * @Route("/api/places/{slug}", name="api_places_get_item", methods="GET")
     */
    public function getPlace(Place $place = null): Response
    {
        // 404
        if (null === $place) {
            return new JsonResponse(
                ["message" => "Lieu non trouvé"],
                Response::HTTP_NOT_FOUND
            );
        }

        return $this->json($place, Response::HTTP_OK, [], ['groups' => 'places_get']);
    }

    /**
     * @Route("/api/places", name="api_places_post", methods="POST")
     */
    public function createPlace(Request $request, SerializerInterface $serializer, EntityManagerInterface $em, ValidatorInterface $validator)
    {
        $jsonContent = $request->getContent();

        $place = $serializer->deserialize($jsonContent, Place::class, 'json');

        $errors = $validator->validate($place);

        if (count($errors) > 0) {
            return $this->json(['errors' => $errors], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $em->persist($place);
        $em->flush();

        return $this->json(
            $place,
            Response::HTTP_CREATED,
            ['Location' => $this->generateUrl('api_places_get_item', ['slug' => $place->getSlug()])],
            ['groups' => 'places_get']
        );
    }

    /**
     * @Route("/api/places/{slug}", name="api_places_put_item", methods={"PUT", "PATCH"})
     */
    public function editPlace(Place $place = null, SerializerInterface $serializer, ValidatorInterface $validator, EntityManagerInterface $em, Request $request): Response
    {
        // 404
        if (null === $place) {
            return new JsonResponse(
                ["message" => "Lieu non trouvé"],
                Response::HTTP_NOT_FOUND
            );
        }

        $data = $request->getContent();

        $place = $serializer->deserialize($data, Place::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $place]);

        $errors = $validator->validate($place);

        if (count($errors) > 0) {
            $newErrors = [];

            foreach ($errors as $error) {
                $newErrors[$error->getPropertyPath()][] = $error->getMessage();
            }

            return new JsonResponse(["errors" => $newErrors], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $em->flush();

        return new JsonResponse(["message" => "Lieu modifié"], Response::HTTP_OK);
    }

    /**
     * @Route("/api/places/{slug}", name="api_places_delete", methods="DELETE")
     */
    public function deletePlace(Place $place = null, EntityManagerInterface $em)
    {
        // 404
        if (null === $place) {
            $error = 'Lieu non trouvé';
            return $this->json(
                ['error' => $error],
                Response::HTTP_NOT_FOUND
            );
        }

        $em->remove($place);
        $em->flush();

        return $this->json(['message' => 'Le lieu a bien été supprimé.'], Response::HTTP_OK);
    }
}
