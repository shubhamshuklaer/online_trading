        <!-- Sidebar Start-->
          <aside class="span3">
            <div class="sidewidt">
              <h2 class="heading3"><span>Account</span></h2>
              <ul class="nav nav-pills nav-stacked">
                <li id="side_account">
                  <a href="myaccount.php" onclick="toggle_class('#side_account')"> My Account</a>
                </li>
                <li id="side_edit" onclick="toggle_class('#side_edit')">
                  <a href="edit_info.php">Edit Account</a>
                </li>
                <li id="side_cart" onclick="toggle_class('#side_cart')">
                  <a href="cart_display.php">Cart</a>
                </li>
                <li id="side_list" class="dropdown hover" onclick="toggle_class('#side_list')">
            <a class="dropdown-toggle" href="#" data-toggle="">Lists</a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li><a href="watchlist.php">Watch list</a>
              </li>
              <li><a href="wishlist.php">Wish list</a>
              </li>
            </ul>
          </li>
                <li id="side_orders" onclick="toggle_class('#side_orders')">
                  <a href="history.php">Orders</a>
                </li>
                <li id="side_items" onclick="toggle_class('#side_items')">
                  <a href="myitems.php">My Items</a>
                </li>
                <li id="side_bidding" onclick="toggle_class('#side_bidding')">
                  <a href="bidding.php">Bidding</a>
                </li>
                <li id="side_credits">
                  <a href="mycredits.php" onclick="toggle_class('#side_credits')">Credits</a>
                </li>
                <li id="side_transactions">
                  <a href="mytransactions.php" onclick="toggle_class('#side_transactions')"> Transactions</a>
                </li>
                <li id="side_recharge">
                  <a href="recharge.php" onclick="toggle_class('#side_recharge')"> Recharge</a>
                </li>
                <li id="side_logout" onclick="toggle_class('#side_logout')">
                  <a href="logout.php">Logout</a>
                </li>
              </ul>
            </div>
          </aside>
          <script type="text/javascript">
          $(".dropdown-menu").css('left','30%');
          function toggle_class(e)
          {
            $("li").removeClass("active") ;
            $(e).toggleClass("active");
          }
          </script>
        <!-- Sidebar End-->