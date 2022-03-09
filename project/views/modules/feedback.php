<ul>
  <?php if(empty($feedbackList)) echo 'Нет отзывов'?>
  <?php foreach($feedbackList as $value): ?>
    <li class="feedback-list">
      <?php if($feedbackControl): ?>
      <div class="feedback-control">
        <a href="/one-product/edit/?id_feedback=<?=$value['id']?>&id=<?=$value['id_product']?>"><img src="/img/edit.png" alt="edit" width="20"></a>
        <a href="/one-product/delete/?id_feedback=<?=$value['id']?>&id=<?=$value['id_product']?>"><img src="/img/delete.svg" alt="delete"></a>
      </div>
      <?php endif; ?>
      <div class="feedback-text">
        <p><?=$value['name']?></p>
        <p><?=$value['feedback']?></p>
      </div>
    </li>
  <?php endforeach; ?>
</ul>