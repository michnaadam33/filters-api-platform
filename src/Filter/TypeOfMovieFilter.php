<?php


namespace App\Filter;


use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\AbstractFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use App\Entity\Movie;
use Doctrine\ORM\QueryBuilder;

class TypeOfMovieFilter extends AbstractFilter
{
    protected function filterProperty(string $property, $value, QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null)
    {
        $joinAlias = $queryNameGenerator->generateJoinAlias('movies');
        $rootAlias = $queryBuilder->getRootAliases()[0];
        $queryBuilder
            ->leftJoin($rootAlias.'.movies', $joinAlias)
            ->andWhere($joinAlias . ".type = :type")
            ->setParameter('type', $value);
    }

    public function getDescription(string $resourceClass): array
    {
        $description = [];
        $description["typesOfFilms"] = [
            'property' => 'typesOfFilms',
            'type' => 'string',
            'required' => false,
            'swagger' => [
                'name' => 'Aktorzy którzy grali w typach filmów',
                'type' => 'Will appear below the name in the Swagger documentation',
                'description' => 'Filter using a regex. This will appear in the Swagger documentation!',
            ],
        ];

        return $description;
    }
}