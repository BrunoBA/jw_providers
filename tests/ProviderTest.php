<?php

namespace JW\Providers\Test;

use JW\Providers\Provider;
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
    public function checkIfHas723Providers(): void
    {
        $this->assertEquals(723, count($this->providers->getAll()), "Oxe doido");
    }

    #[Test]
    public function checkIfTheyHaveDifferentNames(): void
    {
        $providerNames = [];
        foreach ($this->providers->getAll() as $provider) {
            if (in_array($provider->shortName, $providerNames)) {
                continue;
            }
            $providerNames[] = $provider->shortName;
        }
        $this->assertEquals(723, count($providerNames), "Oxe doido");
    }

    #[Test]
    public function checkIfTheyHaveDifferentImages(): void
    {
        $providerNames = [];
        /** @var Provider $provider */
        foreach ($this->providers->getAll() as $provider) {
            if (in_array($provider->iconUrl, $providerNames)) {
                continue;
            }
            $providerNames[] = $provider->iconUrl;
        }

        $this->assertEquals(720, count($providerNames));
    }

    protected function tearDown(): void
    {
        $this->providers = null;
    }
}

