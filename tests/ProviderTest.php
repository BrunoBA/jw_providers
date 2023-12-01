<?php

namespace JW\Providers\Test;

use JW\Providers\Providers;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ProviderTest extends TestCase
{
    private ?Providers $providers;

    protected function setUp(): void
    {
        $this->providers = new Providers();
    }

    #[Test]
    public function checkIfIsOk(): void
    {
        $this->assertTrue(1 < count($this->providers->getAll()), "Oxe doido");
    }

    protected function tearDown(): void
    {
        $this->providers = null;
    }
}

