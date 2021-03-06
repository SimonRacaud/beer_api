<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CheckinRepository")
 */
class Checkin
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups("api.get")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * @Assert\Range(min = 0, max = 10)
     * @Assert\NotBlank
     * @Groups("api.get")
     */
    private $mark;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Beer", inversedBy="checkins")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     * @Groups("api.get")
     */
    private $beer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="checkins")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     * @Groups("api.get")
     */
    private $user;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Assert\DateTime(
     *      message="Invalid format of date_create"
     * )
     * @Groups("api.get")
     */
    private $date_create;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Assert\DateTime(
     *      message="Invalid format of date_update"
     * )
     * @Groups("api.get")
     */
    private $date_update;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMark(): ?float
    {
        return $this->mark;
    }

    public function setMark(float $mark): self
    {
        $this->mark = $mark;

        return $this;
    }

    public function getBeer(): ?Beer
    {
        return $this->beer;
    }

    public function setBeer(?Beer $beer): self
    {
        $this->beer = $beer;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->date_create;
    }

    public function setDateCreate(\DateTimeInterface $date_create): self
    {
        $this->date_create = $date_create;

        return $this;
    }

    public function getDateUpdate(): ?\DateTimeInterface
    {
        return $this->date_update;
    }

    public function setDateUpdate(\DateTimeInterface $date_update): self
    {
        $this->date_update = $date_update;

        return $this;
    }
}
