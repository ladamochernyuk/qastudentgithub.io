
<?php

includeWithVars(VIEWS."/layout/partials/admin/toolbar.php", [
  'url' => '/admin/brands',
  'label' => "All Brands",
  'title' => "Create New Brands"
]);
?>

<div class="row g-3">
    <div class="col-12">
        <form class="" method="POST" action="/admin/brands/update">
        <input type="hidden" name="id" value="<?=$brand->id?>">
        <div class="row g-3">
            <label class="form-label">Edit Name:</label>
            <input class="form-control" name="name" value="<?=$brand->name?>">
        </div>
        <div class="row g-3">
            <div class="form-check">
            <input type="checkbox" name="status" <?php if($brand->status==1){echo 'checked';}?>>
            <label class="form-checl-label">Brand Status(Check if active)</label>
            </div>
            
        </div>
        <button type="submit" class="w-100 btn btn-primary btn-lg">Update brand</button>
        </form>

    </div>


</div>