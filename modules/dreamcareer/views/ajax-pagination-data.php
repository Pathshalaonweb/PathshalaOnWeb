


<?php
if(is_array($res) && !empty($res)) {
	foreach($res as $val)
	{
?>
                            <table id="customers">

                                <thead>

                                <tbody>

                                    <tr>
                                        <td>Courses</td>
                                        <td>Duration</td>
                                        <td>Fee</td>
                                        <td>Study Mode</td>
                                        <td>College Name</td>
                                        <td>Exams Accepted</td>
                                        <td>Location</td>
                                        <td>ApprovedBY</td>

                                    </tr>
                                    <?php
                                    
                                    


                                            echo "<tr>";
                                            echo "<td>" . $val['courses'] . "</td>";
                                            echo "<td>" . $val['duration'] . "</td>";
                                            echo "<td>" . $val['fees'] . "</td>";
                                            echo "<td>" . $val['study_mode'] . "</td>";

                                            echo "<td>" . $val['college_name'] . "</td>";
                                            echo "<td>" . $val['exams_accepted'] . "</td>";
                                            echo "<td>" . $val['location_name'] . "</td>";
                                            echo "<td>" . $val['approved_by'] . "</td>";
                                            echo "</tr>";
                                        
                                

                                    ?>

                                </tbody>

                                </thead>
                            </table>
                            <br>
                            <br>
           
<?php } }else{?>
<div class="alert alert-warning"> <strong>Sorry !</strong> No record Found. </div>
<?php }?>
<?php echo $this->ajax_pagination->create_links(); ?> 
