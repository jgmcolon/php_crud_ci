<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD USERS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

    <!-- STYLES -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

</head>
<body>

<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">CRUD PHP CI - TEST</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">


        </div>
    </div>
</nav>

<main class="container" style="margin-top: 100px">
    <div class="bg-light p-5 rounded">
        <h3>CRUD USERS</h3>
        <button type="button" class="btn btn-primary add-user">
            Agregar
        </button>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Usuario</th>
                <th scope="col">Name</th>
                <th scope="col">LastName</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody id="details">

            </tbody>
        </table>

    </div>
</main>

<div class="modal fade" id="crudModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalLabel">Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" novalidate="novalidate" onsubmit="return false;">
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="firstName" class="col-sm-2 col-form-label">Firstname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="firstName" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="lastName" class="col-sm-2 col-form-label">Lastname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lastName" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3 row" id="row-password">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" autocomplete="off">
                        </div>
                    </div>
                    <input type="hidden" id="id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="fncSave()">Guardar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pwdResetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar contraseña</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Se le asignará una nueva clave y se enviará por correo
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="fncResetPassword()">Ok</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar contraseña</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Se borrara la cuenta
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="fncDelete()">Ok</button>
            </div>
        </div>
    </div>
</div>

<script>
    let crudModal;
    let deleteModal;
    let pwdResetModal;

    $(function () {
        getAll()

        crudModal = new bootstrap.Modal('#crudModal', {
            keyboard: false
        })

        deleteModal = new bootstrap.Modal('#deleteModal', {
            keyboard: false
        })

        pwdResetModal = new bootstrap.Modal('#pwdResetModal', {
            keyboard: false
        })

    });

    function getAll() {
        $.getJSON('/services/users/getAll', function (res) {
            setData(res.data)
        });
    }

    function setData(data) {


        $('#details').html("");
        $.each(data, function (i, row) {

            $('#details').append(`<tr>
                                    <td>${row.id}</td>
                                    <td>${row.username}</td>
                                    <td>${row.firstName}</td>
                                    <td>${row.lastName}</td>
                                    <td>${row.email}</td>
                                    <td>
                                        <button type="button" data-id="${row.id}" class="edit-user btn btn-outline-primary btn-sm"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" data-id="${row.id}" class="reset-pwd-user btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-clockwise"></i></button>
                                        <button type="button" data-id="${row.id}" class="delete-user btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>`);
        });
    }

    $(document).on('click', '.edit-user', function () {
        let id = $(this).data('id');

        $.getJSON(`/services/users/getBy/${id}`, function (res) {

            $("#id").val(id);

            $("#username").val(res.data.username);
            $("#firstName").val(res.data.firstName);
            $("#lastName").val(res.data.lastName);
            $("#email").val(res.data.email);
            $("#row-password").css("display", "none");


            crudModal.show();

        });

    });

    $(document).on('click', '.add-user', function () {

        $("#row-password").css("display", "");

        $("#id").val(0);

        $("#username").val("");
        $("#firstName").val("");
        $("#lastName").val("");
        $("#email").val("");
        $("#password").val("");

        crudModal.show();
    });


    $(document).on('click', '.reset-pwd-user', function () {
        let id = $(this).data('id');
        $("#id").val(id);

        pwdResetModal.show();
    });

    $(document).on('click', '.delete-user', function () {
        let id = $(this).data('id');
        $("#id").val(id);

        deleteModal.show();
    });


    function fncSave() {

        let id = $("#id").val();

        let url = (id === "0" ? `/services/users/insert` : `/services/users/update/${id}`);

        let data = JSON.stringify({
            id: id,
            password: $("#password").val(),
            username: $("#username").val(),
            firstName: $("#firstName").val(),
            lastName: $("#lastName").val(),
            email: $("#email").val(),
        });


        $.post(url, data, function (res) {

            crudModal.hide();

            setData(res.data)

        }, 'json');
    }

    function fncResetPassword() {
        let id = $("#id").val();

        $.post(`/services/users/password/${id}`, [], function (res) {

            pwdResetModal.hide();

            setData(res.data);

        }, 'json');
    }

    function fncDelete() {

        let id = $("#id").val();

        $.post(`/services/users/delete/${id}`, [], function (res) {

            deleteModal.hide();

            setData(res.data)
        }, 'json');
    }


</script>


</body>
</html>
