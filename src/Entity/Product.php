<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity
 */
class Product
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
     * @ORM\Column(name="prod_code", type="string", length=10, nullable=false)
     */
    private $prodCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=true)
     */
    private $name;

    /**
     * @var int|null
     *
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    private $price;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Department", mappedBy="product")
     */
    private $department;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Sale", mappedBy="product")
     */
    private $sale;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->department = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sale = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProdCode(): ?string
    {
        return $this->prodCode;
    }

    public function setProdCode(string $prodCode): self
    {
        $this->prodCode = $prodCode;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|Department[]
     */
    public function getDepartment(): Collection
    {
        return $this->department;
    }

    public function addDepartment(Department $department): self
    {
        if (!$this->department->contains($department)) {
            $this->department[] = $department;
            $department->addProduct($this);
        }

        return $this;
    }

    public function removeDepartment(Department $department): self
    {
        if ($this->department->removeElement($department)) {
            $department->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection|Sale[]
     */
    public function getSale(): Collection
    {
        return $this->sale;
    }

    public function addSale(Sale $sale): self
    {
        if (!$this->sale->contains($sale)) {
            $this->sale[] = $sale;
            $sale->addProduct($this);
        }

        return $this;
    }

    public function removeSale(Sale $sale): self
    {
        if ($this->sale->removeElement($sale)) {
            $sale->removeProduct($this);
        }

        return $this;
    }

}
