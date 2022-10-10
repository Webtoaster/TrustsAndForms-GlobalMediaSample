<?php

namespace App\Factory;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\Options;
use DateTime;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<User>
 *
 * @method static User|Proxy createOne(array $attributes = [])
 * @method static User[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static User|Proxy find(object|array|mixed $criteria)
 * @method static User|Proxy findOrCreate(array $attributes)
 * @method static User|Proxy first(string $sortedField = 'id')
 * @method static User|Proxy last(string $sortedField = 'id')
 * @method static User|Proxy random(array $attributes = [])
 * @method static User|Proxy randomOrCreate(array $attributes = [])
 * @method static User[]|Proxy[] all()
 * @method static User[]|Proxy[] findBy(array $attributes)
 * @method static User[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static User[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static UserRepository|RepositoryProxy repository()
 * @method User|Proxy create(array|callable $attributes = [])
 */
final class UserFactory extends ModelFactory
{

    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        parent::__construct();

        $this->passwordHasher = $passwordHasher;
    }

    public function getDefaults(): array
    {
        return [
            'first'           => self::faker()->firstName(),
            'middle'          => null,
            'last'            => self::faker()->lastName(),
            'suffix'          => null,
            'email'           => self::faker()->unique()->safeEmail(),
            'plainPassword'   => self::faker()->unique()->password(8, 32),
            'roles'           => ['ROLE_UNVERIFIED_EMAIL'],
            'isVerified'      => false,
            'physicalLine1'   => self::faker()->streetAddress(),
            'physicalLine2'   => null,
            'physicalCity'    => self::faker()->city(),
            'physicalState'   => array_rand(Options::VALID_STATES),
            'physicalZipCode' => self::faker()->postcode(),
            'mailLine1'       => self::faker()->streetAddress(),
            'mailLine2'       => null,
            'mailCity'        => self::faker()->city(),
            'mailState'       => array_rand(Options::VALID_STATES),
            'mailZipCode'     => self::faker()->postcode(),
            'dateOfBirth'     => self::faker()->dateTimeBetween('-60 years', '-18 years'),
            'dateOfDeath'     => null,
            'phoneMain'       => self::faker()->phoneNumber(),
            'phoneAlternate'  => self::faker()->phoneNumber(),
            // 'url'             => self::faker()->url(),
            'createdAt'       => new DateTime('now'),
            'updatedAt'       => new DateTime('now'),

        ];
    }

    public function initialize(): self
    {
        return $this
            ->afterInstantiate(function (User $user) {
                if ($user->getPlainPassword()) {
                    $user->setPassword(
                        $this->passwordHasher->hashPassword($user, $user->getPlainPassword())
                    );
                }
            });
    }

    public static function getClass(): string
    {
        return User::class;
    }
}