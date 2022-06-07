<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $usEmail;

    /**
     * @ORM\Column(type="json")
     */
    private $usRoles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $usPassword;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $usLastname;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $usFirstname;

    /**
     * @ORM\Column(type="boolean")
     */
    private $usAvailable;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsEmail(): ?string
    {
        return $this->usEmail;
    }

    public function setUsEmail(string $email): self
    {
        $this->usEmail = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->usEmail;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->usEmail;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->usRoles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setUsRoles(array $roles): self
    {
        $this->usRoles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->usPassword;
    }

    public function setPassword(string $password): self
    {
        $this->usPassword = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUsLastname(): ?string
    {
        return $this->usLastname;
    }

    public function setUsLastname(string $usLastname): self
    {
        $this->usLastname = $usLastname;

        return $this;
    }

    public function getUsFirstname(): ?string
    {
        return $this->usFirstname;
    }

    public function setUsFirstname(string $usFirstname): self
    {
        $this->usFirstname = $usFirstname;

        return $this;
    }

    public function isUsAvailable(): ?bool
    {
        return $this->usAvailable;
    }

    public function setUsAvailable(bool $usAvailable): self
    {
        $this->usAvailable = $usAvailable;

        return $this;
    }
}
