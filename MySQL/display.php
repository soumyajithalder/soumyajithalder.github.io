<?php include("logincheck.php");?>
<?php
    include("connect.php");
    $sql="SELECT * FROM employee_details_table;";
    $sql2="SELECT * FROM employee_code_table;";
    $sql3="SELECT * FROM employee_salary_table;";
    $result=$conn->query($sql);
    $result2=$conn->query($sql2);
    $result3=$conn->query($sql3);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Details</title>
</head>

<body>
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


    <div>
        <h1>Employee Code Table</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Employee Code</th>
                    <th>Employee Code Name</th>
                    <th>Employee Domain</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result2->num_rows>0){
                        while($row2=$result2->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row2['employee_code']?></td>
                        <td><?php echo $row2['employee_code_name']?></td>
                        <td><?php echo $row2['employee_domain']?></td>
                    </tr>
                    <?php }
                    }
                ?>
            </tbody>
        </table>
    </div>

    <div>
        <h1>Employee Salary Table</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Employee Id</th>
                    <th>Employee Salary</th>
                    <th>Employee Code</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result3->num_rows>0){
                        while($row3=$result3->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row3['employee_id']?></td>
                        <td><?php echo $row3['employee_salary']?></td>
                        <td><?php echo $row3['employee_code']?></td>
                    </tr>
                    <?php }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
    <br><br><?php include("logout.php")?>
    
    
    <!--
    SELECT empdet.employee_first_name FROM employee_details_table empdet INNER JOIN employee_salary_table empsal ON empdet.employee_id = empsal.employee_id WHERE empsal.employee_salary > 50;
    
    SELECT employee_last_name FROM employee_details_table WHERE Graduation_percentile >70;
       
    SELECT empcode.employee_code_name  FROM ((employee_code_table AS empcode INNER JOIN employee_salary_table AS empsal ON empcode.employee_code = empsal.employee_code) INNER JOIN employee_details_table AS empdet ON empsal.employee_id = empdet.employee_id) WHERE empdet.Graduation_percentile < 70;
        
    SELECT empcode.employee_code_name  FROM ((employee_code_table AS empcode INNER JOIN employee_salary_table AS empsal ON empcode.employee_code = empsal.employee_code) INNER JOIN employee_details_table AS empdet ON empsal.employee_id = empsal.employee_id ) WHERE empcod.employee_domain <> 'Java';
          
    SELECT SUM(empsal.employee_salary) FROM ((employee_code_table AS empcode INNER JOIN employee_salary_table AS empsal ON empcode.employee_code = empsal.employee_code) INNER JOIN employee_details_table AS empdet ON empsal.employee_id = empdet.employee_id ) GROUP BY empcode.employee_domain;
          
    SELECT SUM(emp.salary) FROM ((employee_code_table AS empcode INNER JOIN employee_salary_table AS empsal ON empcode.employee_code = empsal.employee_code) INNER JOIN employee_details_table AS empdet ON empsal.employee_id = empdet.employee_id) GROUP BY empcode.employee_domain HAVING empsal.salary > 30000;
          
    SELECT employee_id FROM employee_salary_table WHERE employee_code IS NULL;
                           -->
</html>