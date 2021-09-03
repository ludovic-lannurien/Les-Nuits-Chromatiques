<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class UserVoter extends Voter
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports(string $attribute, $subject): bool
    {
        if (!in_array($attribute, ['USER_BROWSE, USER_ADD', 'USER_DELETE'])) {
            return false;
        }

        if (!$subject instanceof \App\Entity\User) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        if ($this->security->isGranted('ROLE_SUPER_ADMIN')) {
            return true;
        }

        switch ($attribute) {
            case 'USER_BROWSE':
                if ($this->security->isGranted('ROLE_ADMIN')) {
                    return false;
                }
                break;

            case 'USER_ADD':
                if ($this->security->isGranted('ROLE_ADMIN')) {
                    return false;
                }
                break;

            case 'USER_DELETE':
                if ($this->security->isGranted('ROLE_ADMIN')) {
                    return false;
                }
                break;
        }

        return false;
    }
}
