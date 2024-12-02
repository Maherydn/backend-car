<?php

namespace App\Controller;

use App\DTO\UserCreateDTO;
use App\Repository\UserRepository;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/user', name: 'user')]
class UserController extends AbstractController
{
    #[Route('/create', name: '.create', methods: ['POST'])]
    public function createUser(
        #[MapRequestPayload] UserCreateDTO $userCreateDTO,
        UserService $userService
    ): Response {
        try {
            $user = $userService->createUser($userCreateDTO);

            return $this->json(
                $user,
                Response::HTTP_OK,
                [$user],
                ['groups' => ['admin.show']]
            );
        } catch (\InvalidArgumentException $e) {
            return $this->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route('/', name: '.get', methods: ['GET'])]
    public function getUsers(UserRepository $userRepository): Response {
        $users = $userRepository->findAll();

        if (empty($users)) {
            return $this->json(['message' => 'Aucun utilisateur trouvé.']);
        }

        // Retourner la liste des utilisateurs en réponse JSON
        return $this->json($users );
    }
}
