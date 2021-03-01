<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOK STORE</title>
    <link href="/css/styles.css" rel="stylesheet">
    <link href="/css/variebles.css" rel="stylesheet">
</head>

<body>
    <?php require_once VIEWS."/layout/partials/site/nav.php"?>
    <?php require_once VIEWS."/layout/partials/site/aside.php"?>
    <div class="container">
    {{content}}
    </div>
   
    <?php require_once VIEWS."/layout/partials/site/footer.php"?>
<script src="/js/app.js"></script>
<script src="/js/products.js"></script>
</body>
</html>