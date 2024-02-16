<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PaysRepository;
use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

#[ORM\Entity(repositoryClass: PaysRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['pays']],
    shortName: "pays",
    operations: [
        new Get(uriTemplate: '/pays/{id}'),
        new GetCollection(uriTemplate: '/pays'),
        new Post(uriTemplate: '/pays'),
        new Put(uriTemplate: '/pays/{id}'),
        new Delete(uriTemplate: '/pays/{id}')
    ]
)]
class Pays
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 2, unique: true, options: ["fixed" => true])]
    #[SerializedName('codePays')]
    #[Groups('pays')]
    private ?string $codePays = null;

    #[ORM\Column(length: 255)]
    #[SerializedName('nomPays')]
    #[Groups('pays')]
    private ?string $nomPays = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodePays(): ?string
    {
        return $this->codePays;
    }

    public function setCodePays(string $codePays): static
    {
        $this->codePays = $codePays;

        return $this;
    }

    public function getNomPays(): ?string
    {
        return $this->nomPays;
    }

    public function setNomPays(string $nomPays): static
    {
        $this->nomPays = $nomPays;

        return $this;
    }
}
