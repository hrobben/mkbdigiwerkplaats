<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnswerRepository")
 */
class Answer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $fos_user_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Choice")
     */
    private $Choice_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getFosUserId(): ?User
    {
        return $this->fos_user_id;
    }

    public function setFosUserId(?User $fos_user_id): self
    {
        $this->fos_user_id = $fos_user_id;

        return $this;
    }

    public function getChoiceId(): ?Choice
    {
        return $this->Choice_id;
    }

    public function setChoiceId(?Choice $Choice_id): self
    {
        $this->Choice_id = $Choice_id;

        return $this;
    }
}
