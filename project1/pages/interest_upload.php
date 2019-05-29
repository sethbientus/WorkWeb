
<!DOCTYPE html>
<html>
<?php
    require '../common/classes/ActivitiesHandler.php';
    $activity = new ActivitiesHandler();
    $rows = $activity->get_Activity();
?>
<head>
    <title>Uploads</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap4.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
</head>
<body style="background-image: url('../images/bg.png');">
    <div class="container">
        <div class="row row-centered">
            <div class=" col-lg-4 col-lg-offset-2">
                <h3>Insert Activity Interest</h3>
                <form method="POST" action="../serverSide/insert_interest.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Interest Name</label>
                        <input type="text" name="name" class="form-control" placeholder="enter activity interest name">
                    </div>
                    
                    <div class="form-group">
                        <label>Select Activity type</label>
                        <select class="form-control" name="activity_code">
                            <option disabled selected>Select activity type</option>
                            <?php
                                foreach ($rows as $key) {
                                    echo "<option value=".$key['activity_code'].">";
                                    echo $key['activity_name'];
                                    echo "</option>";
                                }
                            ?>
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" placeholder="enter some description for this interest"></textarea>
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
