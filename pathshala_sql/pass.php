<?php
require 'config.php';
$sql = mysql_query("SELECT wl_teacher_profile.teacher_id, wl_teacher.teacher_id, wl_teacher.first_name, wl_teacher.user_name as email, wl_teacher.password, wl_teacher.phone_number as contact
FROM wl_teacher
INNER JOIN wl_teacher_profile ON wl_teacher.teacher_id= wl_teacher_profile.teacher_id ORDER BY wl_teacher.teacher_id;")
or die(mysql_error());
?>

<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<table id="customers">
<tr>
<th>S.No.</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Password</th>
</tr>
<?php
$i=1;
// $row=mysql_fetch_array($sql)or die(mysql_error());
// echo print_r($row);
while($row=mysql_fetch_array($sql))
{
    echo "<tr>";
    echo "<td>".$i."</td>";
    echo "<td>".$row['first_name']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['contact']."</td>";
    echo "<td>".$row['password']."</td>";
    echo "</tr>";
    $i++;

}
?>
</table>
<br>
<script>
function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>
<button onclick="exportTableToExcel('customers')">Export Table Data To Excel File</button>
</html>