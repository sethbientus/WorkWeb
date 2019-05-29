
<!DOCTYPE html>
<html>
<head>
    <title>Uploads</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap4.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
</head>
<body style="background-image: url('../images/bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6">
                <h3>Insert Activity</h3>
                <form method="POST" action="../serverSide/insert_activity.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Activity_Code</label>
                        <input type="text" name="code" class="form-control" placeholder="enter code for this activity">
                    </div>
                    <div class="form-group">
                        <label>Activity_Name</label>
                        <input type="text" name="name" class="form-control" placeholder="enter name for this activity">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" placeholder="enter some description for this activity"></textarea>
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
