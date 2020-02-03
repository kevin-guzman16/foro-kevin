<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriaRepository")
 */
class Categoria
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
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Publicación", mappedBy="categoria")
     */
    private $publicaciNs;

    public function __construct()
    {
        $this->publicaciNs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection|Publicación[]
     */
    public function getPublicaciNs(): Collection
    {
        return $this->publicaciNs;
    }

    public function addPublicaciN(Publicación $publicaciN): self
    {
        if (!$this->publicaciNs->contains($publicaciN)) {
            $this->publicaciNs[] = $publicaciN;
            $publicaciN->setCategoria($this);
        }

        return $this;
    }

    public function removePublicaciN(Publicación $publicaciN): self
    {
        if ($this->publicaciNs->contains($publicaciN)) {
            $this->publicaciNs->removeElement($publicaciN);
            // set the owning side to null (unless already changed)
            if ($publicaciN->getCategoria() === $this) {
                $publicaciN->setCategoria(null);
            }
        }

        return $this;
    }
}
