<!DOCTYPE html>
<?php require_once "class.MySQL.php";?>
<!-- Do not edit this file, copy the code to use it in your module-->
<html>
<head>
	<meta charset="utf-8">
    <title>Checkout</title>
	<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
	<link rel="stylesheet" type="text/css" href="../css/smoothness/jquery-ui.css">

</head>
<body>
    <?php
        //session_start();
        $username = $_SESSION['user_nm'];
        $omysql=new MySQL();
        $where=array("user_nm like"=>$username);
        $col="address";
        $limit="";
        $orderBy="";
        $omysql->Select("user",$where,$orderBy,$limit,$col);
        $res1=$omysql->arrayedResult;
        //echo $res1[0]["address"];

        $where=array("user_nm like"=>$username);
        $from = "cart";
        $omysql->Select($from, $where);
        $rows = $omysql->records;
        $res2 = $omysql->arrayedResult;
        //$_SESSION['address']="$&@DEFAULT@&$";
        $grandtot=0;
      /*  if(!session_start())
            session_start();*/
     ?>
	<div class="container-fluid">
		<div class="row" role="header">
			<?php include_once "header.php";?>
		</div>

		<div class="container">
			<div class="container-fluid col-sm-7 col-md-7 ">
                <br><br><br>
                <form name="form1" action="pay.php" method="get" id="form1">
			   <table class="table table-striped">
			       <tbody>
			       <tr>
			           <td><b>DELIVERY ADDRESS</b></td>
			           <td><small>Select an address</small></td>
			           <td><small><a href="delivery_address.php">Choose a new address</a></small></td>
			       </tr>
			       <tr>
			           <td>
			               <input type="radio" value="old address" checked="" name="address-selector"></input>
			               <b><small><?php echo "&nbsp&nbsp".$username ?></small></b><br>

                            <small><?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                                if($_SESSION['address']=="$&@DEFAULT@&$"){
                                    echo"<small>Default Address</small>";
                                }
                                else
                                    echo"<small>New Address</small>";
                                ?>
			           </td>

                        <td>
                            <?php
                                 if($_SESSION['address']=="$&@DEFAULT@&$"){
                                        $o_address=$res1[0]["address"];
                                        echo $res1[0]["address"];
                                 }
                                 else{
                                    $o_address=$_SESSION["address"];
                                    echo $_SESSION['address'];
                                }
                            ?>
                        </td>
                        <td></td>
			       </tr>
			       </tbody>
			   </table>
			   <br><br>
                        <?php
                            $i = 0;
                            //$total=0;
                            //$tax = 0;
                           // $grandtot = 0;
                            $from = "items";
                            if($rows>0){?>
                                <table class="table table-striped">
                                <tr>
                                    <td><b>Choose Delivery Type</b></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <?php
                                while($i<$rows)
                                {
                                    $item_id = $res2[$i]["item_id"];
                                    $where = array("item_id like"=>$item_id);
                                    $omysql->Select($from, $where);
                                    $res3 = $omysql->arrayedResult;
                                if($res3[0]["quantity"]>=$res2[$i]["qty"]){
                                    $total = $res2[$i]["qty"]*$res3[0]["cost"];
                                   // $grandtot+=$total;
                                    $tax = (($res3[0]["tax"]/100)*$total);
                                    //$grandtot+=$tax;
                                    $pic_loc = constant("HOSTNAME")."/upload/".$res3[0]["pic_loc"];
                                    if($omysql->records > 0)
                                    {

                                    echo "<tr>
                                    <td>
                                    <img src=".'"'.$pic_loc.'"'." width=".'"60"'."height=".'"60"'.">
                                    </td>
                                    <td><a href=".'"sale.php?item_id='.$item_id.'"'.">".$res3[0]["item_nm"]."</td>
                                    <td>";
                                        $str = strval($item_id)."Delivery_Type";
                                        if(trim($res3[0]["delivery_type"])=='instant')
                                        {?>

                                                <input type="radio" name=<?php echo $str;?> value="Instant" checked="">&nbsp;&nbsp;<small> Instant Delivery</small><br></input>
                                                <input type="radio" name=<?php echo $str;?> value="Normal">&nbsp;&nbsp;<small> Normal Delivery</small></input>

                                                <?php
                                        }
                                        elseif(trim($res3[0]["delivery_type"])=='normal')
                                        {?>
                                                <input type="radio" name=<?php echo $str;?> value="Normal" checked="">&nbsp;&nbsp;<small> Normal Delivery</small></input>
                                                 <br> <small>Instant delivery not Available</small>
                                       <?php }
                                        //Storing the values in the array

                                   }
                                    echo "<br><br>";
                                }
                                $i++;
                             } ?>
                        </tr>

                </table>
                <!--for the button-->

                <div class = "fr ralign" align="right">

                    <button class="btn btn-warning" type="button" onclick="mconfirm();" name="confirm" id="confirm">Confirm Order</button>

                </form>
                 </div>
                <?php
                }
                else
                {?>
                    <p><b><small>No Items to display</small></b>
                <?php } ?>

			   </div>
            <!------------------------------------------Cart summary ----------------------------------------------------------------------------------------->
                 <br><br><br>
                <?php if($rows>0){ ?>
			   	<div class ="well col-sm-5 col-lg-5">

                    <div class="row" align="center">
                    <b>CART SUMMARY</b>
                    </div>
                <table class="table table striped">
                <tbody>
                <?php
                            $i = 0;
                            $total=0;
                            $tax = 0;
                            $grandtot = 0;
                            $from = "items";

                                while($i<$rows)
                                {
                                    $item_id = $res2[$i]["item_id"];
                                    $where = array("item_id like"=>$item_id);
                                    $omysql->Select($from, $where);
                                    $res3 = $omysql->arrayedResult;
                                    if($res3[0]["quantity"]>=$res2[$i]["qty"]){
                                        $total = $res2[$i]["qty"]*$res3[0]["cost"];
                                        $grandtot+=$total;
                                        $tax = (($res3[0]["tax"]/100)*$total);
                                        $grandtot+=$tax;
                                        $pic_loc = constant("HOSTNAME")."/upload/".$res3[0]["pic_loc"];
                                        if($omysql->records > 0)
                                        {
                                            echo "<tr>
                                            <td><br>
                                            <img src=".'"'.$pic_loc.'"'." width=".'"50"'."height=".'"50"'.">
                                            </td>
                                            <td>
                                            <h4><a href=".'"sale.php?item_id='.$item_id.'"'."><small>".$res3[0]["item_nm"]."</small></a></h4>"
                                                                                    ."\n"."<small>Item price: ₹".$res3[0]["cost"]
                                                ."<br>"."Condition: ".$res3[0]["item_condition"]."
                                            </small></td>
                                            <td><small>
                                            Qty:".$res2[$i]["qty"]."
                                            </small>
                                            </td>
                                            <td> &nbsp;&nbsp;₹".$total."<br><small>+₹".$tax."</small></td>
                                            </tr>";
                                           /* echo "<tr><td></td><td></td><td></td>
                                            <td>
                                            <font size=".'"2"'." align=".'"right"'.">
                                            ";*/
                                        }
                                    }
                                    $i++;
                                }
                                echo"<tr><td></td><td></td><td></td>
                                <td><font style=".'"Comic Sans MS"'." size=".'"4"'." align=".'"right"'.">
                                Total: ₹".$grandtot."
                                </font></td></tr>
                                ";
                            }


                             ?>
                            </tbody>
                            </table>
                            <hr size=10></hr>

			</div>

		</div>
	</div>

	<!--All javascript placed at the end so that the page loads faster-->
    <script src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/custom/search_suggestions.js"></script>
	<script type="text/javascript">
            function mconfirm(){
                var c=confirm("Are you sure you want to confirm?");
                if(c){
                    document.form1.submit();
                }
            }
    </script>
</body>
</html>
<?php
//include_once "pay.php";
//include_once "invoice.php" ?>

