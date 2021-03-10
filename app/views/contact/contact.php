<section class="py-5">
    <header class="text-center">
        <p class="text-muted text-uppercase mb-1">Keeping up</p>
        <h2 class="h5 text-uppercase mb-4">Contact Us</h2>
    </header>
<div class="row bg-green">
<div class="col-md-6">
    <h3>BOOK STORE</h3>
    <?php if(isset($address)):?>
            <ul>
                <li><i class="fa fa-road"></i><?= $address['street']?></li>
                <li><i class="fas fa-map-marker-alt"></i><?= $address['city']?></li>
                <li><i class="fas fa-home"></i><?= $address['country']?></li>
                <li><i class="fa fa-phone"></i><?= $address['mobile']?></li>
                <li><i class="fa fa-envelope"></i><?= $address['email']?></li>
            </ul>
    <?php endif?>
</div>
<div class="col-md-6">
    <div class="contact">
        <form method="POST">
                <div class="table-cell">
                    <label for="name">Your name</label>
                    <input id="name" type="text" name="name" placeholder="enter your name">
                </div>
                <div class="table-cell">
                    <label for="email">Your email</label>
                    <input id="email" type="email" name="email" placeholder="enter your name">
                </div>
                <div class="full">
                    <label for="message">Message</label>
                    <textarea id="message" name="message"></textarea>
                </div>
                <div class="table-cell">
                    <button type="submit" name="submit">Submit</button>
                </div>
                <div class="table-cell">
                    <button type="reset" name="reset">Reset</button>
                </div>
        </form>
    </div>
</div>
</div>
<?php if(isset($messages)):?>
        <?php foreach($messages as $row):?>
            <li class="mb-2">Customer <?=$row['name']?>texted this<?=$row['message']?> at: <?=date("d-m-Y", strtotime($row['created_at']))?></li>
        <?php endforeach?>
    <?php endif?>
</section>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2513.522966147932!2d0.7305390157496144!3d50.9510345795476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47df1e2309fcfebd%3A0x5cd3649a9d02bff9!2zMjUgSGlnaCBTdCwgUnllIFROMzEgN0pGLCDQktC10LvQuNC60L7QsdGA0LjRgtCw0L3QuNGP!5e0!3m2!1sru!2sua!4v1608219757665!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
<h1 class="text-dark text-uppercase font-weight-bold text-center bg-gray">FIND US</h1>
</body>
</html>
<?php require_once VIEWS."/layout/partials/site/newsletter.php"?>