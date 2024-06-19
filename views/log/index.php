<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="form-container">
                    <h1 class="text-center mb-4"><strong>Page de Connexion</strong></h1>
                    <p class="text-center mb-4">Nom d'utilisateur et mot de passe par défaut : <strong>admin</strong></p>
                    <?php
                        if (!empty($mes)) {
                            echo "<div class='alert alert-$type_mes alert-dismissible fade show' role='alert'>
                                " . htmlspecialchars($mes, ENT_QUOTES, 'UTF-8') . "
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                        }
                    ?>
                    <form method="POST" action="" class="was-validated">
                        <div class="mb-3">
                            <label for="uname" class="form-label">Nom d'utilisateur:</label>
                            <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Mot de passe:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
                                <span class="input-group-text password-toggle" onclick="togglePassword()">
                                    <i class="bi bi-eye-slash" id="toggleIcon"></i>
                                </span>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Connexion</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('pwd');
            const toggleIcon = document.getElementById('toggleIcon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            }
        }
    </script>
</body>