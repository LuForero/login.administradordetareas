<?php
require_once 'iniciosesion.php';
?>
<div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
        <h4 class="mb-4 text-center">Iniciar Sesión</h4>
        <form action="login_process.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </div>
        </form>
        <!-- <p class="mt-3 text-center">
                        ¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a>
                    </p> -->
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
