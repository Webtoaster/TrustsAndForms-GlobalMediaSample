<?php

namespace App\Factory;

use App\Entity\Matrix;
use App\Repository\MatrixRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Matrix>
 *
 * @method static Matrix|Proxy createOne(array $attributes = [])
 * @method static Matrix[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Matrix|Proxy find(object|array|mixed $criteria)
 * @method static Matrix|Proxy findOrCreate(array $attributes)
 * @method static Matrix|Proxy first(string $sortedField = 'id')
 * @method static Matrix|Proxy last(string $sortedField = 'id')
 * @method static Matrix|Proxy random(array $attributes = [])
 * @method static Matrix|Proxy randomOrCreate(array $attributes = [])
 * @method static Matrix[]|Proxy[] all()
 * @method static Matrix[]|Proxy[] findBy(array $attributes)
 * @method static Matrix[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Matrix[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static MatrixRepository|RepositoryProxy repository()
 * @method Matrix|Proxy create(array|callable $attributes = [])
 */
final class MatrixFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'name' => self::faker()->text(),
            'abv' => self::faker()->text(),
            'mg' => self::faker()->text(),
            'mgFfl' => self::faker()->boolean(),
            'mgFlag' => self::faker()->boolean(),
            'supp' => self::faker()->text(),
            'suppFfl' => self::faker()->boolean(),
            'suppFlag' => self::faker()->boolean(),
            'sbr' => self::faker()->text(),
            'sbrFfl' => self::faker()->boolean(),
            'sbrFlag' => self::faker()->boolean(),
            'sbs' => self::faker()->text(),
            'sbsFfl' => self::faker()->boolean(),
            'sbsFlag' => self::faker()->boolean(),
            'aow' => self::faker()->text(),
            'aowFfl' => self::faker()->boolean(),
            'aowFlag' => self::faker()->boolean(),
            'dd' => self::faker()->text(),
            'ddFfl' => self::faker()->boolean(),
            'ddFlag' => self::faker()->boolean(),
            'slug' => self::faker()->text(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Matrix $matrix): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Matrix::class;
    }
}
