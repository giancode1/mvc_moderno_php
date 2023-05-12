<?php
    require_once("../resources/views/template/header.php");
?>

<h1>Edit</h1>


<form action="edit" method="post" class="d-flex justify-content-center mt-4">
    <div class="col-md-6 col-sm-10">
        <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control" id="floatingInput" placeholder="nombre" value="<?= $contact->name ?>" required>
            <label for="floatingInput">Nombre</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?= $contact->email ?>" required>
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
            <input type="number" name="phone" class="form-control" id="floatingPassword" placeholder="09765432" value="<?= $contact->phone ?>" required>
            <label for="floatingPassword">Teléfono</label>
        </div>

        <div class="mt-4">
            <input type="submit" name="form-edit" class="btn btn-success" value="Actualizar">
            <input type="hidden" name="id" value="<?= $contact->id ?>">
            <a href="/" class="btn btn-secondary">Regresar</a>
        </div>

    </div>
</form>



<?php
    require_once("../resources/views/template/footer.php");
?>




