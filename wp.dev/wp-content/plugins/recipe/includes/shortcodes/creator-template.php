<div id="recipeStatus"></div>
<form id="recipeForm">
	<div class="form-group">
		<label for="r_inputTitle">Title</label>
		<input class="form-control" id="r_inputTitle" type="text">
	</div>
	CONTENT_EDITOR
	<div class="form-group">
		<label for="r_inputIngredients">Ingredients</label>
		<input class="form-control" id="r_inputIngredients" type="text">
	</div>
	<div class="form-group">
		<label for="r_inputTime">Cooking Time</label>
		<input class="form-control" id="r_inputTime" type="text">
	</div>
	<div class="form-group">
		<label for="r_inputUtensils">Cooking Utensils</label>
		<input class="form-control" id="r_inputUtensils" type="text">
	</div>
	<div class="form-group">
		<label for="r_inputLevel">Cooking Level</label>
		<select class="form-control" id="r_inputLevel">
			<option value="Beginner">Beginner</option>
			<option value="Intermediate">Intermediate</option>
			<option value="Expert">Expert</option>
		</select>
	</div>
	<div class="form-group">
		<label for="">Meal Type</label>
		<input class="form-control" id="r_inputMealType" type="text">
	</div>
	<div class="form-group">
		<button class="btn btn-primary" type="submit">Submit Recipe</button>
	</div>
</form>
