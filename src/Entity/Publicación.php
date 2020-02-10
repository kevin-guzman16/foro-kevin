<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PublicaciónRepository")
 */
class Publicación
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categoria", inversedBy="publicaciNs", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoria;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titulo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imagen;

    /**
     * @ORM\Column(type="text")
     */
    private $contenido;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comentarios", mappedBy="publicacion_id", orphanRemoval=true)
     */
    private $comentarios;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="publicacion")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->comentarios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getCategoria(): ?categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getContenido(): ?string
    {
        return $this->contenido;
    }

    public function setContenido(string $contenido): self
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * @return Collection|Comentarios[]
     */
    public function getComentarios(): Collection
    {
        return $this->comentarios;
    }

    public function addComentario(Comentarios $comentario): self
    {
        if (!$this->comentarios->contains($comentario)) {
            $this->comentarios[] = $comentario;
            $comentario->setPublicacionId($this);
        }

        return $this;
    }

    public function removeComentario(Comentarios $comentario): self
    {
        if ($this->comentarios->contains($comentario)) {
            $this->comentarios->removeElement($comentario);
            // set the owning side to null (unless already changed)
            if ($comentario->getPublicacionId() === $this) {
                $comentario->setPublicacionId(null);
            }
        }

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
}
