<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alldech
 *
 * @ORM\Table(name="alldech")
 * @ORM\Entity
 */
class Alldech
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="text", length=65535, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="text", length=65535, nullable=false)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="text", length=65535, nullable=false)
     */
    private $latitude;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }


}
