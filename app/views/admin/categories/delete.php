<?php
  includeWithVars(VIEWS."/layout/partials/admin/toolbar.php", [
    'url' => '/admin/categories',
    'label' => "All Categories",
    'title' => "Delete New Category"
  ]);

?>
<div class="row g-3">
    <div class="col-12">
        <form class="" method="POST" action="/admin/categories/delete">
        <input type="hidden" name="id" value="<?=$category->id?>">
        <div class="row g-3">
        <h2>Category <?=$category->name?>will be deleted!</h2>
        <h2>Are you sure?</h2>
            
        </div>
        <button name="submit"  name="submit" class="btn btn-danger btn-sn">Delete Category</button>
        <button name="reset" class="btn btn-info btn-sn">Reset</button>
        </form>

    </div>


</div>