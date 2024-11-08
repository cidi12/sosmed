<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="post" method="POST">
        @csrf
        <input type="text" name="post-title">
        <textarea name="post-content" id="" cols="30" rows="10"></textarea>
        <button type="submit">Post</button>
    </form>
  

</body>
</html>