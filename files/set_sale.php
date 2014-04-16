<?php  
            require_once "class.MySQL.php";           
            $test = new MySQL(); 
            $sale_type="sale";
            $type="sale";
            if(isset($_POST["base_price_1"]) && isset($_POST['type_1']) && isset($_POST['condition_1']) && isset($_POST['name_1']) && isset($_POST['description_1']) && isset($_POST['mrp_1']) && isset($_POST['model_1']) && isset($_POST['brand_1']) && isset($_POST['quantity_1']))
            {
             echo "electronics";
            session_start();

                    $allowedExts = array("gif", "jpeg", "jpg", "png");
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $extension = end($temp);    
                    if ((($_FILES["file"]["type"] == "image/gif")       
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/jpg")
                    || ($_FILES["file"]["type"] == "image/pjpeg")
                    || ($_FILES["file"]["type"] == "image/x-png")
                    || ($_FILES["file"]["type"] == "image/png"))
                    && in_array($extension, $allowedExts))  
                {
                        if ($_FILES["file"]["error"] > 0)
                            {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                            }
                        else
                            {
                                echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

                            if (file_exists("../upload/" . $_FILES["file"]["name"]))
                                {
                                    echo $_FILES["file"]["name"] . " already exists. ";
                                }
                            else
                                {
                                $count = new MySQL();
                                $x = $count->Select("items","","item_id DESC","1");
                                echo $count->records;
                    
                                $pic_loc= $x[0]["item_id"]+1;
                                $_FILES["file"]["name"] =$pic_loc.".jpg";
                                move_uploaded_file($_FILES["file"]["tmp_name"],
                                "../upload/" . $_FILES["file"]["name"]);
                                echo "Stored in: " . "../upload/" . $_FILES["file"]["name"];
                
                        $_SESSION["user_nm"]="shubahm";// remove and for getting username use $_SERVER["user_nm"]
                        $category1= "electronics";
                        $type_1 = $_POST['type_1'];
                        $name = $_POST['name_1'];
                        $brand = $_POST['brand_1'];
                        $model = $_POST['model_1'];
                        $mrp=$_POST['mrp_1'];
                        $quantity=$_POST['quantity_1'];
                        $condition = $_POST['condition_1'];
                        $description = $_POST['description_1'];
                        $base_price = $_POST['base_price_1'];
                        $category=$category1.":".$type_1;
                        
            $vars = array('quantity'=>$quantity,'pic_loc'=>$_FILES["file"]["name"],'item_nm'=>$name,'cost'=>$mrp,'item_condition'=>$condition,'description'=>$description,'type'=>$type,'category'=>$category,'sale_type'=>$sale_type);
            $test->Insert($vars,"items");

            // echo $test->lastQuery;
                       echo "Thank u";
$passed_item_description=$description;
                         $passed_item_nm=$name;
                         include_once "../files/insert_search_index.php";

                                }
                            }
                }
                    else
                    {
                    echo "Invalid file";
                    }

            }

                       else if(isset($_POST["type_2"]) && isset($_POST['name_2']) && isset($_POST['author_2']) && isset($_POST['condition_2']) && isset($_POST['mrp_2']) && isset($_POST['description_2']) && isset($_POST['base_price_2'])  )
                       {
                        session_start();
                         $allowedExts = array("gif", "jpeg", "jpg", "png");
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $extension = end($temp);    
                    if ((($_FILES["file"]["type"] == "image/gif")       
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/jpg")
                    || ($_FILES["file"]["type"] == "image/pjpeg")
                    || ($_FILES["file"]["type"] == "image/x-png")
                    || ($_FILES["file"]["type"] == "image/png"))
                    && in_array($extension, $allowedExts))  
                {
                        if ($_FILES["file"]["error"] > 0)
                            {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                            }
                        else
                            {
                                echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

                            if (file_exists("../upload/" . $_FILES["file"]["name"]))
                                {
                                    echo $_FILES["file"]["name"] . " already exists. ";
                                }
                            else
                                {
                                $count = new MySQL();
                                $x = $count->Select("items","","item_id DESC","1");
                                $pic_loc=$x[0]["item_id"]+1;
                                $_FILES["file"]["name"] =$pic_loc.".jpg";
                                move_uploaded_file($_FILES["file"]["tmp_name"],
                                "../upload/" . $_FILES["file"]["name"]);
                                echo "Stored in: " . "../upload/" . $_FILES["file"]["name"];
                
                            // echo $test->lastQuery;
                            
                        $_SESSION["user_nm"]="shubahm";// remove and for getting username use $_SERVER["user_nm"]
                        $category1 = "books";
                        $name = $_POST['name_2'];
                        $author = $_POST['author_2'];
                        $mrp=$_POST['mrp_2'];
                        $genre=$_POST['type_2'];
                        //$quantity=$_POST['quantity'];
                        $condition = $_POST['condition_2'];
                        $description = $_POST['description_2'];
                        $base_price = $_POST['base_price_2'];
                        $category=$category1.":".$type_1;
                        $vars = array('author_nm'=>$author,'pic_loc'=>$_FILES["file"]["name"],'item_nm'=>$name,'cost'=>$mrp,'item_condition'=>$condition,'description'=>$description,'genre'=>$genre,'category'=>$category, 'sale_type'=>$sale_type);
                        $test->Insert($vars,"items");
                        echo "wow";
                        $passed_item_description=$description;
                         $passed_item_nm=$name;
                         include_once "../files/insert_search_index.php";
                                }
                            }
                         }
                    else
                    {
                    echo "Invalid file";
                    }
                       }



                       else if(isset($_POST["type_4"]) && isset($_POST['name_4']) && isset($_POST['brand_4']) && isset($_POST['condition_4']) && isset($_POST['mrp_4']) && isset($_POST['description_4']) && isset($_POST['base_price_4']) && isset($_POST['model_4']) )
                       {
                        echo "appliances";
                        session_start();
                             $allowedExts = array("gif", "jpeg", "jpg", "png");
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $extension = end($temp);    
                    if ((($_FILES["file"]["type"] == "image/gif")       
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/jpg")
                    || ($_FILES["file"]["type"] == "image/pjpeg")
                    || ($_FILES["file"]["type"] == "image/x-png")
                    || ($_FILES["file"]["type"] == "image/png"))
                    && in_array($extension, $allowedExts))  
                {
                        if ($_FILES["file"]["error"] > 0)
                            {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                            }
                        else
                            {
                                echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

                            if (file_exists("../upload/" . $_FILES["file"]["name"]))
                                {
                                    echo $_FILES["file"]["name"] . " already exists. ";
                                }
                            else
                                {
                                $count = new MySQL();
                                $x = $count->Select("items","","item_id DESC","1");
                                $pic_loc=$x[0]["item_id"]+1;
                                $_FILES["file"]["name"] =$pic_loc.".jpg";
                                move_uploaded_file($_FILES["file"]["tmp_name"],
                                "C:/xampp/htdocs/upload/" . $_FILES["file"]["name"]);
                                echo "Stored in: " . "../upload/" . $_FILES["file"]["name"];
                
                            // echo $test->lastQuery;
                           
                        $_SESSION["user_nm"]="shubahm";// remove and for getting username use $_SERVER["user_nm"]
                        $category1 = "appliances";
                        $type_1 = $_POST['type_4'];
                        $name = $_POST['name_4'];
                        $brand = $_POST['brand_4'];
                        $mrp=$_POST['mrp_4'];
                        $model=$_POST['model_4'];
                        //$quantity=$_POST['quantity'];
                        $condition = $_POST['condition_4'];
                        $description = $_POST['description_4'];
                        $base_price = $_POST['base_price_4'];
                        $category=$category1.":".$type_1;
                        $vars = array('brand'=>$brand,'pic_loc'=>$_FILES["file"]["name"],'model'=>$model,'item_nm'=>$name,'cost'=>$mrp,'item_condition'=>$condition,'description'=>$description,'category'=>$category,'type'=>$type,'sale_type'=>$sale_type);
                        $test->Insert($vars,"items");
                        echo "wow";
                        $passed_item_description=$description;
                         $passed_item_nm=$name;
                         include_once "../files/insert_search_index.php";
                                }
                            }
                         }
                    else
                    {
                    echo "Invalid file";
                    }
                       }





                        else if(isset($_POST["type_3"]) && isset($_POST['name_3']) && isset($_POST['brand_3']) && isset($_POST['condition_3']) && isset($_POST['mrp_3']) && isset($_POST['description_3']) && isset($_POST['base_price_3']) && isset($_POST['model_3']) )
                        {
                         echo "stationary";
                        session_start();
                          $allowedExts = array("gif", "jpeg", "jpg", "png");
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $extension = end($temp);    
                    if ((($_FILES["file"]["type"] == "image/gif")       
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/jpg")
                    || ($_FILES["file"]["type"] == "image/pjpeg")
                    || ($_FILES["file"]["type"] == "image/x-png")
                    || ($_FILES["file"]["type"] == "image/png"))
                    && in_array($extension, $allowedExts))  
                {
                        if ($_FILES["file"]["error"] > 0)
                            {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                            }
                        else
                            {
                                echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

                            if (file_exists("../upload/" . $_FILES["file"]["name"]))
                                {
                                    echo $_FILES["file"]["name"] . " already exists. ";
                                }
                            else
                                {
                                $count = new MySQL();
                                $x = $count->Select("items","","item_id DESC","1");
                                $pic_loc=$x[0]["item_id"]+1;
                                $_FILES["file"]["name"] =$pic_loc.".jpg";
                                move_uploaded_file($_FILES["file"]["tmp_name"],
                                "../upload/" . $_FILES["file"]["name"]);
                                echo "Stored in: " . "../upload/" . $_FILES["file"]["name"];
                
                            // echo $test->lastQuery;
                           
                        
                        $_SESSION["user_nm"]="shubahm";// remove and for getting username use $_SERVER["user_nm"]
                        $category1 = "stationary";
                        $type_1 = $_POST['type_3'];
                        $name = $_POST['name_3'];
                        $brand = $_POST['brand_3'];
                        $mrp=$_POST['mrp_3'];
                        $model=$_POST['model_3'];
                        //$quantity=$_POST['quantity'];
                        $condition = $_POST['condition_3'];
                        $description = $_POST['description_3'];
                        $base_price = $_POST['base_price_3'];
                        $category=$category1.":".$type_1;
                        $vars = array('brand'=>$brand,'pic_loc'=>$_FILES["file"]["name"],'model'=>$model,'item_nm'=>$name,'cost'=>$mrp,'item_condition'=>$condition,'description'=>$description,'category'=>$category,'type'=>$type,'sale_type'=>$sale_type);
                        $test->Insert($vars,"items");
                        $passed_item_description=$description;
                         $passed_item_nm=$name;
                         include_once "../files/insert_search_index.php";
                                }
                            }
                         }
                    else
                    {
                    echo "Invalid file";
    
                       }
                    }



                    else if(isset($_POST['name_5']) && isset($_POST['brand_5']) && isset($_POST['condition_5']) && isset($_POST['mrp_5']) && isset($_POST['description_5']) && isset($_POST['base_price_5'])  && isset($_POST['model_5']))
                        {
                         echo "others";
                        session_start();
                          $allowedExts = array("gif", "jpeg", "jpg", "png");
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $extension = end($temp);    
                    if ((($_FILES["file"]["type"] == "image/gif")       
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/jpg")
                    || ($_FILES["file"]["type"] == "image/pjpeg")
                    || ($_FILES["file"]["type"] == "image/x-png")
                    || ($_FILES["file"]["type"] == "image/png"))
                    && in_array($extension, $allowedExts))  
                {
                        if ($_FILES["file"]["error"] > 0)
                            {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                            }
                        else
                            {
                                echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

                            if (file_exists("../upload/" . $_FILES["file"]["name"]))
                                {
                                    echo $_FILES["file"]["name"] . " already exists. ";
                                }
                            else
                                {
                                $count = new MySQL();
                                $x = $count->Select("items","","item_id DESC","1");
                                $pic_loc=$x[0]["item_id"]+1;
                                $_FILES["file"]["name"] =$pic_loc.".jpg";
                                move_uploaded_file($_FILES["file"]["tmp_name"],
                                "../upload/" . $_FILES["file"]["name"]);
                                echo "Stored in: " . "../upload/" . $_FILES["file"]["name"];
                
                            // echo $test->lastQuery;
                           
                         
                        $_SESSION["user_nm"]="shubahm";// remove and for getting username use $_SERVER["user_nm"]
                        $category1 = "stationary";
                        
                        $name = $_POST['name_5'];
                        $brand = $_POST['brand_5'];
                        $mrp=$_POST['mrp_5'];
                        $model=$_POST['model_5'];
                        //$quantity=$_POST['quantity'];
                        $condition = $_POST['condition_5'];
                        $description = $_POST['description_5'];
                        $base_price = $_POST['base_price_5'];
                        $category=$category1.":".$type_1;
                        $vars = array('brand'=>$brand,'pic_loc'=>$_FILES["file"]["name"],'model'=>$model,'item_nm'=>$name,'cost'=>$mrp,'item_condition'=>$condition,'description'=>$description,'category'=>$category,'sale_type'=>$sale_type);
                        $test->Insert($vars,"items");
                        $passed_item_description=$description;
                         $passed_item_nm=$name;
                         include_once "../files/insert_search_index.php";
                                }
                            }
                         }
                         ////search index part
                         
                         ///////////////////
                    else
                    {
                    echo "Invalid file";
    
                       }
                    }
                       ?>