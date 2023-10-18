<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .test2{
            display:none;
            border:1px solid black;
            padding:2rem;
            border-radius:20px;

        }
        .show{
            display:flex;
        }

    </style>
</head>
<body>
    <h1>Test test</h1>

    <div class="text1">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, voluptate?</p>
        <div class="test2">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim modi repudiandae nam unde sapiente sunt alias veritatis vero animi reprehenderit.
  </div>
        <button class="showbtn" id="showbtn">test</button>
    </div>

  <script>
    const showBtn = document.getElementById('showbtn');
    const test2 = document.querySelector('.test2');
    showbtn.addEventListener('click',()=>{
 test2.classList.toggle('show');

});

  </script>

</body>
</html>