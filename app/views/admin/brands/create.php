<?php
  includeWithVars(VIEWS."/layout/partials/admin/toolbar.php", [
    'url' => '/admin/brands',
    'label' => "All Brands",
    'title' => "Create New Brand"
  ]);

?>

<div class="row g-3">
    <div class="col-12">
        <form class="" method="POST" action="/admin/brands/store">
            <div class="row g-3">
                <label class="form-label">Brand Name:</label>
                <input class="form-control" name="name">
            </div>
            <div class="row g-3">
                <div class="form-check">
                <input type="checkbox" name="status"> 
                <label class="form-checl-label">Brand Status (Check if active)</label>
                </div>
                
            </div>
            <button type="submit" class="w-100 btn btn-primary btn-lg">Add New Brand</button>
        </form>
    </div>

</div>