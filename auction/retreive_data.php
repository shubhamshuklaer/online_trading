<?php  
            require_once "class.MySQL.php";           
            echo "hii";
            $omysql=new MySQL();
            $x=18;
            $where=array("item_id like"=>$x."%");
          $omysql->Select("items",$where);
          echo $x;
          if($omysql->records>0){
            echo "byee";
       $result=$omysql->arrayedResult;
       foreach($result as $row){
          echo "<li>";
          echo $row["item_nm"];
           echo "</li>";
    }
}
		               ?>