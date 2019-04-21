<div class="row d-flex justify-content-center pt-5">
  <div class="col-10">
    <form method="POST">
      <div class="form-group">
        <label for="title">Titulo:</label>
        <input type="text" name="title" id="title" class="form-control" value="<?php echo $book['title']; ?>" />
      </div>
      <div class="form-group">
        <label for="author">Autor:</label>
        <input type="text" name="author" id="author" class="form-control" value="<?php echo $book['author']; ?>"/>
      </div>
      <div class="form-group">
        <label for="description">Descrição:</label>
        <textarea type="text" name="description" id="description" class="form-control">
          <?php echo trim($book['description']); ?>
        </textarea>
      </div>
      <div class="form-group">
        <label for="category">Categoria:</label>
        <select name="category" id="category" class="form-control">
          <?php foreach($categories as $category): ?>
            <option value="<?php echo $category['id'] ?>" <?php echo $category['id'] === $book['category_id'] ? 'selected' : '' ?>>
              <?php echo $category['category_name']; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <input type="submit" value="Cadastrar" class="btn btn-primary" />
    </form>
  </div>
</div>