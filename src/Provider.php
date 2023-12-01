<?php

namespace JW\Providers;

class Provider implements \JsonSerializable
{
    public ?string $iconUrl;

    public function __construct(
        public ?int $id,
        public ?string $shortName,
        public ?string $clearName,
        public ?string $slug,
        ?string $iconUrl,
    ) {
        $this->initIconUrl($iconUrl);
    }

    private function initIconUrl(?string $iconUrl): void
    {
        if ($iconUrl === null) {
            $this->iconUrl = "";

            return;
        }

        $imageSize = ImageSizes::SMALL;
        $iconUrl = str_replace('{profile}', $imageSize->value, $iconUrl);

        $this->iconUrl = "https://images.justwatch.com".$iconUrl;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->clearName,
            'code' => $this->shortName,
            'icon_url' => $this->iconUrl,
        ];
    }
}

