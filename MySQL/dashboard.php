<?php include("logincheck.php");?>
<?php
    include("connect.php");
    if(isset($_POST['submit']) && !empty($_POST['submit'])){
        
        $employee_first_name=$_POST['employee_first_name'];
        $employee_last_name=$_POST['employee_last_name'];
        $employee_domain=$_POST['employee_domain'];
        $Graduation_percentile=$_POST['Graduation_percentile'];
        $employee_salary=$_POST['employee_salary'];
        $employee_code_name=$_POST['employee_code_name'];
        $employee_code=$_POST['employee_code'];
        
        $sql="INSERT INTO employee_details_table (employee_first_name,employee_last_name,Graduation_percentile) VALUES('".$employee_first_name."','".$employee_last_name."','".$Graduation_percentile."');";
        $sql .="INSERT INTO employee_code_table (employee_code,employee_code_name,employee_domain) VALUES((SELECT CONCAT ('su_',employee_first_name) FROM employee_details_table ORDER BY employee_id DESC LIMIT 1),'".$employee_code_name."','".$employee_domain."');";
        $sql .="INSERT INTO employee_salary_table (employee_id,employee_salary,employee_code) VALUES ((SELECT CONCAT (prefix,employee_id) FROM employee_details_table ORDER BY employee_id DESC LIMIT 1),'".$employee_salary."',(SELECT CONCAT ('su_',employee_first_name) FROM employee_details_table ORDER BY employee_id DESC LIMIT 1));";
        //echo $sql; exit;
        
        if($conn->multi_query($sql))
        {
            $success="Insert Successful";
        }
        else
        {
            $error="Insertion Not Sucessful";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>

<body>
    Welcome!<strong> <?php echo $_SESSION['user']['username'] ?> . </strong> This is your Dashboard.
    <h2>Fill Employee Details</h2>
    <form action="" enctype="multipart/form-data" method="post">
        <label>Employee First Name: </label>
        <input type="text" name="employee_first_name">
        <label>Employee Last Name: </label>
        <input type="text" name="employee_last_name">
        <br><br><label>Employee Domain: </label>
        <input type="text" name="employee_domain">
        <label>Graduation Percentage: </label>
        <input type="text" name="Graduation_percentile">
        <br><br><label>Employee Salary: </label>
        <input type="text" name="employee_salary">
        <label>Employee Code Name: </label>
        <input type="text" name="employee_code_name">
        <br><br>
            <?php if(isset($error) && !empty($error)) { ?>
                <strong><?php echo $error; ?></strong>
            <?php } elseif(isset($success)&& !empty($success)){ ?>
                <strong><?php echo $success; ?></strong>
            <?php } ?>
        <br><br>
        <input type="submit" value="Submit" name="submit">
        <input type="submit" value="Display Table" name="display">
        <input type="submit" value="Queries" name="query">
        <?php if(isset($_POST['display'])){header("Location: display.php");} ?>
        <?php if(isset($_POST['query'])){header("Location: queries.php");} ?>
    </form>
</body>
    <br><br><?php include("logout.php")?>
</html>