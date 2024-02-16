<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\VilleRepository;
use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

#[ORM\Entity(repositoryClass: VilleRepository::class)]
#[
    ApiResource(
        normalizationContext: ['groups' => ['villes']],
        shortName: "Villes",
        operations: [
            new Get(uriTemplate: '/villes/{id}'),
            new GetCollection(uriTemplate: '/villes'),
            new Post(uriTemplate: '/villes'),
            new Put(uriTemplate: '/villes/{id}'),
            new Delete(uriTemplate: '/villes/{id}')
        ]
    )
]
class Ville
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 8)]
    #[SerializedName('codePostalVille')]
    #[Groups('villes')]
    private ?string $codePostalVille = null;

    #[ORM\Column(length: 255)]
    #[SerializedName('nomVille')]
    #[Groups('villes')]
    private ?string $nomVille = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[SerializedName('pays')]
    #[Groups('villes', 'pays')]
    private ?Pays $pays = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodePostalVille(): ?string
    {
        return $this->codePostalVille;
    }

    public function setCodePostalVille(string $codePostalVille): static
    {
        $this->codePostalVille = $codePostalVille;

        return $this;
    }

    public function getNomVille(): ?string
    {
        return $this->nomVille;
    }

    public function setNomVille(string $nomVille): static
    {
        $this->nomVille = $nomVille;

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): static
    {
        $this->pays = $pays;

        return $this;
    }
}
