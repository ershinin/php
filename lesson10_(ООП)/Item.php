<?php

class Item
{
    private $id; // не может быть отрицательным или 0
    private $title; // максимум 10 символов
    private $price; // не может быть отрицательным или 0
    private $material; // минимум 3 символа

    // свойства title и id являются обязательными,
    public function __construct(int $id, string $title, int $price = null, string $material = null) {
        if ($id <= 0) {
            throw new InvalidArgumentException(
                'Id 0 или меньше');
        }
        $this->id = $id;
        if (strlen($title) > 10) {
            throw new InvalidArgumentException(
                'Размер title больше 10 символов');
        }
        $this->title = $title;
        if ($price <= 0) {
            throw new InvalidArgumentException(
                'Price 0 или меньше');
        }
        $this->price = $price;
        if (isset($material) && strlen($material) < 3) {
            throw new InvalidArgumentException(
                'Размер material меньше 3 символов');
        }
        $this->material = $material;
    }

    // добавить все необходимые геттеры и сеттеры

    public function setId(int $id): void
    {
        if ($id <= 0) {
            throw new InvalidArgumentException('Id 0 или меньше');
        }
        $this->id = $id;
    }

    public function setMaterial(string $material): void
    {
        if (strlen($material) < 3) {
            throw new InvalidArgumentException('Размер material меньше 3 символов');
        }
        $this->material = $material;
    }

    public function setPrice(int $price): void
    {
        if ($price <= 0) {
            throw new InvalidArgumentException('Price 0 или меньше');
        }
        $this->price = $price;
    }

    public function setTitle(string $title): void
    {
        if (strlen($title) > 10) {
            throw new InvalidArgumentException('Размер title больше 10 символов');
        }
        $this->title = $title;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}