<?php

namespace App\Controller\Api;

use App\Entity\Genre;
use App\Repository\GenreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GenreController extends AbstractController
{
    /**
     * @Route("/api/genres", name="api_genres_get", methods="GET")
     */
    public function getGenres(GenreRepository $genreRepository): Response
    {
        $genres = $genreRepository->findAll();

        return $this->json($genres, Response::HTTP_OK, [], ['groups' => 'genres_get']);
    }

    /**
     * @Route("/api/genres/{slug}", name="api_genres_get_item", methods="GET")
     */
    public function getGenre(Genre $genre = null): Response
    {
        // 404
        if (null === $genre) {
            return new JsonResponse(
                ["message" => "Genre non trouvé"],
                Response::HTTP_NOT_FOUND
            );
        }

        return $this->json($genre, Response::HTTP_OK, [], ['groups' => 'genres_get']);
    }

    /**
     * @Route("/api/genres/{slug}", name="api_genres_put_item", methods={"PUT", "PATCH"})
     */
    public function editGenre(Genre $genre = null, SerializerInterface $serializer, ValidatorInterface $validator, EntityManagerInterface $em, Request $request): Response
    {
        // 404
        if (null === $genre) {
            return new JsonResponse(
                ["message" => "Genre non trouvé"],
                Response::HTTP_NOT_FOUND
            );
        }

        $data = $request->getContent();

        $genre = $serializer->deserialize($data, Genre::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $genre]);

        $errors = $validator->validate($genre);

        if (count($errors) > 0) {
            $newErrors = [];

            foreach ($errors as $error) {
                $newErrors[$error->getPropertyPath()][] = $error->getMessage();
            }

            return new JsonResponse(["errors" => $newErrors], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $em->flush();

        return new JsonResponse(["message" => "Genre modifié"], Response::HTTP_OK);
    }

    /**
     * @Route("/api/genres", name="api_genres_post", methods="POST")
     */
    public function createGenre(Request $request, SerializerInterface $serializer, EntityManagerInterface $em, ValidatorInterface $validator)
    {
        $jsonContent = $request->getContent();

        $genre = $serializer->deserialize($jsonContent, Genre::class, 'json');

        $errors = $validator->validate($genre);

        if (count($errors) > 0) {
            return $this->json(['errors' => $errors], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $em->persist($genre);
        $em->flush();

        return $this->json(
            ['message' => 'Le genre a bien été ajouté.'],
            Response::HTTP_CREATED,
            ['Location' => $this->generateUrl('api_genres_get_item', ['slug' => $genre->getSlug()])],
            ['groups' => 'genres_get']
        );
    }

    /**
     * @Route("/api/genres/{slug}", name="api_genres_delete", methods="DELETE")
     */
    public function deleteGenre(Genre $genre = null, EntityManagerInterface $em)
    {
        // 404
        if (null === $genre) {
            $error = 'Genre non trouvé';
            return $this->json(
                ['error' => $error],
                Response::HTTP_NOT_FOUND
            );
        }

        $em->remove($genre);
        $em->flush();

        return $this->json(['message' => 'Le genre a bien été supprimé.'], Response::HTTP_OK);
    }
}
