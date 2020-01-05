<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity()
 * @ApiResource()
 * @ApiFilter(SearchFilter::class, properties={"firstName": "ipartial", "lastName": "ipartial"})
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column()
     * @var string
     */
    private $firstName;

    /**
     * @ORM\Column()
     * @var string
     */
    private $lastName;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Movie")
     * @var Movie[]|Collection
     */
    private $movies;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return User
     */
    public function setFirstName(string $firstName): User
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return User
     */
    public function setLastName(string $lastName): User
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return Movie[]|Collection
     */
    public function getMovies()
    {
        return $this->movies;
    }

    /**
     * @param Movie[]|Collection $movies
     * @return User
     */
    public function setMovies($movies)
    {
        $this->movies = $movies;
        return $this;
    }
}