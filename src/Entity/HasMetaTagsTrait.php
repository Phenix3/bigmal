<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

trait HasMetaTagsTrait
{
    #[ORM\Column(nullable: true, length: 255)]
    private ?string $metaTitle = null;

    #[ORM\Column(nullable: true, length: 1000)]
    private ?string $metDescription = null;

    

    /**
     * Get the value of metaTitle
     */ 
    public function getMetaTitle(): ?string
    {
        return $this->metaTitle;
    }

    /**
     * Set the value of metaTitle
     *
     * @return  self
     */ 
    public function setMetaTitle(?string $metaTitle)
    {
        $this->metaTitle = $metaTitle;

        return $this;
    }

    /**
     * Get the value of metDescription
     */ 
    public function getMetDescription(): ?string
    {
        return $this->metDescription;
    }

    /**
     * Set the value of metDescription
     *
     * @return  self
     */ 
    public function setMetDescription(?string $metDescription)
    {
        $this->metDescription = $metDescription;

        return $this;
    }
}