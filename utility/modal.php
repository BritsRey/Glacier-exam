<!-- Delete modal-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this user?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success btn-lg" id="agreedel">Agree</button>
        </div>
        </div>
    </div>
</div>


<!-- update modal -->
<div class="modal fade" id="updatemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updatetitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updatetitle">Update</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" id="updatedata">
            <div class="modal-body d-block m-auto">
                <div id="alert" class="alert alert-danger" role="alert">
                    All input field are required
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" oninput="ininput()"placeholder="name">
                    <label for="name">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="position" oninput="ininput()" name="position" placeholder="position">
                    <label for="position">Position</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="email" oninput="ininput()" name="email" placeholder="email">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="address" oninput="ininput()" name="address" placeholder="address">
                    <label for="address ">Address</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="company" oninput="ininput()" name="company" placeholder="company">
                    <label for="company">Company</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-primary btn-lg">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>


<!-- Add New record modal -->
<div class="modal fade" id="addmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addtitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addtitle">Add New Record</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" id="adddata">
            <div class="modal-body d-block m-auto">
                <div id="alert1" class="alert alert-danger" role="alert">
                    All input field are required
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="aname" name="aname" oninput="ininput()"placeholder="name">
                    <label for="aname">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ausername" name="ausername" oninput="ininput()"placeholder="username">
                    <label for="ausername">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="apassword" name="apassword" oninput="ininput()"placeholder="apassword">
                    <label for="apassword">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="aposition" oninput="ininput()" name="aposition" placeholder="aposition">
                    <label for="aposition">Position</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="aemail" oninput="ininput()" name="aemail" placeholder="aemail">
                    <label for="aemail">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="aaddress" oninput="ininput()" name="aaddress" placeholder="aaddress">
                    <label for="aaddress ">Address</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="acompany" oninput="ininput()" name="acompany" placeholder="acompany">
                    <label for="acompany">Company</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success btn-lg">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>