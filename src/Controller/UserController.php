<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/admin/user/browse", name="admin_user_browse", methods={"GET"})
     */
    public function browse(UserRepository $userRepository): Response
    {
        return $this->render('user/browse.html.twig', [
            'users' => $userRepository->findAll()
        ]);
    }

    /**
     * @Route("/admin/user/read/{id}", name="admin_user_read", methods={"GET"})
     */
    public function read(User $user = null): Response
    {
        // 404 ?
        if (null === $user) {
            throw $this->createNotFoundException('Utilisateur non trouvé.');
        }

        return $this->render('user/read.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("/admin/user/edit/{id}", name="admin_user_edit", methods={"GET", "POST"})
     */
    public function edit(User $user = null, Request $request, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        // 404 ?
        if (null === $user) {
            throw $this->createNotFoundException('Utilisateur non trouvé.');
        }

        $form = $this->createForm(UserType::class, $user);
        $form->add('Enregister', SubmitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if (!empty($form->get('password')->getData())) {
                $hashedPassword = $userPasswordHasher->hashPassword($user, $form->get('password')->getData());

                $user->setPassword($hashedPassword);
            }

            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'L\'utilisateur a bien été modifié.');

            return $this->redirectToRoute('admin_user_read', ['id' => $user-> getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form
        ]);
    }

    /**
     * @Route("/admin/user/add", name="admin_user_add", methods={"GET", "POST"})
     */
    public function add(Request $request, UserPasswordHasherInterface $userPasswordHasherInterface): Response
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);
        $form->add('Enregister', SubmitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $hashedPassword = $userPasswordHasherInterface->hashPassword($user, $user->getPassword());

            $user->setPassword($hashedPassword);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'L\'utilisateur a bien été ajouté.');

            return $this->redirectToRoute('admin_user_read', ['id' => $user->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/add.html.twig', [
            'user' => $user,
            'form' => $form
        ]);
    }

    /**
     * @Route("/admin/user/delete/{id<\d+>}", name="admin_user_delete", methods={"GET"})
     */
    public function delete(Request $request, User $user = null, EntityManagerInterface $em): Response
    {
        // 404 ?
        if (null === $user) {
            throw $this->createNotFoundException('Utilisateur non trouvé.');
        }

        $em->remove($user);
        $em->flush();

        $this->addFlash('success', 'L\'utilisateur a bien été supprimé.');

        return $this->redirectToRoute('admin_user_browse', [], Response::HTTP_SEE_OTHER);
    }
}
