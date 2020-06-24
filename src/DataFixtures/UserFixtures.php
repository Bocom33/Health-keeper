<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    const USER = [
        'email' => 'user@gmail.com',
        'roles' => ['ROLE_USER'],
        'name'  => 'Ludo',
    ];

    const PASSWORD_USER = 'oui';

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setEmail(self::USER['email'])
            ->setName(self::USER['name'])
            ->setPassword($this->passwordEncoder->encodePassword(
                $user,
                self::PASSWORD_USER
            ));

        $manager->persist($user);

        $manager->flush();
    }

}
