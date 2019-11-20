<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Survey")
     */
    private $s_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cat")
     */
    private $cat_id;

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

    public function getSId(): ?Survey
    {
        return $this->s_id;
    }

    public function setSId(?Survey $s_id): self
    {
        $this->s_id = $s_id;

        return $this;
    }

    public function getCatId(): ?Cat
    {
        return $this->cat_id;
    }

    public function setCatId(?Cat $cat_id): self
    {
        $this->cat_id = $cat_id;

        return $this;
    }
}
