<main class="container">
  <a class="one-product-back" href="/?c=product&a=catalog">Вернуться в каталог</a>
  <h1>
    <?=$product->name_product?>
  </h1>
  <div>
    <img src="/img/catalog/<?=$product->path?>" alt="<?=$product->name_product?>" width="300" height="200">
    <p>Цена: <?=$product->price?></p>
    <p><?=$product->description?></p>
    <button class="button" type="button" data-id="<?=$product->id?>" data-price="<?=$product->price?>">Купить</button>
  </div>
</main>