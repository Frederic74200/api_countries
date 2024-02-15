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
#[
    ApiResource(
        normalizationContext: ['groups' => ['pays']],
        shortName: "pays",
        operations: [
            new Get(uriTemplate: '/pays/{id}'),
            new GetCollection(uriTemplate: '/pays'),
            new Post(uriTemplate: '/pays'),
            new Put(uriTemplate: '/pays/{id}'),
            new Delete(uriTemplate: '/pays/{id}')
        ]
    )


]
class Pays
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('pays')]
    private ?int $id = null;

    #[ORM\Column(length: 2, unique: true, options: ["fixed" => true])]
    #[SerializedName('countryCode')]
    #[Groups('pays')]
    private ?string $country_code = null;

    #[ORM\Column(length: 255)]
    #[SerializedName('countryName')]
    #[Groups('pays')]
    private ?string $country_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountryCode(): ?string
    {
        return $this->country_code;
    }

    public function setCountryCode(string $country_code): static
    {
        $this->country_code = $country_code;

        return $this;
    }

    public function getCountryName(): ?string
    {
        return $this->country_name;
    }

    public function setCountryName(string $country_name): static
    {
        $this->country_name = $country_name;

        return $this;
    }
}
