<?php

namespace App\Controller;

use App\Entity\Artist;
use App\Form\ArtistType;
use App\Repository\ArtistRepository;
use App\Service\MySlugger;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArtistController extends AbstractController
{
    /**
     * @Route("/admin/artist/browse", name="admin_artist_browse", methods={"GET"})
     */
    public function browse(ArtistRepository $artistRepository): Response
    {
        $artists = $artistRepository->findBy(
            [],
            ['firstname' => 'ASC']
        );

        return $this->render('artist/browse.html.twig', [
            'artists' => $artists
        ]);
    }

    /**
     * @Route("/admin/artist/read/{slug}", name="admin_artist_read", methods={"GET"})
     */
    public function read(Artist $artist = null): Response
    {
        // 404 ?
        if (null === $artist) {
            throw $this->createNotFoundException('Artiste non trouvé.');
        }

        return $this->render('artist/read.html.twig', [
            'artist' => $artist
        ]);
    }

    /**
     * @Route("/admin/artist/edit/{slug}", name="admin_artist_edit", methods={"GET","POST"})
     */
    public function edit(Artist $artist = null, Request $request, MySlugger $slugger): Response
    {
        // 404 ?
        if (null === $artist) {
            throw $this->createNotFoundException('Artiste non trouvé.');
        }

        $form = $this->createForm(ArtistType::class, $artist);
        $form->add('Enregister', SubmitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if (null === $artist->getLastname()) {
                $artist->setSlug($slugger->slugify($artist->getFirstname()));
            } else {
                $artist->setSlug($slugger->slugify(($artist->getFirstname()) . '-' . ($artist->getLastname())));
            }

            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'L\'artiste a bien été modifié.');

            return $this->redirectToRoute('admin_artist_read', ['slug' => $artist->getSlug()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('artist/edit.html.twig', [
            'artist' => $artist,
            'form' => $form
        ]);
    }

    /**
     * @Route("/admin/artist/add", name="admin_artist_add", methods={"GET","POST"})
     */
    public function add(Request $request, MySlugger $slugger): Response
    {
        $artist = new Artist();

        $form = $this->createForm(ArtistType::class, $artist);
        $form->add('Ajouter', SubmitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if (null === $artist->getLastname()) {
                $artist->setSlug($slugger->slugify($artist->getFirstname()));
            } else {
                $artist->setSlug($slugger->slugify(($artist->getFirstname()) . '-' . ($artist->getLastname())));
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($artist);
            $entityManager->flush();

            $this->addFlash('success', 'L\'artiste a bien été ajouté.');

            return $this->redirectToRoute('admin_artist_read', ['slug' => $artist->getSlug()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('artist/add.html.twig', [
            'artist' => $artist,
            'form' => $form
        ]);
    }

    /**
     * @Route("/admin/artist/delete/{slug}", name="admin_artist_delete", methods={"GET"})
     */

    public function delete(Artist $artist = null, EntityManagerInterface $em): Response
    {
        // 404
        if (null === $artist) {
            throw $this->createNotFoundException('Lieu non trouvé.');
        }

        $em->remove($artist);
        $em->flush();

        $this->addFlash('success', 'L\'artiste a bien été supprimé.');

        return $this->redirectToRoute('admin_artist_browse', [], Response::HTTP_SEE_OTHER);
    }
}
