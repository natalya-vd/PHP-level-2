<main class="container">
    <h2>Каталог</h2>
    <ul class="catalog-list">
        <?php foreach($catalog as $item): ?>
            <li class="catalog-item">
                <a class="catalog-link" href="/?c=product&a=card&id=<?=$item['id']?>">
                    <img src="/img/catalog/<?=$item['path']?>" alt="<?=$item['name_product']?>" width="300" height="200">
                    <div class="catalog-inner">
                        <h3><?=$item['name_product']?></h3>
                        <p>Цена: <?=$item['price']?></p>
                        <button class="button" type="button" data-id="<?=$item['id']?>" data-price="<?=$item['price']?>">Купить</button>
                    </div>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a class="button-link button" href="/?c=product&a=catalog&page=<?=$page?>">Показать еще</a>
</main>
