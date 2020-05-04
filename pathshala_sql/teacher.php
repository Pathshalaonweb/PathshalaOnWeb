<?php
require 'config.php';
$sql = mysql_query("SELECT wl_teacher_profile.teacher_id, wl_teacher.teacher_id, wl_teacher.first_name, wl_teacher_profile.city_id, tbl_cities.name, wl_teacher_profile.category, c1.category_name as c1name, tbl_states.name as sname, c2.category_name, c3.category_name as subname
FROM wl_teacher
INNER JOIN wl_teacher_profile ON wl_teacher.teacher_id= wl_teacher_profile.teacher_id
INNER JOIN tbl_cities ON tbl_cities.id = wl_teacher_profile.city_id
INNER JOIN tbl_states ON tbl_states.id = wl_teacher_profile.state_id
INNER JOIN wl_categories as c1 ON c1.category_id = wl_teacher_profile.category
INNER JOIN wl_categories as c2 ON c2.category_id = wl_teacher_profile.class
INNER JOIN wl_categories as c3 ON c3.category_id = wl_teacher_profile.subject ORDER BY wl_teacher.teacher_id;")
or die(mysql_error());
//INNER JOIN wl_categories ON wl_categories.category_id = wl_teacher_profile.class;
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
<th>City</th>
<th>State</th>
<th>Category</th>
<th>Class</th>
<th>Subject</th>
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
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['sname']."</td>";
    echo "<td>".$row['c1name']."</td>";
    echo "<td>".$row['category_name']."</td>";
    echo "<td>".$row['subname']."</td>";
    echo "</tr>";
    $i++;

}
?>
</table>
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