<?php


class ItemStorage{
    private $items = [];

    // добавление товара в хранилище,
    // товары в массиве хранятся по значению id:
    // id товара => товар
    public function add_item(Item $item){
        $this->items[$item->getId()] = $item;
    }

    // написать реализацию следующих методов
    public function get_by_id(string $id){
        // возвращает товар по id
        return $this->items[$id];
    }

    public function get_by_title(string $title){
        // возвращает товар по названию (title)
        foreach ($this->items as $key => $value) {
            if ($value->getTitle() === $title)
                return $this->items[$key];
        }
        return null;
    }

    public function get_by_price(int $price_from, int $price_to): array
    {
        // возвращает товары, стоимость которых находится в диапазоне от $price_from до $price_to
        $result = [];
        foreach ($this->items as $value) {
            if ($value->getPrice() >= $price_from && $value->getPrice() <= $price_to)
                array_push($result, $value);
        }
        return $result;
    }

    public function get_by_material(...$materials): array
    {
        // возвращает товары, которые изготовлены из материалов, перечисленных в $materials,
        // например,
        // при вызове в метод передаются ->get_by_material('дерево', 'железо', 'пластик');
        // значит метод должен вернуть все товары, сделанные из дерева, железа или пластика
        $result = [];
        foreach ($this->items as $value) {
            if (in_array($value->getMaterial(), $materials))
                array_push($result, $value);
        }
        return $result;
    }

    public function get_by_price_and_material(int $price_to, string $material): array
    {
        // возвращает товары, стоимость которых не превышает $price_to и
        // материал, из которого изготовлен товар соответствует $material
        $result = [];
        foreach ($this->items as $value) {
            if ($value->getPrice() <= $price_to && $value->getMaterial() === $material)
                array_push($result, $value);
        }
        return $result;
    }
}