<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
// use Knp\DoctrineBehaviors\Contract\Entity\TimestampableInterface;
// use Knp\DoctrineBehaviors\Model\Timestampable\TimestampableTrait;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsRepository")
 */
class News// implements TimestampableInterface
{
  //  use TimestampableTrait;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public $title;

    /**
     * @ORM\Column(type="string", length=265000)
     */
    public $body;

    /**
     * @ORM\Column(type="datetime")
     */
    public $date_created;

    /**
     * @ORM\Column(type="datetime")
     */
    public $date_updated;

    /**
     * @ORM\Column(type="string", length=11500)
     */
    public $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    public $views;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $flag;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->date_created;
    }

    public function setDateCreated(\DateTimeInterface $date_created): self
    {
        $this->date_created = $date_created;

        return $this;
    }

    public function getDateUpdated(): ?\DateTimeInterface
    {
        return $this->date_updated;
    }

    public function setDateUpdated(\DateTimeInterface $date_updated): self
    {
        $this->date_updated = $date_updated;

        return $this;
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

    public function getViews(): ?int
    {
        return $this->views;
    }

    public function setViews(?int $views): self
    {
        $this->views = $views;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getFlag(): ?string
    {
        return $this->flag;
    }

    public function setFlag(string $flag): self
    {
        $this->flag = $flag;

        return $this;
    }

    
}
