<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\JobRepository")
 */
class Job
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $title;
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $locatie;
    /**
     * @return string
     */
    public function getLocatie()
    {
        return $this->locatie;
    }
    /**
     * @param string $locatie
     */
    public function setLocatie(string $locatie): void
    {
        $this->locatie = $locatie;
    }
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $description;
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $slug;
    public function __construct(){
        $this->slug=rand(1,99999);
    }
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }
}
