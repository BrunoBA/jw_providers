<?php

namespace JW\Providers;

class Providers
{
    /**
     * @var array|Provider[]
     */
    public array $providers = [];

    public function __construct()
    {
        $this->init();
    }

    private function init(): void
    {
        $providers = loadProviders();
        foreach ($providers as $provider) {
            $this->providers[] = new Provider(
                $provider->id,
                $provider->short_name,
                $provider->clear_name,
                $provider->slug,
                $provider->icon_url
            );
        }
    }

    /**
     * @return array|Provider[]
     */
    public function getAll(): array
    {
        return array_merge([], $this->providers);
    }

    public function getById(int $id): ?Provider
    {
        $providers = $this->providers;

        foreach ($providers as $provider) {
            if ($provider->id == $id) {
                return $provider;
            }
        }

        return null;
    }
}
