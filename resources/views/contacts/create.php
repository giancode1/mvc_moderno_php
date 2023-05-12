<?php
require_once("../resources/views/template/header.php");
?>

<h1 class="text-center">Alumno</h1>

<form action="create" method="post" class="d-flex justify-content-center mt-4">
    <div class="col-md-6 col-sm-10">
        <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control" id="floatingInput" placeholder="nombre" required>
            <label for="floatingInput">Nombre</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
            <input type="number" name="phone" class="form-control" id="floatingPassword" placeholder="09765432" required>
            <label for="floatingPassword">Teléfono</label>
        </div>

        <div class="mt-4">
            <input type="submit" name="form-contact" class="btn btn-success" value="Guardar">
            <a href="/" class="btn btn-secondary">Regresar</a>
        </div>

    </div>
</form>


<?php
// print_r($data);
?>

<?php if (isset($data['error_email'])) : ?>
    <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
        <strong><?= $data['error_email'] ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (isset($data['error_valores'])) : ?>
    <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
        <strong><?= $data['error_valores'] ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>


<?php
require_once("../resources/views/template/footer.php");
?>