<?php

namespace App\Entity;

use App\Repository\LanguageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LanguageRepository::class)
 */
class Language
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $identifier;

    /**
     * @ORM\ManyToMany(targetEntity=Projet::class, inversedBy="languages")
     */
    private $projet_language;

    public function __construct()
    {
        $this->projet_language = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * @return Collection|Projet[]
     */
    public function getProjetLanguage(): Collection
    {
        return $this->projet_language;
    }

    public function addProjetLanguage(Projet $projetLanguage): self
    {
        if (!$this->projet_language->contains($projetLanguage)) {
            $this->projet_language[] = $projetLanguage;
        }

        return $this;
    }

    public function removeProjetLanguage(Projet $projetLanguage): self
    {
        $this->projet_language->removeElement($projetLanguage);

        return $this;
    }
}
