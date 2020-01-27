<?php include("logincheck.php");?>
<?php
    include("connect.php");
    $s1="SELECT empdet.employee_first_name FROM employee_details_table empdet INNER JOIN employee_salary_table empsal ON CONCAT(empdet.prefix,empdet.employee_id) = empsal.employee_id WHERE empsal.employee_salary > 50000;";

    $s2="SELECT employee_last_name FROM employee_details_table WHERE Graduation_percentile >70;";

    $s3="SELECT empcode.employee_code_name  FROM ((employee_code_table AS empcode INNER JOIN employee_salary_table AS empsal ON empcode.employee_code = empsal.employee_code) INNER JOIN employee_details_table AS empdet ON empsal.employee_id = CONCAT(empdet.prefix,empdet.employee_id)) WHERE empdet.Graduation_percentile < 70;";

    $s4="SELECT DISTINCT empcode.employee_code_name  FROM ((employee_code_table AS empcode INNER JOIN employee_salary_table AS empsal ON empcode.employee_code = empsal.employee_code) INNER JOIN employee_details_table AS empdet ON empsal.employee_id = empsal.employee_id ) WHERE empcode.employee_domain <> 'Java';";

    $s5="SELECT empcode.employee_domain,SUM(empsal.employee_salary) as employee_salary FROM (employee_code_table AS empcode INNER JOIN employee_salary_table AS empsal ON empcode.employee_code = empsal.employee_code) GROUP BY empcode.employee_domain;";

    $s6="SELECT empcode.employee_domain,SUM(empsal.employee_salary) as employee_salary FROM (employee_code_table AS empcode INNER JOIN employee_salary_table AS empsal ON empcode.employee_code = empsal.employee_code) GROUP BY empcode.employee_domain HAVING employee_salary > 30000;";

    $s7="SELECT employee_id FROM employee_salary_table WHERE employee_code IS NULL;";

    $res1=$conn->query($s1);
    $res2=$conn->query($s2);
    $res3=$conn->query($s3);
    $res4=$conn->query($s4);
    $res5=$conn->query($s5);
    $res6=$conn->query($s6);
    $res7=$conn->query($s7);
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
            <li><a href="#q1">WAQ to list all employee first name with salary greater than 50k.</a></li>
            <li><a href="#q2">WAQ to list all employee last name with graduation percentile greater than 70%</a></li>
            <li><a href="#q3">WAQ to list all employee code name with graduation percentile less than 70%.</a></li>
            <li><a href="#q4">WAQ to list all employee’s full name that are not of domain Java.</a></li>
            <li><a href="#q5">WAQ to list all employee_domain with sum of it's salary.</a></li>
            <li><a href="#q6">Write the above query again but dont include salaries which is less than 30k.</a></li>
            <li><a href="#q7">WAQ to list all employee id which has not been assigned employee code.</a></li>
        </ul>
    </div>
    <div>
    <div id="q1">
        <h1>Q1</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Employee First Name</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($res1->num_rows>0){
                        while($row=$res1->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row['employee_first_name']?></td>
                    </tr>
                    <?php }
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <div id="q2">
        <h1>Q2</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Employee Last Name</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($res2->num_rows>0){
                        while($row=$res2->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row['employee_last_name']?></td>
                    </tr>
                    <?php }
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <div id="q3">
        <h1>Q3</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Employee Code Name</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($res3->num_rows>0){
                        while($row=$res3->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row['employee_code_name']?></td>
                    </tr>
                    <?php }
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <div id="q4">
        <h1>Q4</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Employee Code Name</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($res4->num_rows>0){
                        while($row=$res4->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row['employee_code_name']?></td>
                    </tr>
                    <?php }
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <div id="q5">
        <h1>Q5</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Employee Domain</th>
                    <th>Employee Salary</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($res5->num_rows>0){
                        while($row=$res5->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row['employee_domain']?></td>
                        <td><?php echo $row['employee_salary']?></td>
                    </tr>
                    <?php }
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <div id="q6">
        <h1>Q6</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Employee Salary</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($res6->num_rows>0){
                        while($row=$res6->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row['employee_salary']?></td>
                    </tr>
                    <?php }
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <div id="q7">
        <h1>Q7</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Employee ID</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($res7->num_rows>0){
                        while($row=$res7->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row['employee_id']?></td>
                    </tr>
                    <?php }
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    </div>

</body>
<br><br><?php include("logout.php")?>
</html>