<aside class="aside">
    <div class="cart">
        <div class="cart-header">
            <button class="close-btn"><i class="fas fa-times"></i></button>

        <h2 class="logo">Your Shopping Cart</h2>
    
        </div>
        <div class="cart-items">
        </div>
          
        <div class="cart-footer">
            <h3>Your Total: $<span class="cart-total">0</span></h3>
            <div class="btn-group" role="group">
            <button class="btn btn-outline-warning">Clear Cart</button>
            <?php if(isGuest()):?>
            <a href="/#login">
            <button class="btn btn-outline-warning">You should log in</button></a>
            <?php else:?>
            <button class="checkout btn btn-outline-success">Check out</button>
            <?php endif?>
            </div>  
        </div>
    </div>
</aside>
<aside class="single">  
</aside>