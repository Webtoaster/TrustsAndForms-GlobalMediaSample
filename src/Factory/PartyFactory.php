<?php

namespace App\Factory;

use App\Entity\Party;
use App\Repository\PartyRepository;
use DateTime;
use JetBrains\PhpStorm\ArrayShape;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Party>
 *
 * @method static Party|Proxy createOne(array $attributes = [])
 * @method static Party[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Party|Proxy find(object|array|mixed $criteria)
 * @method static Party|Proxy findOrCreate(array $attributes)
 * @method static Party|Proxy first(string $sortedField = 'id')
 * @method static Party|Proxy last(string $sortedField = 'id')
 * @method static Party|Proxy random(array $attributes = [])
 * @method static Party|Proxy randomOrCreate(array $attributes = [])
 * @method static Party[]|Proxy[] all()
 * @method static Party[]|Proxy[] findBy(array $attributes)
 * @method static Party[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Party[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static PartyRepository|RepositoryProxy repository()
 * @method Party|Proxy create(array|callable $attributes = [])
 */
final class PartyFactory extends ModelFactory
{
    // public function __construct()
    // {
    //     parent::__construct();
    // }

    #[ArrayShape([
        'createdAt' => "null",
        'updatedAt' => "null",
        'title'     => "string",
    ])]
    public function getDefaults(): array
    {
        return [

            'createdAt' => new DateTime('now'),
            'updatedAt' => new DateTime('now'),
            'title'     => self::faker()->text(),
        ];
    }

    public function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this// ->afterInstantiate(function(Party $party): void {})
            ;
    }

    public static function getClass(): string
    {
        return Party::class;
    }
}