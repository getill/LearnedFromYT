<?php

// UserListener sert à encode le mot de passe au moment du persist dans AppFixtures
namespace App\EntityListener;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserListener
{

  private UserPasswordHasherInterface $hasher;

  public function __construct(UserPasswordHasherInterface $hasher)
  {
    $this->hasher = $hasher;
  }

  public function prePersist(User $user)
  {
    $this->encodePassword($user);
  }

  public function preUpdate(User $user)
  {
    $this->encodePassword($user);
  }

  /**
   * Encode password based on plain password
   *
   * @param User $user
   * @return void
   */
  public function encodePassword(User $user)
  {
    if ($user->getPlainPassword() === null) {
      return;
    }

    $user->setPassword(
      $this->hasher->hashPassword(
        $user,
        $user->getPlainPassword()
      )
    );

    // On remet le mot de passe non hashé à null pour éviter toute fuite
    $user->setPlainPassword(null);
  }
}
