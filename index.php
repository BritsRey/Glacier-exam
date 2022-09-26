<?php
    session_start();
    if(isset($_SESSION['USERID'])){
        header("Location: pages/dashboard.php");
        echo "wew";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css">
    <title>Exam</title>
</head>
<body>
    <div id="login-box" class="position-fixed w-100">
        <form method="post" class="d-block m-auto p-5 pt-0" id="formdata">
            <h1 class="text-center">LOGIN </h1>
            <div id="alert" class="alert alert-danger" role="alert">
                All input field are required
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" oninput="ininput()"placeholder="username">
                <label for="username">Please Enter Your Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" oninput="ininput()" name="password" placeholder="password">
                <label for="password">Please Enter Your Password</label>
            </div>
            <div class="d-grid gap-2 mt-3">
                <button id="submit" type="submit" class="btn btn-outline-primary btn-lg">Submit</button>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function ininput(){
            $('#alert').slideUp();
        }
        $('#formdata').submit(function(e){
            e.preventDefault();
            if($('#username').val() === "" || $('#password').val() === ""){
                $('#alert').slideDown();
                $('#alert').text('All Input Field are required!!!');
            }else{
                $.post('dataphp/login.php',{username:$('#username').val().trim(),password:$('#password').val().trim()},function(result){
                    if(result === "empty"){
                        slidedown("`"+$('#username').val().trim()+"` Not found!!!");
                    }else if(result === "failed"){
                        slidedown('Incorrect Password!!!');
                    }else{
                        slidedown("Success, Please Wait...");
                        $('#alert').attr('class','alert alert-success');
                        setTimeout(() => {
                            location.href="pages/dashboard.php";
                        }, 3000);
                    }
                });
            }
        });
        function slidedown(text){
            $('#alert').slideDown();
            $('#alert').text(text);
        }

    </script>
</body>
</html>