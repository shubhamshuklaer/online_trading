<?php session_start();?>
<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
    <link rel="stylesheet" type="text/css" href="../css/smoothness/jquery-ui.css">
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
            <a href="index.php" class="navbar-brand custom_icon_link">
                <span class="glyphicon glyphicon-home custom_navbar_icon"></span>
            Online Trading</a>
        </div>
        <!--the collapsable content-->
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form navbar-right" action="search.php" method="get">
                        <input type="text"  class="form-control" placeholder="Search..." id="search_bar"  name="search_bar">
                    </form>
                </li>

                <li>
                    <?php if(isset($_SESSION["user_nm"])){?>
                    <a href="myaccount.php" class="custom_icon_link">
                        <span class="glyphicon glyphicon-user custom_navbar_icon"></span>
                    <?php echo $_SESSION["user_nm"];?></a>
                    <?php }else{?>
                    <a href="login.php" class="custom_icon_link">
                        <span class="glyphicon glyphicon-user custom_navbar_icon"></span>
                    Login</a>
                    <?php }?>
                </li>
                <li>
                    <a href="cart_display.php" class="custom_icon_link">
                        <span id="cart_icon" class="glyphicon glyphicon-shopping-cart custom_navbar_icon"></span>
                    </a>
                </li>
                <li><a href="temporary_template.php">Auction</a></li>
                <li><a href="temporary_template.php">Sell</a></li>
                <li><a href="template_bulk.php">Bulk Order</a></li>
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


<script src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="../js/custom/search_suggestions.js"></script>