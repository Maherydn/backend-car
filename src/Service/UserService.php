<?php

namespace App\Service;

use App\DTO\UserCreateDTO;
use App\Entity\User;
use App\Repository\CompanieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserService 
{
    public function __construct(
        private EntityManagerInterface $em,
        private UserPasswordHasherInterface $passwordHasher,
        private CompanieRepository $companieRepository,
    ) {}

    public function createUser(UserCreateDTO $userCreateDTO): User 
    {
        $user = new User();
        
        $userProps = [
            'email' => 'setEmail',
            'name' => 'setName',
            'companie' => 'setCompanie',
        ];

        foreach ($userProps as $prop => $setter) {
            $value = $userCreateDTO->$prop;

            if ($value !== null && $value !== '') {
                if ($prop === 'roles' && !is_array($value)) {
                    return null;
                }
                if ($prop === 'companie') {
                    $companie = $this->companieRepository->find($value);
                    $user->$setter($companie);
                }else {
                    $user->$setter($value);
                }

            }
        }

        if (isset($userCreateDTO->password) && !empty($userCreateDTO->password)){
            $hashedPassword = $this->passwordHasher->hashPassword($user, $userCreateDTO->password);
            $user->setPassword($hashedPassword);
        }

        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }
}
