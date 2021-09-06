<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Form\GenreType;
use App\Repository\GenreRepository;
use App\Service\MySlugger;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class GenreController extends AbstractController
{
    /**
     * @Route("/admin/genre/browse", name="admin_genre_browse", methods={"GET"})
     */
    public function browse(GenreRepository $genreRepository): Response
    {
        $genres = $genreRepository->findAll();

        return $this->render('genre/browse.html.twig', [
            'genres' => $genres
        ]);
    }

    /**
     * @Route("/admin/genre/read/{slug}", name="admin_genre_read", methods={"GET"})
     */
    public function read(Genre $genre = null): Response
    {
        // 404
        if (null === $genre) {
            throw $this->createNotFoundException('Genre non trouvé.');
        }

        return $this->render('genre/read.html.twig', [
            'genre' => $genre
        ]);
    }

    /**
     * @Route("/admin/genre/edit/{slug}", name="admin_genre_edit", methods={"GET", "POST"})
     */
    public function edit(Genre $genre = null, Request $request, MySlugger $slugger): Response
    {
        // 404
        if (null === $genre) {
            throw $this->createNotFoundException('Genre non trouvé.');
        }

        $form = $this->createForm(GenreType::class, $genre);
        $form->add('Enregister', SubmitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $genre->setSlug($slugger->slugify($genre->getName()));

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->addFlash('success', 'Le genre a bien été modifié.');

            return $this->redirectToRoute('admin_genre_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('genre/edit.html.twig', [
            'form' => $form->createView(),
            'genre' => $genre
        ]);
    }

    /**
     * @Route("/admin/genre/add", name="admin_genre_add", methods={"GET", "POST"})
     */
    public function add(Request $request, MySlugger $slugger): Response
    {
        $genre = new Genre();

        $form = $this->createForm(GenreType::class, $genre);
        $form->add('Ajouter', SubmitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $genre->setSlug($slugger->slugify($genre->getName()));

            $em = $this->getDoctrine()->getManager();
            $em->persist($genre);
            $em->flush();

            $this->addFlash('success', 'Le genre a bien été ajouté.');

            return $this->redirectToRoute('admin_genre_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('genre/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/genre/delete/{slug}", name="admin_genre_delete", methods={"GET"})
     */
    public function delete(Genre $genre = null, EntityManagerInterface $em): Response
    {
        // 404
        if (null === $genre) {
            throw $this->createNotFoundException('Genre non trouvé.');
        }

        $em->remove($genre);
        $em->flush();

        $this->addFlash('success', 'Le genre a bien été supprimé.');

        return $this->redirectToRoute('admin_genre_browse', [], Response::HTTP_SEE_OTHER);
    }
}
