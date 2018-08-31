<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/HelloPHP/BootCSS/bootstrap.css">

    <title>詹姆斯的各种得分信息</title>


</head>
<body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="/HelloPHP/BootJS/jquery-3.3.1.min.js"></script>
<script src="/HelloPHP/BootJS/popper.js"></script>
<script src="/HelloPHP/BootJS/bootstrap.js"></script>

<form method="post" action="" class="needs-validation" novalidate>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validationCustomUsername">Username</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                </div>
                <input type="text" class="form-control" id="validationUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Please input username.
                </div>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validationCustomUsername">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="validationPassword" placeholder="Password" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Please input password.
                </div>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
        </div>
    </div>

    <div class="form-row">
        <input class="btn btn-primary" type="submit" name="submit" value="&nbsp;&nbsp;&nbsp;LOGIN&nbsp;&nbsp;&nbsp;">
    </div>
</form>
<!-- Script : for validation -->
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>




</body>
</html>