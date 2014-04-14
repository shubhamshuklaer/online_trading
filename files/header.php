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
                <li>
                    <form class="navbar-form navbar-right" action="search.php" method="get">
                        <input type="text"  class="form-control" placeholder="Search..." id="search_bar"  name="search_bar">
                        <input type="text" class="hidden" name="spell_bit" id="spell_bit" value="1">
                    </form>
                </li>
                <li>
                    <a href="#" class="custom_icon_link" id="spell_correction">
                    <span class="glyphicon glyphicon-check custom_navbar_icon"></span>
                    Spell Correction</a>
                </li>
                <li>
                    <a href="index.php" class="custom_icon_link">
                        <span class="glyphicon glyphicon-home custom_navbar_icon"></span>
                    </a>
                </li>

                <li>
                    <a href="profile.php" class="custom_icon_link">
                        <span class="glyphicon glyphicon-user custom_navbar_icon"></span>
                    </a>
                </li>
                <li>
                    <a href="display_cart.php" class="custom_icon_link">
                        <span id="cart_icon" class="glyphicon glyphicon-shopping-cart custom_navbar_icon"></span>
                    </a>
                </li>
                <li><a href="create_auction.php">Auction</a></li>
                <li><a href="create_sell.php">Sell</a></li>
                <li><a href="bulk_order.php">Bulk Order</a></li>
                <li>
                    <a href="#" id="notification_link" class="custom_icon_link" data-container="body" data-html="true" data-title="Notifications"  data-toggle="popover" data-placement="bottom">
                        <span class="glyphicon glyphicon-envelope custom_navbar_icon"></span>
                    </a>
                </li>

                <li>
                    <a href="help.html" class="custom_icon_link">
                        <span class="glyphicon glyphicon-question-sign custom_navbar_icon"></span>
                    </a>
                </li>
            </ul>
            
        </div>
    </div>
</div>
<!--Search suggestion.js also contain the code for colour change on hover of custom_navbar_icon-->
<!--Search_suggestion.js also contains the code for popover notification-->

<style>
.custom_navbar_icon{
    color:#aaa;
    font-size: 1.2em;
}
</style>