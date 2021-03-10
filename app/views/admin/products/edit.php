
<?php

includeWithVars(VIEWS."/layout/partials/admin/toolbar.php", [
  'url' => '/admin/products',
  'label' => "All Products",
  'title' => "Create New Products"
]);
?>

<div class="row g-3">
    <div class="col-12">
        <form class="" method="POST" action="/admin/products/update">
        <input type="hidden" name="id" value="<?=$product->id?>">
        <div class="row g-3">
            <label class="form-label">Edit Name:</label>
            <input class="form-control" name="name" value="<?=$product->name?>">
        </div>
        <div class="row g-3">
            <div class="form-check">
            <input type="checkbox" name="status" <?php if($product->status==1){echo 'checked';}?>>
            <label class="form-checl-label">Product Status(Check if active)</label>
            </div>
            
        </div>
        <button type="submit" class="w-100 btn btn-primary btn-lg">Update product</button>
        </form>

    </div>


</div>