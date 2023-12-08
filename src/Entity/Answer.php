<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnswerRepository::class)]
class Answer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $answerText = null;

    #[ORM\Column]
    private ?bool $isCorrect = null;


    #[ORM\Column(type: Types::TEXT)]
    private ?string $positiveImpact = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $negativeImpact = null;

    #[ORM\ManyToOne(inversedBy: 'answer')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Question $question = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnswerText(): ?string
    {
        return $this->answerText;
    }

    public function setAnswerText(string $answerText): static
    {
        $this->answerText = $answerText;

        return $this;
    }

    public function isIsCorrect(): ?bool
    {
        return $this->isCorrect;
    }

    public function setIsCorrect(bool $isCorrect): static
    {
        $this->isCorrect = $isCorrect;

        return $this;
    }

    public function getPositiveImpact(): ?string
    {
        return $this->positiveImpact;
    }

    public function setPositiveImpact(string $positiveImpact): static
    {
        $this->positiveImpact = $positiveImpact;

        return $this;
    }

    public function getNegativeImpact(): ?string
    {
        return $this->negativeImpact;
    }

    public function setNegativeImpact(string $negativeImpact): static
    {
        $this->negativeImpact = $negativeImpact;

        return $this;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): static
    {
        $this->question = $question;

        return $this;
    }


}
