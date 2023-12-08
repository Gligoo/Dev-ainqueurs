<?php

namespace App\Controller;

use App\Entity\Result;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ResultController extends AbstractController
{
    #[Route('/result', name: 'app_result')]
    public function getAllResult(EntityManagerInterface $entityManager): JsonResponse
    {
        $results = $entityManager->getRepository(Result::class)->findAll();

        $resultsArray = [];
        foreach ($results as $result) {
            $resultsArray[] = [
                'id' => $result->getId(),
                'answer_text' => $result->getAnswerText(),
            ];
        }

        return $this->json($resultsArray);
    }
}
