<?php

namespace App\Entity;

use App\Repository\FondoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FondoRepository::class)
 */
class Fondo
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
    private $titulo;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $isbn;

    /**
     * @ORM\Column(type="integer")
     */
    private $edicion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $categoria;

    /**
     * @ORM\Column(type="integer")
     */
    private $publicacion;

    /**
     * @ORM\ManyToOne(targetEntity=Editorial::class, inversedBy="fondos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $editorial;

    /**
     * @ORM\ManyToMany(targetEntity=Autor::class, inversedBy="fondos")
     */
    private $autores;

    public function __construct()
    {
        $this->autores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getEdicion(): ?int
    {
        return $this->edicion;
    }

    public function setEdicion(int $edicion): self
    {
        $this->edicion = $edicion;

        return $this;
    }

    public function getCategoria(): ?string
    {
        return $this->categoria;
    }

    public function setCategoria(?string $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getPublicacion(): ?int
    {
        return $this->publicacion;
    }

    public function setPublicacion(int $publicacion): self
    {
        $this->publicacion = $publicacion;

        return $this;
    }

    public function getEditorial(): ?Editorial
    {
        return $this->editorial;
    }

    public function setEditorial(?Editorial $editorial): self
    {
        $this->editorial = $editorial;

        return $this;
    }

    /**
     * @return Collection|Autor[]
     */
    public function getAutores(): Collection
    {
        return $this->autores;
    }

    public function addAutor(Autor $autor): self
    {
        if (!$this->autores->contains($autor)) {
            $this->autores[] = $autor;
        }

        return $this;
    }

    public function removeAutor(Autor $autor): self
    {
        $this->autores->removeElement($autor);

        return $this;
    }
}
