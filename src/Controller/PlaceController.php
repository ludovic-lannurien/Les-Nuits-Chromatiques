<?php

namespace App\Controller;

use App\Entity\Place;
use App\Form\PlaceType;
use App\Repository\PlaceRepository;
use App\Service\MySlugger;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class PlaceController extends AbstractController
{
    /**
     * @Route("/admin/place/browse", name="admin_place_browse", methods={"GET"})
     */
    public function browse(PlaceRepository $placeRepository): Response
    {
        $places = $placeRepository->findAll();

        return $this->render('place/browse.html.twig', [
            'places' => $places
        ]);
    }

    /**
     * @Route("/admin/place/read/{slug}", name="admin_place_read", methods={"GET"})
     */
    public function read(Place $place = null): Response
    {
        // 404
        if (null === $place) {
            throw $this->createNotFoundException('Lieu non trouvé.');
        }

        return $this->render('place/read.html.twig', [
            'place' => $place
        ]);
    }

    /**
     * @Route("/admin/place/edit/{slug}", name="admin_place_edit", methods={"GET", "POST"})
     */
    public function edit(Place $place = null, Request $request, MySlugger $slugger): Response
    {
        // 404
        if (null === $place) {
            throw $this->createNotFoundException('Lieu non trouvé.');
        }

        $form = $this->createForm(PlaceType::class, $place);
        $form->add('Enregister', SubmitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $place->setSlug($slugger->slugify($place->getName()));

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->addFlash('success', 'Le lieu a bien été modifié.');

            return $this->redirectToRoute('admin_place_read', ['slug' => $place->getSlug()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('place/edit.html.twig', [
            'form' => $form->createView(),
            'place' => $place
        ]);
    }

    /**
     * @Route("/admin/place/add", name="admin_place_add", methods={"GET", "POST"})
     */
    public function add(Request $request, MySlugger $slugger): Response
    {
        $place = new Place();

        $form = $this->createForm(PlaceType::class, $place);
        $form->add('Ajouter', SubmitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $place->setSlug($slugger->slugify($place->getName()));

            $em = $this->getDoctrine()->getManager();
            $em->persist($place);
            $em->flush();

            $this->addFlash('success', 'Le lieu a bien été ajouté.');

            return $this->redirectToRoute('admin_place_read', ['slug' => $place->getSlug()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('place/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/place/delete/{slug}", name="admin_place_delete", methods={"GET"})
     */
    public function delete(Place $place = null, EntityManagerInterface $em): Response
    {
        // 404
        if (null === $place) {
            throw $this->createNotFoundException('Lieu non trouvé.');
        }

        $em->remove($place);
        $em->flush();

        $this->addFlash('success', 'Le lieu a bien été supprimé.');

        return $this->redirectToRoute('admin_place_browse', [], Response::HTTP_SEE_OTHER);
    }
}
