<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

trait ToggleableTrait
{
    /** @var bool */
    #[ORM\Column(nullable: true, options: ['ddefault' => true])]
    private ?bool $isEnabled = true;

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $isEnabled
     */
    public function setIsEnabled(?bool $isEnabled): self
    {
        $this->isEnabled = (bool) $isEnabled;
        return $this;
    }

    public function enable(): self
    {
        $this->enabled = true;
        return $this;

    }

    public function disable():self
    {
        $this->enabled = false;
        return $this;

    }
}