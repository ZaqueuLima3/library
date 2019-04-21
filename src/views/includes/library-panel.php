
<div class="row d-flex justify-content-center pt-5">

<?php foreach($myLibrary as $book): ?>
  <div class="card">
    <img class="card-img-top" src="<?php echo BASE_URL;?>public/assets/images/book.jpg" alt="Card image cap">
    <div class="card-body">
      <div style="min-height:150px;">
        <h5 class="card-title"><?php echo $book['title']; ?></h5>
        <small><strong><?php echo $book['author']; ?></strong></small>
        <p class="card-text"><?php echo $book['description']; ?></p>
      </div>
      <a href="<?php echo BASE_URL; ?>library/remove/<?php echo $book['book_id'];?>" class="btn btn-primary">- Remove</a>
    </div>
  </div>
<?php endforeach; ?>


</div>