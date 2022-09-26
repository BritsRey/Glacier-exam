<?php
    session_start();
    if(!isset($_SESSION['USERID'])){
        header("Location: ../index.php");
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
    <script src="https://kit.fontawesome.com/b1e8580cbb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/index.css">
    <title>Document</title>
</head>
<body>
    <div id="navbar"class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link active" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                Dashboard
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="../logout.php" class="btn btn-outline-light"><i class="fa-solid fa-door-open"></i></a>
        </div>
    </div>
    <div class="grid">
        <div><!-- Empty field --></div>
        <div class="p-5">
            <div class="input-group input-group-md px-5 py-3">
                <span class="input-group-text" id="inputGroup-sizing-lg">Search</span>
                <input type="text" id="search" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" oninput="ininput()">
                <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#addmodal">Add New Record</button>
            </div>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Company</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tabledata">
                    <!-- table data -->
                </tbody>
            </table>
        </div>
    </div>
    <?php require_once('../utility/modal.php');?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var search = "",id;
        getalldata();
        function getalldata(){
            if(search == ""){
                $.post('../dataphp/userdata.php',{getalldata:true},
                function(result){
                    refresh(result);
                });
            }else{
                $.post('../dataphp/userdata.php',{searchdata:search},
                function(result){
                    refresh(result);
                });
            }
        }




        // update
        $('body').on('click','i[id=updatebtn]',function(){
            id = $(this).attr('target');
            $.post('../dataphp/userdata.php',{getdata:id},
            function(result){
                var obj = JSON.parse(result);
                if(Object.keys(obj.data).length >0){
                    $('#name').val(obj.data[0].NAME);
                    $('#position').val(obj.data[0].POSITION);
                    $('#email').val(obj.data[0].EMAIL);
                    $('#address').val(obj.data[0].ADDRESS);
                    $('#company').val(obj.data[0].COMPANY);
                }
            })
        });
        $('#updatedata').submit(function(e){
            e.preventDefault();
            if($('#name').val().trim() == "" || $('#position').val().trim() == "" || $('#email').val().trim() == "" || $('#address').val().trim() == "" || $('#company').val().trim() == ""){
                $('#alert:first').text("All input field are required!!!");
                $('#alert:first').slideDown();
            }else{
                $.post('../dataphp/userdata.php',{updateid:id,name:$('#name').val().trim(),position:$('#position').val().trim(),email:$('#email').val().trim(),address:$('#address').val().trim(),company:$('#company').val().trim()},function(result){
                    if(result == "success"){
                        hidemodal();
                    }else{
                        $('#alert:first').slideDown();
                        $('#alert:first').text("Something Went Wrong!!!");
                    }
                });
            }
        });




        //delete 
        $('body').on('click','i[id=deletebtn]',function(){
            id = $(this).attr('target');    
        });
        $('#agreedel').click(()=>{
            $.post('../dataphp/userdata.php',{deleteid:id},
            function(result){
                console.log(result);
                if(result == "success"){
                    hidemodal();
                }
            });
        });

        // add
        $('#adddata').submit(function(e){
            e.preventDefault();
            if($('#aname').val().trim() == "" || $('#ausername').val().trim() == "" || $('#apassword').val().trim() == "" || $('#aposition').val().trim() == "" || $('#aemail').val().trim() == "" || $('#aaddress').val().trim() == "" || $('#acompany').val().trim() == ""){
                $('#alert1').text("All input field are required!!!");
                $('#alert1').slideDown();
            }else{
                $.post('../dataphp/userdata.php',{aname:$('#aname').val().trim(),ausername:$('#ausername').val().trim(),apassword:$('#apassword').val().trim(),aposition:$('#aposition').val().trim(),aemail:$('#aemail').val().trim(),aaddress:$('#aaddress').val().trim(),acompany:$('#acompany').val().trim(),},
                function(result){
                    if(result == "success"){
                        hidemodal();
                    }else if(result == "failed"){
                        $('#alert1').text("Something Went Wrong!!!");
                        $('#alert1').slideDown();
                    }else{
                        $('#alert1').text("`"+$('#ausername').val().trim()+"` Already Exist!!!");
                        $('#alert1').slideDown();
                    }
                });
            }
        })


        function ininput(){
            $('#alert:first').slideUp();
            $('#alert1').slideUp();
            search = $('#search').val().trim();
            getalldata();
        }
        function hidemodal(){
            var deletemodal = bootstrap.Modal.getOrCreateInstance($('#staticBackdrop')),
            updatemodal = bootstrap.Modal.getOrCreateInstance($('#updatemodal')),
            addmodal = bootstrap.Modal.getOrCreateInstance($('#addmodal'));
            deletemodal.hide();
            updatemodal.hide();
            addmodal.hide();
            getalldata();
        }
        function refresh(data){
            var obj = JSON.parse(data),
            table = $('#tabledata').html(''),
            row = "";
            if(Object.keys(obj.data).length <=0){
                row+="<tr><th>Empty</th><td>Empty</td><td>Empty</td><td>Empty</td><td>Empty</td><td>Empty</td><td>Empty</td></tr>";
            }else{
                for(var key in obj.data){
                    row+='<tr><th>'+obj.data[key].USER_ID+'</th><td>'+obj.data[key].NAME+'</td><td>'+obj.data[key].POSITION+'</td><td>'+obj.data[key].EMAIL+'</td><td>'+obj.data[key].ADDRESS+'</td><td>'+obj.data[key].COMPANY+'</td><td><i id="updatebtn" target="'+obj.data[key].USER_ID+'"class="fa-solid fa-pen btn btn-light" data-bs-toggle="modal" data-bs-target="#updatemodal"></i> <i id="deletebtn" target="'+obj.data[key].USER_ID+'"class="fa-solid fa-trash btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i></td></tr>';
                }
            }
            table.append(row);
        }
    </script>
</body>
</html>
<?php ?>