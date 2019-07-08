<?php

namespace App\Entity\Temperature;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Temperature\TemperatureRepository")
 */
class Temperature
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * The temperature value.
     *
     * @ORM\Column(type="float")
     */
    private $value;

    /**
     * When the temperature was measured.
     *
     * @ORM\Column(type="datetime")
     */
    private $measured_at;

    /**
     * The temperature unit.
     * 
     * Usually Celsius or Fahrenheit.
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Temperature\TemperatureUnit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getMeasuredAt(): ?\DateTimeInterface
    {
        return $this->measured_at;
    }

    public function setMeasuredAt(\DateTimeInterface $measured_at): self
    {
        $this->measured_at = $measured_at;

        return $this;
    }

    public function getUnit(): ?TemperatureUnit
    {
        return $this->unit;
    }

    public function setUnit(?TemperatureUnit $unit): self
    {
        $this->unit = $unit;

        return $this;
    }
}
