<?php

use app\models\entities\Products;
use PHPUnit\Framework\TestCase;

class ProductsTest extends TestCase
{
    protected $product;

    protected function setUp(): void
    {
        $this->product = new Products();
    }

    protected function tearDown(): void
    {
        $this->product = NULL;
    }

    /**
     * @dataProvider additionProvider
     */
    public function testProductConstruct($data)
    {
        foreach($data as $key => $value) {
            $this->product->$key = $data[$key];
        }

        $this->assertEquals($data['name_product'], $this->product->name_product);
        $this->assertEquals($data['price'], $this->product->price);
        $this->assertEquals($data['path'], $this->product->path);
        $this->assertEquals($data['description'], $this->product->description);
    }

    public function additionProvider()
    {
        return [
            'fields null'  => ['data' => [
                'name_product' => null,
                'price' => null,
                'path' => null,
                'description' => null,
            ]],
            'fields full'  => ['data' => [
                'name_product' => 'Чай',
                'price' => '120',
                'path' => 'Путь к картинке',
                'description' => 'Описание чая',
            ]],
            'fields two'  => ['data' => [
                'name_product' => 'Чай',
                'price' => null,
                'path' => null,
                'description' => 'Описание чая',
            ]],
            'fields one'  => ['data' => [
                'name_product' => 'Чай',
                'price' => null,
                'path' => null,
                'description' => null,
            ]],
            'fields three'  => [
                'data' => 
                    [
                    'name_product' => 'Чай',
                    'price' => 120,
                    'path' => null,
                    'description' => 'Описание чая',
                ]],
        ];
    }
}