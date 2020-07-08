<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome Guys</h1>
    <!-- <p>Hello from View</p>
   
    //if($_SERVER['REQUEST_METHOD']==='POST'){
        //echo "Hi, " . htmlspecialchars($_POST['name']);
    //}
    ?>
    <form action="" method="post">
        <div>
            <label for="">Your Name</label>
            <input type="text" name="name">
        </div>

        <div>
            <button type="submit">SUBMIT</button>
        </div>
    </form> -->

    <p>Hello <?php echo htmlspecialchars($name);?> !</p>

    <ul>
        <?php foreach($colors as $color):?>
        <li><?php echo htmlspecialchars($color);?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>