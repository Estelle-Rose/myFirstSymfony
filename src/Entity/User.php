<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
* @UniqueEntity(
* fields={"username"},
* message="cet utilisateur existe déjà"
* )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")    
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3,max=25, minMessage="Le nom doit être de 3 caractères minimum")
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5,max=20, minMessage="Le mot de passe doit être de 3 caractères minimum et 20 maximum",maxMessage="Le mot de passe doit être de 20 caractères maximum")
     */
    private $password;
    /**
     *
     * @Assert\Length(min=5,max=20, minMessage="Le mot de passe doit être de 3 caractères minimum et 20 maximum",maxMessage="Le mot de passe doit être de 20 caractères maximum")
     * @Assert\EqualTo(propertyPath="password", message="Les mots de passe ne sont pas identiques")
     */
    private $checkedPassword;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roles;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    public function getCheckedPassword(): ?string
    {
        return $this->checkedPassword;
    }

    public function setCheckedPassword(string $checkedPassword): self
    {
        $this->checkedPassword = $checkedPassword;

        return $this;
    }
    public function eraseCredentials()
    {
        
    }
    public function getSalt()
    {
        
    }
    
    public function getRoles()
    {
        return [$this->roles];
    }

    public function setRoles(? string $roles): self
    {
        if($roles === null) {
            $this->roles = "ROLE_USER";
        } else {
            $this->roles = $roles;

        }
        return $this;
    }
}
