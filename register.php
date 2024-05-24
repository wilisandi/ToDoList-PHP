<?php
include("components/header.php");
?>

<body>
    <!-- Start your project here-->
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center h-100">
                <div class="col col-12">
                    <div class="d-flex flex-column align-items-center justify-content-center h-100 w-100">
                        <h1 class="fw-bold text-primary">Tugas UAS </h1><h3 style="color: whitesmoke;">Server Side Programming</h3>
                    </div>

                </div>
                <div class="col col-xl-3">
                    <?php
                    session_start();
                    if (isset($_SESSION['errors'])) {
                        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['errors'] . '</div>';
                        unset($_SESSION['errors']);
                    }
                    ?>
                    <div class="card card-primary bg-theme">
                        <div class="card-body p-4">
                            <form class="justify-content-center align-items-center mb-4" action="controller/register.php" method="post" autocomplete="off" autocapitalize="false">
                                <div class="form-outline flex-fill my-4">
                                    <input type="text" id="name" class="form-control" name="name" />
                                    <label class="form-label" for="name">Name</label>
                                    <div class="form-notch">
                                        <div class="form-notch-leading" style="width: 9px;"></div>
                                        <div class="form-notch-middle" style="width: 71.2px;"></div>
                                        <div class="form-notch-trailing"></div>
                                    </div>
                                </div>
                                <div class="form-outline flex-fill my-4">
                                    <input type="email" id="email" class="form-control" name="email" />
                                    <label class="form-label" for="email">Email</label>
                                    <div class="form-notch">
                                        <div class="form-notch-leading" style="width: 9px;"></div>
                                        <div class="form-notch-middle" style="width: 71.2px;"></div>
                                        <div class="form-notch-trailing"></div>
                                    </div>
                                </div>
                                <div class="form-outline flex-fill my-4">
                                    <input type="password" id="password" class="form-control" name="password" />
                                    <label class="form-label" for="password">Password</label>
                                    <div class="form-notch">
                                        <div class="form-notch-leading" style="width: 9px;"></div>
                                        <div class="form-notch-middle" style="width: 71.2px;"></div>
                                        <div class="form-notch-trailing"></div>
                                    </div>
                                </div>
                                <div class="form-outline flex-fill my-4">
                                    <input type="password" id="confirm-password" class="form-control" name="confirm_password" />
                                    <label class="form-label" for="confirm-password">Confirm Password</label>
                                    <div class="form-notch">
                                        <div class="form-notch-leading" style="width: 9px;"></div>
                                        <div class="form-notch-middle" style="width: 71.2px;"></div>
                                        <div class="form-notch-trailing"></div>
                                    </div>
                                </div>
                                <button class="btn btn-primary form-control" type="submit">Register</button>
                                <p class="mt-2">Have account? <span>
                                        <a class="text-primary" href="login.php">Login</a>
                                    </span></>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function getQueryParam(key) {
            const queryString = window.location.search;
            const params = new URLSearchParams(queryString);
            return params.get(key);
        }

        const email = getQueryParam('email');
        if (email !== null) {
            document.getElementById("email").value = email;
        }
        const name = getQueryParam('name');
        if (name !== null) {
            document.getElementById("name").value = name;
        }
        const password = getQueryParam('password');
        if (password !== null) {
            document.getElementById("password").value = password;
        }
        const confirm_password = getQueryParam('confirm_password');
        if (confirm_password !== null) {
            document.getElementById("confirm_password").value = confirm_password;
        }
    </script>
</body>

</html>