<?php
    require_once "class.MySQL.php";
    session_start();
    $today = date("Ymd");
    $order_id;
    $o_address;

    $username = $_SESSION['user_nm'];

    //if(isset($_GET["confirm"])){
                 $omysql=new MySQL();
                //echo "i am here";
                //Update stocks in items table
                //$rows=count($items);
                $items=array(array("item_id","qty","delivery"));//array for storing the item_ids
                $where=array("user_nm like"=>$username);
                $from = "cart";
                $omysql->Select($from, $where);
                $rows = $omysql->records;
                $res2 = $omysql->arrayedResult;
                $grandtot=0;
                if($rows>0)
                {
                    $from="items";
                    $j=0;
                    for($i=0;$i<$rows;$i++)
                    {
                        $item_id = $res2[$i]["item_id"];
                        $where = array("item_id like"=>$item_id);
                        $omysql->Select($from, $where);
                        $res3 = $omysql->arrayedResult;
                        //$grandtot=0;
                        if($omysql->records > 0)
                        {
                            if($res3[0]["quantity"]>=$res2[$i]["qty"]){
                                $total = $res2[$i]["qty"]*$res3[0]["cost"];
                                $grandtot+=$total;
                                $tax = (($res3[0]["tax"]/100)*$total);
                                $items[$j]['item_id']=$item_id;
                                //console.log($items[$i]['item_id']);
                                $items[$j]['qty']=$res2[$i]["qty"];
                                //console.log($items[$i]['qty']);
                                $j++;
                            }//if($res3[0]["quantity"]>=$res2[$i]["qty"])
                        }//if($omysql->records > 0)

                    }//for($i=0;$i<$rows;$i++)
                }//if($rows>0)

        //Check for enough credits
        $from = "user";
        $where = array("user_nm like"=>$username);
        $omysql->Select($from, $where);
        $res = $omysql->arrayedResult;
        $p_credit= $res[0]["credit"];
        if($p_credit>=$grandtot){
            //Update credits
            $p_diff=$p_credit-$grandtot;
            $from="user";
            $where=array("user_nm like"=>$username);
            $set=array("credit"=>$p_diff);
            $omysql->Update($from, $set, $where);
            $affect=$omysql->affected;
            if($affect>0){//when credits are updated
                if($rows>0){//if there are items in the cart
                    for($i=0;$i<$j;$i++){
                        $p_id=$items[$i]['item_id'];
                        //console.log($items[$i]['item_id']);
                        $p_qty=$items[$i]['qty'];
                        //console.log($items[$i]['qty']);
                        $from="items";
                        $where=array("item_id like"=>$p_id);
                        $omysql->Select($from,$where);
                        $res1=$omysql->arrayedResult;
                        $tot=$res1[0]["quantity"];
                        $p_diff=$tot-$p_qty;
                        //echo $tot." ".$p_qty." ".$p_diff;
                        //echo "\n";
                        $set=array("quantity"=>$p_diff);
                        $omysql->Update($from, $set, $where);

                    //delete from the cart
                        $table="cart";
                        $where=array("user_nm LIKE"=>$username,"AND item_id ="=>$p_id);
                        $omysql->Delete($table, $where);

                    //insert entry into the order table
                        $str=strval($p_id)."Delivery_Type";
                        if(isset($_GET[$str])){
                            if($_GET[$str]=='Instant')
                                $delivery= "instant";
                            else if($_GET[$str]=='Normal')
                                $delivery= "normal";
                            else
                                print "Select a radio button";
                        }
                        $p_user_nm=$username;
                        $status="Not Delivered";
                        //Order id generated
                        $today = date("Ymd");
                        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
                        $order_id = $today . $rand;
                        if($_SESSION['address']=="$&@DEFAULT@&$"){
                                $o_address=$res[0]["address"];
                        }
                        else{
                                $o_address=$_SESSION["address"];
                        }
                        $vars=array("user_nm"=>$p_user_nm,"qty"=>$p_qty,"item_id"=>$p_id,"order_id"=>$order_id,"status"=>$status,"address"=>$o_address,"delivery_type"=>$delivery);
                        $table="orders";
                        $omysql->Insert($vars,$table);
                    }

                //print $selected_radio;
                 include_once "invoice.php";
                }
            }

        }
        else{
             include_once "failure.php";
        }
   // }


    //$_SESSION['address']=="$&@DEFAULT@&$";

 ?>
