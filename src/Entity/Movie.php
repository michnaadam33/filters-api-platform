<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;

/**
 * @ORM\Entity()
 * @ApiResource(attributes={"filters"={"movie.date_filter"}})
 * @ApiFilter(SearchFilter::class, properties={"title": "ipartial"})
 * @ApiFilter(
 *     OrderFilter::class,
 *     properties={"validFrom": { "nulls_comparison": OrderFilter::NULLS_SMALLEST, "default_direction": "DESC" }}
 *     )
 */
class Movie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $createdAt;

    /**
     * @ORM\Column()
     * @var string
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @var User
     */
    private $director;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User")
     * @var User[]|Collection
     */
    private $actors;

    /**
     * @ORM\Column()
     * @var string
     */
    private $type;

    public function __construct()
    {
        $this->actors = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     * @return Movie
     */
    public function setCreatedAt(DateTime $createdAt): Movie
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Movie
     */
    public function setTitle(string $title): Movie
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return User
     */
    public function getDirector(): User
    {
        return $this->director;
    }

    /**
     * @param User $director
     * @return Movie
     */
    public function setDirector(User $director): Movie
    {
        $this->director = $director;
        return $this;
    }

    /**
     * @return User[]|Collection
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * @param User[]|Collection $actors
     * @return Movie
     */
    public function setActors($actors)
    {
        $this->actors = $actors;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }
}