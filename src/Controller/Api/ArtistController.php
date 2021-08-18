<?php

namespace App\Controller\Api;

use App\Entity\Artist;
use App\Repository\ArtistRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArtistController extends AbstractController
{
    /**
     * @Route("/api/artists", name="api_artists_get", methods="GET")
     */
    public function getArtists(ArtistRepository $artistRepository): Response
    {
        $artists = $artistRepository->findAll();

        return $this->json($artists, Response::HTTP_OK, [], ['groups' => 'artists_get']);
    }

    /**
     * @Route("/api/artists/{slug}", name="api_artists_get_item", methods="GET")
     */
    public function getArtist(Artist $artist = null): Response
    {
        // 404
        if (null === $artist) {
            return new JsonResponse(
                ["message" => "Artiste non trouvé"],
                Response::HTTP_NOT_FOUND
            );
        }

        return $this->json($artist, Response::HTTP_OK, [], ['groups' => 'artists_get']);
    }

    /**
     * @Route("/api/artists", name="api_artists_post", methods="POST")
     */
    public function createArtist(Request $request, SerializerInterface $serializer, EntityManagerInterface $em, ValidatorInterface $validator)
    {
        $jsonContent = $request->getContent();

        $artist = $serializer->deserialize($jsonContent, Artist::class, 'json');

        $errors = $validator->validate($artist);

        if (count($errors) > 0) {
            return $this->json(['errors' => $errors], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $em->persist($artist);
        $em->flush();

        return $this->json(
            ['message' => 'L\'artiste a bien été ajouté.'],
            Response::HTTP_CREATED,
            ['Location' => $this->generateUrl('api_artists_get_item', ['slug' => $artist->getSlug()])],
            ['groups' => 'artists_get']
        );
    }

    /**
     * @Route("/api/artists/{slug}", name="api_artists_put_item", methods={"PUT", "PATCH"})
     */
    public function editArtist(Artist $artist = null, SerializerInterface $serializer, ValidatorInterface $validator, EntityManagerInterface $em, Request $request): Response
    {
        // 404
        if (null === $artist) {
            return new JsonResponse(
                ["message" => "Artiste non trouvé"],
                Response::HTTP_NOT_FOUND
            );
        }

        $data = $request->getContent();

        $artist = $serializer->deserialize($data, Artist::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $artist]);

        $errors = $validator->validate($artist);

        if (count($errors) > 0) {
            $newErrors = [];

            foreach ($errors as $error) {
                $newErrors[$error->getPropertyPath()][] = $error->getMessage();
            }

            return new JsonResponse(["errors" => $newErrors], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $em->flush();

        return new JsonResponse(["message" => "Artiste modifié"], Response::HTTP_OK);
    }

    /**
     * @Route("/api/artists/{slug}", name="api_artists_delete", methods="DELETE")
     */
    public function deleteArtist(Artist $artist = null, EntityManagerInterface $em)
    {
        // 404
        if (null === $artist) {
            $error = 'Artiste non trouvé';
            return $this->json(
                ['error' => $error],
                Response::HTTP_NOT_FOUND
            );
        }

        $em->remove($artist);
        $em->flush();

        return $this->json(['message' => 'L\'artiste a bien été supprimé.'], Response::HTTP_OK);
    }
}
