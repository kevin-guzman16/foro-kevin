<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComentariosRepository")
 */
class Comentarios
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
    private $fecha_hora;

    /**
     * @ORM\Column(type="text")
     */
    private $contenido;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Publicación", inversedBy="comentarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $publicacion_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaHora(): ?\DateTimeInterface
    {
        return $this->fecha_hora;
    }

    public function setFechaHora(\DateTimeInterface $fecha_hora): self
    {
        $this->fecha_hora = $fecha_hora;

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

    public function getPublicacionId(): ?Publicación
    {
        return $this->publicacion_id;
    }

    public function setPublicacionId(?Publicación $publicacion_id): self
    {
        $this->publicacion_id = $publicacion_id;

        return $this;
    }
}
