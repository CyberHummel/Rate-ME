<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create RateME Post</title>
    <link rel="stylesheet" href="home.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c5f3357375.js" crossorigin="anonymous"></script>
</head>
<body class="backround" style="height: 500px;">
<div class="container rounded shadow mb-3 bg-light text" style="height: 100%; width: 50%;">
    <h1>Create new RateME Post</h1>
    <div class="container rounded shadow mb-4 bg-light">
        <form action="create_post.php" method="POST">
            <label for="Healdline">Headline:</label><br>
            <input type="text" id="Healdline" name="Healdline"><br><br>

            <label for="Description">Description:</label><br>
            <textarea id="Description" name="Description" rows="4" cols="50"></textarea><br><br>

            <label for="image">Upload Image:</label><br>
            <input type="file" id="image" name="image" class="btn btn-dark"><br><br>


            <input type="submit" value="Create Post" class="btn btn-dark mb-4">
        </form>
    </div>


    </div>

</body>
</html>