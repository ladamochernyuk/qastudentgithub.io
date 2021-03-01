<?php
  includeWithVars(VIEWS."/layout/partials/admin/toolbar.php", [
    'url' => '/admin/products',
    'label' => "All Products",
    'title' => "Delete New Product"
  ]);

?>
<div class="row g-3">
    <div class="col-12">
        <form class="" method="POST" action="/admin/products/delete">
        <input type="hidden" name="id" value="<?=$product->id?>">
        <div class="row g-3">
        <h2>Product <?=$product->name?>will be deleted!</h2>
        <h2>Are you sure?</h2>
            
        </div>
        <button name="submit"  name="submit" class="btn btn-danger btn-sn">Delete Product</button>
        <button name="reset" class="btn btn-info btn-sn">Reset</button>
        </form>

    </div>


</div>