<?php
// require_once("./header.php");
require_once("../resources/views/template/header.php");
?>

<h1>Contactos</h1>

<a href="/create" class="btn btn-primary">Nuevo</a>

<div class="table">
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Name</th>
				<th scope="col">Email</th>
				<th scope="col">Phone</th>
				<th scope="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($contacts as $contact): ?>
				<tr class="">
					<td>
						<?= $contact->id ?>
					</td>
					<td>
						<?= $contact->name ?>
					</td>
					<td>
						<?= $contact->email ?>
					</td>
					<td>
						<?= $contact->phone ?>
					</td>
					<td>
						<a href="<?= '/edit?id=' . $contact->id ?>" class="btn btn-success">
							<i class="bi bi-pencil-square"></i>
						</a>
						<form method="post" action="/delete"
							onsubmit="return confirm('¿Está seguro de que desea eliminar este usuario?');" class="d-inline">
							<input type="hidden" name="id" value="<?= $contact->id ?>">
							<button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
							<!-- <input type="submit"  value="Eliminar"> -->
						</form>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>



<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
	<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1500">
		<div class="d-flex">
			<div class="toast-body">
				<?php
					if (isset($_GET['mensaje'])) {
						echo $_GET['mensaje'];
					}
				?>
			</div>
			<button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
	</div>
</div>

<?php if (isset($_GET['mensaje'])) { ?>
	<script>
		document.addEventListener("DOMContentLoaded", function (event) {
			var toastLiveExample = document.getElementById('liveToast');
			var toast = new bootstrap.Toast(toastLiveExample);
			toast.show();
		});
	</script>
<?php } ?>

<?php
require_once("../resources/views/template/footer.php");
// require_once("../template/footer.php");
?>