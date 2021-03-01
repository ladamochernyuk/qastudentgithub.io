<?php
  includeWithVars(VIEWS."/layout/partials/admin/toolbar.php", [
    'url' => '/admin/brands',
    'label' => "All Brands",
    'title' => "Delete New Brand"
  ]);

?>
<div class="row g-3">
    <div class="col-12">
        <form class="" method="POST" action="/admin/brands/delete">
        <input type="hidden" name="id" value="<?=$brand->id?>">
        <div class="row g-3">
        <h2>Category <?=$brand->name?>will be deleted!</h2>
        <h2>Are you sure?</h2>
            
        </div>
        <button name="submit"  name="submit" class="btn btn-danger btn-sn">Delete Category</button>
        <button name="reset" class="btn btn-info btn-sn">Reset</button>
        </form>

    </div>


</div>