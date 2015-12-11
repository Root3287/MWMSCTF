<?php
 function userinfo($user){
    echo '<h3 style="margin:0px 0px 20px 0px"> Game Stats for ' . $user . '</h3>';
    include 'helpers/mysqlLogin.php';
    $result = mysqli_query($conn, "SELECT * FROM scores WHERE user = '$user'");
   	$count = mysqli_num_rows($result);
    if ($count == 1) {
      $row = mysqli_fetch_array($result);
      $currentCat = "";
      $count = 0;
      $funcString = "";
      foreach ($row as $key => $value) {
        if (gettype($key) == "string" && is_numeric(substr($key, -3))) {
          if ($currentCat == substr($key, 0, -3)) {
            $funcString .= ", '" . $value . "'";
          } else if ($currentCat != "") {
            eval("printTable(" . $funcString . ");");
            $funcString = "'" . substr($key, 0, -3) . "', '" . $value . "'";
            $currentCat = substr($key, 0, -3);
          } else {
            $funcString .= "'" . substr($key, 0, -3) . "', '" . $value . "'";
            $currentCat = substr($key, 0, -3);
          }
        }
      }
      eval("printTable(" . $funcString . ");");
    } else {
      echo '<div class="alert alert-danger" role="alert"><h4>No user with that name.<h4></div>';
    }
 }

 function printTable($name, $one, $two, $three, $four, $five) {
   if ($name == 'crypto') {
     $titleName = 'Cryptography';
   } else if ($name == 'flash') {
     $titleName = 'Flash';
   } else if ($name == 'grabBag') {
     $titleName = 'Grab Bag';
   } else if ($name == 'recon') {
     $titleName = 'Reconnaissance';
   } else if ($name == 'trivia') {
     $titleName = 'Trivia';
   } else if ($name == 'web') {
     $titleName = 'Web';
   } else if($name == 'flash'){
     $titleName = 'Flash';
   } else if ($name == 'reversing') {
     $titleName = 'Reversing';
   }

   if ($one == "TRUE") {
     $one ="Complete";
     $oneTag = 'class="success"';
   } else {
     $oneTag = 'class="danger"';
     $one = "Incomplete";
   }
   if ($two == "TRUE") {
     $twoTag = 'class="success"';
     $two = "Complete";
   } else {
     $twoTag = 'class="danger"';
     $two = "Incomplete";
   }
   if ($three == "TRUE") {
     $threeTag = 'class="success"';
     $three = "Complete";
   } else {
     $threeTag = 'class="danger"';
     $three = "Incomplete";
   }
   if ($four == "TRUE") {
     $fourTag = 'class="success"';
     $four = "Complete";
   } else {
     $fourTag = 'class="danger"';
     $four = "Incomplete";
   }
   if ($five == "TRUE") {
     $fiveTag = 'class="success"';
     $five = "Complete";
   } else {
     $fiveTag = 'class="danger"';
     $five = "Incomplete";
   }
   echo '
   <div class="panel panel-default">
     <div class="panel-heading">
       <h3 class="panel-title">' . $titleName . '</h3>
     </div>
     <div class="panel-body">
       <table class="table table-bordered" id="userinfo">
         <tr>
           <th>100</th>
           <th>200</th>
           <th>300</th>
           <th>400</th>
           <th>500</th>
         </tr>
         <tr>
           <td ' . $oneTag . '>' . $one . '</td>
           <td ' . $twoTag . '>' . $two . '</td>
           <td ' . $threeTag . '>' . $three . '</td>
           <td ' . $fourTag . '>' . $four . '</td>
           <td ' . $fiveTag . '>' . $five . '</td>
         </tr>
       </table>
     </div>
   </div>
   ';
 }
?>
