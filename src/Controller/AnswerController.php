<?php

namespace App\Controller;

use App\Entity\Answer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class AnswerController extends AbstractController
{
    #[Route('/answer', name: 'app_answer')]
    public function getAllAnswer(EntityManagerInterface $entityManager): JsonResponse
    {
        $answers = $entityManager->getRepository(Answer::class)->findAll();
        dump($answers);

        $answersArray = [];
        foreach ($answers as $answer) {
            $answersArray[] = [
                'id' => $answer->getId(),
                'answer_text' => $answer->getAnswerText(),
            ];
        }

        return $this->json($answersArray);
    }
}
