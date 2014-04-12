<div class="navbar navbar-inverse " role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <!--the button is the button which appear when the page is resized to smaller width-->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Online Trading</a>
        </div>
        <!--the collapsable content-->
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="profile.php">Profile</a></li>
                <li>
                    <a href="display_cart.php" id="cart_link">
                        <span id="cart_icon" class="glyphicon glyphicon-shopping-cart" style="color:#aaa;font-size:1.2em"></span>
                    Cart</a>
                </li>
                <li><a href="create_auction.php">Auction</a></li>
                <li><a href="create_sell.php">Sell</a></li>
                <li><a href="bulk_order.php">Bulk Order</a></li>
            </ul>
            <form class="navbar-form navbar-right" action="search.php" method="get">
                <input type="text"  class="form-control" placeholder="Search..." id="search_bar" name="search_bar" >
            </form>
        </div>
    </div>
</div>
<!--Search suggestion.js also contain the code for colour change on hover of cart icon-->