<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Sale
 *
 * @ORM\Table(name="sale")
 * @ORM\Entity
 * @ApiResource
 */
class Sale
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
     * @var \DateTime
     *
     * @ORM\Column(name="sale_date", type="date", nullable=false)
     */
    private $saleDate;

    /**
     * @var int
     *
     * @ORM\Column(name="dep_number", type="integer", nullable=false)
     */
    private $depNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="prod_code", type="string", length=10, nullable=false)
     */
    private $prodCode;

    /**
     * @var float|null
     *
     * @ORM\Column(name="amount", type="float", precision=10, scale=0, nullable=true)
     */
    private $amount;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="sale")
     * @ORM\JoinTable(name="sale_product",
     *   joinColumns={
     *     @ORM\JoinColumn(name="sale_id", referencedColumnName="id")
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

    public function getSaleDate(): ?\DateTimeInterface
    {
        return $this->saleDate;
    }

    public function setSaleDate(\DateTimeInterface $saleDate): self
    {
        $this->saleDate = $saleDate;

        return $this;
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

    public function getProdCode(): ?string
    {
        return $this->prodCode;
    }

    public function setProdCode(string $prodCode): self
    {
        $this->prodCode = $prodCode;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;

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
