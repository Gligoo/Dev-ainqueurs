<?php

namespace App\Controller;

use App\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class QuestionController extends AbstractController
{
    #[Route('/question', name: 'app_question')]
    public function getAllQuestions(EntityManagerInterface $entityManager): JsonResponse
    {
        $questions = $entityManager->getRepository(Question::class)->findAll();
        dump($questions);

        $questionsArray = [];
        foreach ($questions as $question) {
            $questionsArray[] = [
                'id' => $question->getId(),
                'question_text' => $question->getQuestionText(),
            ];
        }

        return $this->json($questionsArray);
    }
}
