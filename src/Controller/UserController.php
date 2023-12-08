<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function getAllUser(EntityManagerInterface $entityManager): JsonResponse
    {
        $users = $entityManager->getRepository(User::class)->findAll();

        $usersArray = [];
        foreach ($users as $user) {
            $usersArray[] = [
                'id' => $user->getId(),
                'name' => $user->getName(),
            ];
        }
        return $this->json($usersArray);
    }
}
