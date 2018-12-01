<div class="page-action">
	<div class="row">
		<div class="col-md-12 button-action-zone">  
			<button type="button" class="btn btn-warning" data-url="/attributes/add"><span class="ui-button-text">Ajouter un Attribut</span></button>
		</div>
	</div>
</div>
<div class="page-body">
	<div class="page-grid">
	<form class="page-grid-table-search">
		<div class="row" id="page-grid-table-search-action">
			<div class="col-md-6 no-gutter">
				<div class="col-md-2 no-gutter">
					<button type="button" class="btn search">Recherche</button>
				</div>
				<div class="col-md-3 no-gutter">
					<button type="button" class="btn btn-link">Annule les filtres</button>
				</div>
				<div class="col-md-7 no-gutter data-found">
					{$total} résultat{if $total > 1}s{/if} trouvé{if $total > 1}s{/if}
				</div>
			</div>
			<div class="col-md-6 no-gutter" style="line-height:35px">
				<div class="row">
					<div class="col-md-6">
						<select name="data_for_page" id="page-select-by-page">
							<option>1</option>
							<option selected='selected'>10</option>
							<option>50</option>
							<option>100</option>
							<option>200</option>
						</select>
						Résultats par pages
					</div>
					<div class="col-md-6 page-grid-search-pagination">
						<button class="btn btn-default page-past-pagination" type="button"><</button>
						<input type="text" name="current_page" class="page-select-pagination" value="{$currentPage}" type="button"> <label>sur {$nbPageMax}</label>
						<button class="btn btn-default page-next-pagination">></button>
					</div>
				</div>
			</div>
		</div>
		<table class="page-grid-table table table-striped">
			<thead>
				<tr>
					<th>
						#
					</th>
					<th>
						Attribut code
					</th>
					<th>
						Libelle
					</th>
					<th>
						Type
					</th>
				</tr>
			</thead>
				<tr>
					<td><input class="form-control" type="text" name="attribute_entity" value=""></td>
					<td><input class="form-control" type="text" name="attribute_code" value=""></td>
					<td><input class="form-control" type="text" name="attribute_code" value=""></td>
					<td><select class="form-control" >
                        <option value=""></option>
                        <option value="1">Green</option>
                        <option value="2">Red</option>
                        <option value="3">Blue</option>
                      </select>
					</td>
				</tr>
		{foreach from=$liste item=attribut}
			<tr class="grid-link-edit" data-target="attributes" data-code="{$attribut->attribute_code}">
				<td>
					{$attribut->attribute_entity}
				</td>
				<td>
					{$attribut->attribute_code}
				</td>
				<td>
					{$attribut->translate[$lg]}
				</td>
				<td>
					{$attribut->attribute_type}
				</td>
			</tr>
		{/foreach}
		</table>
	</form>
	</div>
</div>