<?php include("logincheck.php");?>
<?php
    include("connect.php");
    $result=$conn->query($sql);
    $result2=$conn->query($sql2);
    $result3=$conn->query($sql3);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Queries</title>
</head>
<body>
    <div>
        <ul>
            <li>WAQ to list all employee first name with salary greater than 50k.</li>
            <li>WAQ to list all employee last name with graduation percentile greater than 70%</li>
            <li>WAQ to list all employee code name with graduation percentile less than 70%.</li>
            <li>WAQ to list all employee’s full name that are not of domain Java.</li>
            <li>WAQ to list all employee_domain with sum of it's salary.</li>
            <li>Write the above query again but dont include salaries which is less than 30k.</li>
            <li>WAQ to list all employee id which has not been assigned employee code.</li>
        </ul>
    </div>
    <div>
        <h1>Employee Details Table</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Employee Id</th>
                    <th>Employee First Name</th>
                    <th>Employee Last Name</th>
                    <th>Graduation Percentile</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row['employee_id']?></td>
                        <td><?php echo $row['employee_first_name']?></td>
                        <td><?php echo $row['employee_last_name']?></td>
                        <td><?php echo $row['Graduation_percentile']?></td>
                    </tr>
                    <?php }
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>