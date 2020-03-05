<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Blog Post</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <div class="container" style="max-width:768px">
        <form id="mainform" enctype="multipart/form-data" class="form-container" method="post">
            <h1>EDIT POST</h1>
            <?php foreach ($cp as $cps) : ?>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="text" name="title" class="form-control" id="title" value="<?php echo $cps['title'];?>">
                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="post" id="post" rows="13"><?php echo $cps['post'];?></textarea>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="userImage" id="img">
                </div>
            </div>
            <?php endforeach ?>
            <div class="form-row">
                <div class="form-group col-md-4"><input id="update" type="submit" class="btn btn-primary" name="update" value="Update"></div>
                <div class="form-group col-md-4">
                    <p id="success"></p>
                    <?php if (isset($_SESSION['edit'])&&($_SESSION['edit'] == 1)) {?>
                    <script src="../js/edit.js"></script>
                    <h6>Post Updated. <a href="/index/my_post">Show Blog</a></h6>
                    <?php } unset($_SESSION['edit']);
                    ?>
                </div>
                <div class="form-group col-md-4"><a href="/index/my_post" class="btn btn-primary">Go To My Post</a></div>
            </div>
        </form>
    </div>
</body>
</html>
