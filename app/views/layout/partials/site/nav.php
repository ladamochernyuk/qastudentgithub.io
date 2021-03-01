<header class="bg-white">
    <!-- navigation --> 
    <nav id="nav">
        <div class="navbar" id="navbar">
            <input type="checkbox" id="hamburger">
            <label for="hamburger"><i class="nav-toggle fas fa-bars"></i></label>
            <div class="navbar-brand">
                <span class="text-dark text-uppercase font-weight-bold">FIND YOUR BOOK</span>
            </div>
                <ul class="navbar-nav">
                    <li class="brackets"><a href="/">HOME</a></li>
                    <li class="brackets"><a href="/shop">SHOP</a></li>
                    <li class="brackets"><a href="/contact">CONTACTS</a></li>
                </ul>
                <ul class="navbar-tool">
                    <li><a href="#" class="sidebar-toggle" id="shopping-cart"><i class="fas fa-shopping-bag"></i><small class="count-items-in-cart"></small></a></li>
                    <li><a href="#"><i class="fas fa-thumbs-up"></i></a></li>
                    <?php if(isGuest()):?>
                    <li><a href="#login"><i class="fas fa-sign-in-alt"></i></a></li>
                    <?php else:?>
                        <li><a href="/profile"><i class="fas fa-adress-card"></i></a></li>
                        <li><a href="/logout"><i class="fas fa-sign-out-alt"></i></a></li>
                    <?php endif?>
                </ul>
        </div>
    </nav>
    <!-- ./navigation -->
</header>