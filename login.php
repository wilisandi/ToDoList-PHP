<?php include("components/header.php"); ?>

<body>
    <!-- Start your project here-->
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center h-100">
                <div class="col col-12">
                    <div class="d-flex flex-column align-items-center justify-content-center h-100 w-100">
                        <h1 class="fw-bold text-primary">Tugas UAS </h1>
                        <h3 style="color: whitesmoke;">Server Side Programming</h3>
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
                            <form class="justify-content-center align-items-center mb-4" action="controller/login.php" method="post" autocomplete="off" autocapitalize="false">
                                <div class="form-outline flex-fill my-4">
                                    <input type="text" id="email" name="email" class="form-control" />
                                    <label class="form-label" for="email">Email</label>
                                    <div class="form-notch">
                                        <div class="form-notch-leading" style="width: 9px;"></div>
                                        <div class="form-notch-middle" style="width: 71.2px;"></div>
                                        <div class="form-notch-trailing"></div>
                                    </div>
                                </div>
                                <div class="form-outline flex-fill my-4">
                                    <input type="password" id="password" name="password" class="form-control" />
                                    <label class="form-label" for="password">Password</label>
                                    <div class="form-notch">
                                        <div class="form-notch-leading" style="width: 9px;"></div>
                                        <div class="form-notch-middle" style="width: 71.2px;"></div>
                                        <div class="form-notch-trailing"></div>
                                    </div>
                                </div>
                                <button class="btn btn-primary form-control" type="submit">Login</button>
                                <p class="mt-2">Don't have account?
                                    <span>
                                        <a class="text-primary" href="register.php">Register</a>
                                    </span>
                                </p>
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

        const name = getQueryParam('email');
        if (name !== null) {
            document.getElementById("email").value = name;
        }
    </script>
</body>

</html>