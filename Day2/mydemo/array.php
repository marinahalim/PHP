<?php

//1- indexed array-------------------------------------
  $arr=["Marina","HAlim"];
  foreach($arr as $index=>$item){
      echo $index,$item.PHP_EOL;
  }
  echo count($arr);
  array_push($arr,"Retta");
  echo PHP_EOL;
  echo $arr[2];
  $popedElem = array_pop($arr);
  echo $popedElem.PHP_EOL;
  echo end($arr);

//2- assocative array----------------------------
  $arr2=["name"=>"Marina",
         "age"=>23,
         "gender"=>"female"];
  echo $arr2['age']; 
  foreach($arr2 as $key=>$item){
    echo "<h4>{$key}:{$item}</h4>";
  }   
  $arr2["address"]="assiut";  
  var_dump($arr2); 

  $name="Marina";
  $age=23;
  // convert to accosiative array (compact)
  $myinfo=compact('name','age');
  var_dump($myinfo).PHP_EOL;
  array_push($myinfo,'asssiut');
  var_dump($myinfo).PHP_EOL;

  $arr3=[4,6,8];
  $arr3[10]="OS";
  var_dump($arr3);

  //diffrence between equal and identical
  
  /*$first=["name"=>"Marina","age"=>23];
    $second=["age"=>23,"name"=>"Marina"];
    var_dump($first==$second);  //true
    var_dump($first===$second); /false
    */

  /*$first=["MArina","reta"];
    $second=["reta","MArina"];
    var_dump($first==$second);  //false
    var_dump($first===$second); //false
  */
  //Multi-dim array
  /*
  $students=array(
    1=>["Marina","OS"],
    2=>["Reta","IT"]
  );
   echo $students[2][1];
   */
  









?>