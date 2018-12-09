<?php

namespace BooksLoader\Base;

$db = DB::getInstance();

if (isset($_POST['load_files'])) {
	$bookObj = new Books();

	$loadFiles = $bookObj->load('xmlData');
	$data = $loadFiles->displayData();
	$result = $bookObj->upsert();
}

?>

<div class="content container-fluid">
	<div class="section mx-auto">
		<header class="section__head">
			<h4 class="section__title ">
				Начало
			</h4><!-- /.section__title -->
		</header><!-- /.section__head -->

		<div class="section__body">
			<?php
				if (isset($result) && !$result) { ?>
					<div class="errmsg">
						Възникна грешка при вкарването/обновяването на данните!
					</div><!-- /.errmsg -->
				<?php
					}
				?>

			<div class="form-files">
				<form id="upload-files" action="" method="POST">
					<div class="form__head">
						Зареждане на файлове
					</div><!-- /.form__head -->
					
					<div class="form__actions">
						<button type="submit" name="load_files" value="1" class="form__btn">
							Зареди
						</button>
					</div><!-- /.form__actions -->
				</form>
			</div><!-- /.form -->

			<div class="display-files">
				<h5>
					Прочетени файлове.
				</h5>

				<p>
					<?php
						if (isset($data)) {
							foreach ($data['fileName'] as $key => $value) {
								echo ($value);
								echo '<br />';
							}
						}
					?>
				</p>
			</div><!-- /.display-files -->
		</div><!-- /.section__body -->
	</div><!-- /.section -->
</div><!-- /.content -->