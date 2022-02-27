<?php

//Этот массив чтобы не усложнять код при создании экземпляра класса
$params1 = [
  'color' => 'white',
  'size' => '50',
  'gender' => 'female',
  'season' => 'summer',
  'category' => 'blouse',
];

class Product {
  public $id;
  public $title;
  public $price;
  public $description;
  public $image;

  function __construct($id = null, $title = null, $price = null, $description = null, $image = null)
  {
    $this->id = $id;
    $this->title = $title;
    $this->price = $price;
    $this->description = $description;
    $this->image = $image;
  }

  function view() 
  {
    echo "
      <h1>{$this->title}</h1>
      <p>{$this->image}</p>
      <p>{$this->price}</p>
      <p>{$this->description}</p>
    ";
  }
}

class ProductClothes extends Product {
  public $params;
  public $discount;

  function __construct($id = null, $title = null, $price = null, $description = null, $image = null, $discount = null, $params = [])
  {
    parent::__construct($id, $title, $price, $description, $image);
    $this->params = $params;
    $this->discount = $discount;
  }

  function calcPriceDiscaount()
  {
    return $this->price * (1 - $this->discount / 100);
  }

  function view()
  {
    parent::view();
    echo "<p>Скидка: {$this->discount}%</p>";
    echo "Цена со скидкой = " . $this->calcPriceDiscaount() . "<br><br>";
  }

  function viewParams()
  {
    $result = "Характеристики:<br>";

    foreach($this->params as $key=>$value) {
      $result .= "{$key}: {$value};<br>";
    }

    return $result;
  }
}

function view(Product $product)
{
  $product->view();
}

$product1 = new Product(1, 'Продукт без параметров', 120, 'Какое-то описание продукта 1', 'Картинка 1');
view($product1);
var_dump($product1);

$product2 = new ProductClothes(2, 'Блузка белая офис', 200, 'Какое-то описание блузки 2', 'Картинка 2', 5, $params1);
view($product2);
echo $product2->viewParams();
var_dump($product2);
