<?php

namespace App\Entity\Shop\Product;

use App\Doctrine\DBAL\Type\ProductType;
use App\Entity\HasMetaTagsTrait;
use App\Entity\IdentifiableTrait;
use App\Entity\ToggleableTrait;
use App\Repository\Shop\Product\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ORM\Table(name: 'shop_product')]
class Product
{
    use IdentifiableTrait;
    use HasMetaTagsTrait;
    use ToggleableTrait;
    use TimestampableEntity;

    public const TYPE_DELIVERABLE = 'deliverable';
    public const TYPE_DOWNLOADABLE = 'downloadable';

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Gedmo\Slug(fields: ['name'])]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sku = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $barcode = null;

    #[ORM\Column(nullable: true)]
    private ?int $securityStock = null;

    #[ORM\Column(nullable: true)]
    private ?bool $featured = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isVisible = null;

    #[ORM\Column(nullable: true)]
    private ?float $oldPriceAmount = null;

    #[ORM\Column]
    private ?float $priceAmount = null;

    #[ORM\Column(nullable: true)]
    private ?float $costAmount = null;

    #[ORM\Column(type: ProductType::NAME, length: 255, nullable: true)]
    private $type = ProductTypeEnum::DELIVERABLE;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $publishedAt = null;

    #[ORM\Column(nullable: true)]
    private ?int $weightValue = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $weightUnit = null;

    #[ORM\Column(nullable: true)]
    private ?int $heightValue = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $heightUnit = null;

    #[ORM\Column(nullable: true)]
    private ?int $widthValue = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $widthUnit = null;

    #[ORM\Column(nullable: true)]
    private ?int $depthValue = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $depthUnit = null;

    #[ORM\Column(nullable: true)]
    private ?int $volumeValue = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $volumeUnit = null;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'products')]
    private Collection $categories;

    #[ORM\Column(nullable: true, options: ['default' => false])]
    private ?bool $requireShipping = null;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(?string $sku): static
    {
        $this->sku = $sku;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    public function setBarcode(?string $barcode): static
    {
        $this->barcode = $barcode;

        return $this;
    }

    public function getSecurityStock(): ?int
    {
        return $this->securityStock;
    }

    public function setSecurityStock(?int $securityStock): static
    {
        $this->securityStock = $securityStock;

        return $this;
    }

    public function isFeatured(): ?bool
    {
        return $this->featured;
    }

    public function setFeatured(?bool $featured): static
    {
        $this->featured = $featured;

        return $this;
    }

    public function isIsVisible(): ?bool
    {
        return $this->isVisible;
    }

    public function setIsVisible(?bool $isVisible): static
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    public function getOldPriceAmount(): ?float
    {
        return $this->oldPriceAmount;
    }

    public function setOldPriceAmount(?float $oldPriceAmount): static
    {
        $this->oldPriceAmount = $oldPriceAmount;

        return $this;
    }

    public function getPriceAmount(): ?float
    {
        return $this->priceAmount;
    }

    public function setPriceAmount(float $priceAmount): static
    {
        $this->priceAmount = $priceAmount;

        return $this;
    }

    public function getCostAmount(): ?float
    {
        return $this->costAmount;
    }

    public function setCostAmount(?float $costAmount): static
    {
        $this->costAmount = $costAmount;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeImmutable
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(?\DateTimeImmutable $publishedAt): static
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getWeightValue(): ?int
    {
        return $this->weightValue;
    }

    public function setWeightValue(?int $weightValue): static
    {
        $this->weightValue = $weightValue;

        return $this;
    }

    public function getWeightUnit(): ?string
    {
        return $this->weightUnit;
    }

    public function setWeightUnit(?string $weightUnit): static
    {
        $this->weightUnit = $weightUnit;

        return $this;
    }

    public function getHeightValue(): ?int
    {
        return $this->heightValue;
    }

    public function setHeightValue(?int $heightValue): static
    {
        $this->heightValue = $heightValue;

        return $this;
    }

    public function getHeightUnit(): ?string
    {
        return $this->heightUnit;
    }

    public function setHeightUnit(string $heightUnit): static
    {
        $this->heightUnit = $heightUnit;

        return $this;
    }

    public function getWidthValue(): ?int
    {
        return $this->widthValue;
    }

    public function setWidthValue(?int $widthValue): static
    {
        $this->widthValue = $widthValue;

        return $this;
    }

    public function getWidthUnit(): ?string
    {
        return $this->widthUnit;
    }

    public function setWidthUnit(string $widthUnit): static
    {
        $this->widthUnit = $widthUnit;

        return $this;
    }

    public function getDepthValue(): ?int
    {
        return $this->depthValue;
    }

    public function setDepthValue(?int $depthValue): static
    {
        $this->depthValue = $depthValue;

        return $this;
    }

    public function getDepthUnit(): ?string
    {
        return $this->depthUnit;
    }

    public function setDepthUnit(string $depthUnit): static
    {
        $this->depthUnit = $depthUnit;

        return $this;
    }

    public function getVolumeValue(): ?int
    {
        return $this->volumeValue;
    }

    public function setVolumeValue(?int $volumeValue): static
    {
        $this->volumeValue = $volumeValue;

        return $this;
    }

    public function getVolumeUnit(): ?string
    {
        return $this->volumeUnit;
    }

    public function setVolumeUnit(string $volumeUnit): static
    {
        $this->volumeUnit = $volumeUnit;

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): static
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
        }

        return $this;
    }

    public function removeCategory(Category $category): static
    {
        $this->categories->removeElement($category);

        return $this;
    }

    public function isRequireShipping(): ?bool
    {
        return $this->requireShipping;
    }

    public function setRequireShipping(?bool $requireShipping): static
    {
        $this->requireShipping = $requireShipping;

        return $this;
    }
}
