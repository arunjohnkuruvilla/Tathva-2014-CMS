<?php
$query="SELECT username, password, eventcode, validate, roll FROM users";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();
if (!$row)
    echo "Waiting for first contact!";
  else 
  {
    echo '
      <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;}
        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
        .tg .tg-glis{font-size:10px}
      </style>
      <table class="tg" style="undefined;table-layout: fixed; width: 925px">
      <colgroup>
        <col style="width: 152px">
          <col style="width: 152px">
          <col style="width: 152px">
          <col style="width: 102px">
          <col style="width: 102px">
          <col style="width: 102px">
          <col style="width: 163px">
      </colgroup>
      <thead>USERS
        <tr>
          <th>ROLLNUMBER</th>
          <th>Username</th> 
          <th>Password</th> 
          <th>Eventcode</th> 
          <th>Validation</th> 
          <th>Delete</th> 
          <th>Validation Status</th> 
        </tr>
      </thead>';
    do {
  $u = $row['username'];
  $x = "exec.php?u=$u";
  $v = "<a href='$x&a=";
  $v .= ($row['validate'] == 0) ? "val'>Validate" : "inv'>Invalidate";
  $v .= "</a>";
  echo "
  <tr>
    <th class='tg-glis'>$row[roll]</th>
    <th class='tg-glis'>$u</th>
    <th class='tg-glis'>$row[password]</th>
    <th class='tg-glis'>$row[eventcode]</th>
    <th class='tg-glis'>$v</th>
    <th class='tg-glis'><a href='$x&a=del'>Delete</a></th>
    <th class='tg-glis' style='text-align:center'>$row[validate]</th>
  </tr>";
    } while($row=$result->fetch_array());
  }
    ?></table>