<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Department
 *
 * @ORM\Table(name="department", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_CD1DE18A73EDBEAE", columns={"dep_number"})})
 * @ORM\Entity
 */
class Department
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
     * @var int
     *
     * @ORM\Column(name="dep_number", type="integer", nullable=false)
     */
    private $depNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dep_name", type="string", length=30, nullable=true)
     */
    private $depName;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="department")
     * @ORM\JoinTable(name="department_product",
     *   joinColumns={
     *     @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     *   }
     * )
     */
    private $product;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepNumber(): ?int
    {
        return $this->depNumber;
    }

    public function setDepNumber(int $depNumber): self
    {
        $this->depNumber = $depNumber;

        return $this;
    }

    public function getDepName(): ?string
    {
        return $this->depName;
    }

    public function setDepName(?string $depName): self
    {
        $this->depName = $depName;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        $this->product->removeElement($product);

        return $this;
    }

}
