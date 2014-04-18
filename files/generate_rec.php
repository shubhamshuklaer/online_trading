<?php
	if(!isset($_SESSION))
        session_start();
	if(isset($_SESSION["authentication"])){
		require_once "order_history_rec.php";
		require_once "search_history_rec.php";
		require_once "watchlist_rec.php";
		// require_once "trending_rec.php";
	}

?>