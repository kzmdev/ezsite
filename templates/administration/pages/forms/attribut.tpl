<form class="form-horizontal">
	{include file='blocs/grid_pagination.tpl'}
	<div class="page-form">
		<div class="row title">
			<div class="col-md-11">
				Propriété de l'attribut
			</div>
			<div class="col-md-1 page-form-arrow">
				<i class="fas fa-angle-up" data-toogle="fields_property"></i>
			</div>
		</div>
		<div class="row" id="fields_property">
			<div class="form-group form-line _required">
				<label for="attribute_code" class="col-sm-3 control-label admin__field-label"><span>Code de l'attribut</span></label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="attribute_code" name="attribute_code" placeholder="Code de l'attribut">
				</div>
			</div>
			<div class="form-group form-line">
				<label for="attribute_type" class="col-sm-3 control-label admin__field-label"><span>Type de champs</span></label>
				<div class="col-sm-9">
				  <select class="form-control" name="attribute_type" id="attribute_type">
					<option value="varchar">Texte simple</option>
					<option value="textarea">Texte enrichi</option>
					<option value="datetime">Date</option>
				  </select>
				</div>
			</div>
			<div class="form-group form-line">
				<label for="attribute_type" class="col-sm-3 control-label admin__field-label"><span>Libelle de l'attribut</span></label>
				<div class="col-sm-9">
					<div class="input-group">
						<input type="text" class="form-control" aria-label="...">
						<div class="input-group-btn">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
							<ul class="dropdown-menu">
							  <li><a href="#">Action</a></li>
							  <li><a href="#">Another action</a></li>
							  <li><a href="#">Something else here</a></li>
							  <li role="separator" class="divider"></li>
							  <li><a href="#">Separated link</a></li>
							</ul>
						</div><!-- /btn-group -->
					</div>
				</div>
			</div>
		</div>
		<div class="row title">
			<div class="col-md-11">
				Options (Valeurs de l'attribut)
			</div>
			<div class="col-md-1 page-form-arrow"><i class="fas fa-angle-up"></i></div>
		</div>
	</div>
</form>