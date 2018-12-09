<div class="content container-fluid">
	<div class="section mx-auto">
		<header class="section__head">
			<h4 class="section__title ">
				Търси по автор
			</h4><!-- /.section__title -->
		</header><!-- /.section__head -->

		<div class="section__body">
			<div class="form-books">
				<form id="form-books" action="" method="POST">
					<div class="form__body">
						<div class="form__row">
							<label for="field-author" class="form__label">Автор</label>
							
							<div class="form__controls">
								<input type="text" class="field" required="required" name="field_author" id="field-author" placeholder="author">
							</div><!-- /.form__controls -->
						</div><!-- /.form__row -->
					</div><!-- /.form__body -->
					
					<div class="form__actions">
						<button type="submit" name="submit_author" value="1" id="submit-author" class="form__btn">
							Търси
						</button>
					</div><!-- /.form__actions -->
				</form>
			</div><!-- /.form-books -->

			<div class="books-results">
			</div><!-- /.books-results -->
		</div><!-- /.section__body -->
	</div><!-- /.section -->
</div><!-- /.content -->

<script src="public/js/main.js" type="text/javascript"></script>