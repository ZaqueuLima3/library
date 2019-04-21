
<section class="container">
  <form action="<?php echo BASE_URL; ?>search" method="get">
    <div class="row pt-5">
      <div class="col-12">
        <form action="" method="get">
          <div class="row">
            <div class="col-md-2 mb-2">
              <select class="form-control" name="t" id="type">
                <option value="title" <?php echo $type === 'title'?'selected':''; ?>>Titulo</option>
                <option value="author" <?php echo $type === 'author'?'selected':''; ?>>Autor</option>
              </select>
            </div>
            <div class="col-md-10 mb-2">
              <div class="input-group mb-2">
                <input class="form-control" type="text" name="s" placeholder="Qual livro você deseja ler?">
                <div class="input-group-prepend">
                  <button type="submit" class="input-group-text" style="cursor:pointer;">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </form>

  <div class="row pt-5">
    <div class="col-md-3 col-12">
      <h3>Categorias</h3>
      <ul class="list-categories">
         <a class="categories-items" href="<?php echo BASE_URL; ?>search?c=<?php echo ''.$url ?>">Todas cadecorias</a>
        <?php foreach($categories as $category): ?>
          <a class="categories-items" href="<?php echo BASE_URL; ?>search?c=<?php echo $category['id'].$url ?>"><li><?php echo $category['category_name']; ?></li></a>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="col-md-9 col-12">
      
      <?php if (isset($search) && !empty($search)): ?>
        <h4>Você esta procurando por: <strong> <?php echo $search; ?> </strong></h4>
      <?php else: ?>
        <h3>Livros</h3>
      <?php endif; ?>
      <?php require 'includes/books-panel.php'; ?>
    </div>
  </div>
</section>