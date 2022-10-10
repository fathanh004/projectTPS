<?php
if (isset($this->session->userdata['logged_in'])) {

    header("location: http://localhost/projectTPS/Clogin/user_login_process");
}
?>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-1 mt-md-2 pb-1">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                <?php
                                if (isset($logout_message)) {
                                    echo "<div class='message'>";
                                    echo $logout_message;
                                    echo "</div>";
                                }
                                ?>
                                <?php echo form_open('Clogin/user_login_process'); ?>
                                <?php
                                echo "<div class='error_msg'>";
                                if (isset($error_message)) {
                                    echo $error_message;
                                }
                                echo validation_errors();
                                echo "</div>";
                                ?>
                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="username" id="typeEmailX" class="form-control form-control-lg" />
                                    <label class="form-label" for="typeEmailX">Username</label>

                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div>

                                <div>
                                    <input type="submit" class="button button-primary" value="Login">
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>