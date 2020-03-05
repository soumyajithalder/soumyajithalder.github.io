<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Blog Posts</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <div class="container" style="max-width:768px">
        <form id="mainform" class="form-container" enctype="multipart/form-data" method="post">
            <h1>ADD POST</h1>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="post" id="post" rows="13" placeholder="Content"></textarea>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="userImage" id="img">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4"><input id="submit" type="submit" class="btn btn-primary" name="submit" value="Submit"></div>
                <div class="form-group col-md-4">
                    <p id="success"></p>
                    <?php if (isset($_SESSION['add'])&&($_SESSION['add'] == 1)) {?>
                    <script src="../js/add.js"></script>
                    <h6>Post Added. <a href="/index/my_post">Show Blog</a></h6>
                    <?php } unset($_SESSION['add']);
                    ?>
                </div>
                <div class="form-group col-md-4"><a href="/index/my_post" class="btn btn-primary">Go To My Post</a></div>
            </div>
        </form>
    </div>
</body>
</html>
