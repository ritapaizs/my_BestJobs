<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobRepository")
 */
class Job
{

    public function __construct()
    {
     $this->slug=md5(rand(1,3000000000000));
    }

    /**
     * @var int
     * @ORM\id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $title;


    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $slug;



    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $descriere;



    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    public $locatii;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescriere(): ?string
    {
        return $this->descriere;
    }

    public function setDescriere(string $descriere): self
    {
        $this->descriere = $descriere;

        return $this;
    }

    public function getLocatii(): ?string
    {
        return $this->locatii;
    }

    public function setLocatii(string $locatii): self
    {
        $this->locatii = $locatii;

        return $this;
    }


    /**
     * @return string
     */
 /*   public function getSalariumax(): string
    {
        return $this->salariumax;
    }

    /**
     * @param string $salariumax
     */
   /* public function setSalariumax(string $salariumax): void
    {
        $this->salariumax = $salariumax;
    }


*/






}
