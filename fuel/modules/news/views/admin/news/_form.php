<?=\Form::open(array('class' => 'form-horizontal'))?>
	<fieldset>
		<legend>Редактирование Новости</legend>

		<div class="control-group">
			<?=\Form::label('Заголовок', 'title', array('class' => 'control-label'))?>
			<div class="controls">
				<?=\Form::input('title', $news->title, array('required' => 'required'))?>
			</div>
		</div>

		<div class="controls">
				<?=\Form::textarea('text',$news->text, array('class' => 'span8', 'rows' => 5))?>
			</div>

		<div class="form-actions">
			<?=\Form::button('submit', 'Сохранить', array('class' => 'btn btn-primary'))?>
		</div>


	</fieldset>
<?=\Form::close()?>