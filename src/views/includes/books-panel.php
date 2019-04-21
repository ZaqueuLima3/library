
<div class="row">
<?php $countAllBooks = 0; ?>
<?php foreach($books as $book): ?>
  <div class="card">
    <img class="card-img-top" src="<?php echo BASE_URL;?>public/assets/images/book.jpg" alt="Card image cap">
    <div class="card-body">
      <div style="min-height:150px;">
        <h5 class="card-title" style="margin-bottom:1px;"><?php echo $book['title']; ?></h5>
        <small><strong><?php echo $book['author']; ?></strong></small>
        <p class="card-text"><?php echo $book['description']; ?></p>
      </div>
      <?php if (!in_array($book['id'], $myLibrary)): ?>
        <a href="<?php echo BASE_URL; ?>library/add/<?php echo $book['id']; ?>" class="btn btn-primary">+ Biblioteca</a>
      <?php else: ?>
        <a href="<?php echo BASE_URL; ?>library/remove/<?php echo $book['id']; ?>/home" class="btn btn-primary">- Remove</a>
      <?php endif; ?>
    </div>
  </div>
<?php $countAllBooks++; endforeach; ?>

<?php if ($countAllBooks === 0): ?>
  <div class="col-12">
    <div class="alert alert-primary">
      Desculpe ainda não possuimos este conteúdo
    </div>
  </div>
<?php endif; ?>

</div>