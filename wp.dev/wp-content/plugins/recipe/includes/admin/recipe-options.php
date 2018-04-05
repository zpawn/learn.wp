<?php
/**
 * @link https://github.com/zpawn/CrispWP
 * @author Ilia Makarov <ilia.makarov@me.com>
 */


function r_recipe_options_mb ( $post ) {

	$recipe_data = get_post_meta( $post->ID, 'recipe_data', true );

	if ( !$recipe_data ) {
		$recipe_data = [
			'ingredients'   => '',
			'time'          => '',
			'utensils'      => '',
			'level'         => 'Beginner',
			'type'          => '',
		];
	}

	?>
	<div class="form-group">
		<label for="r_inputIngredients">Ingredients</label>
		<input class="form-control" id="r_inputIngredients" type="text" name="r_inputIngredients" value="<?= $recipe_data['ingredients'] ?>">
	</div>
	<div class="form-group">
		<label for="r_inputTime">Cooking Time</label>
		<input class="form-control" id="r_inputTime" type="text" name="r_inputTime" value="<?= $recipe_data['time'] ?>">
	</div>
	<div class="form-group">
		<label for="r_inputUtensils">Cooking Utensils</label>
		<input class="form-control" id="r_inputUtensils" type="text" name="r_inputUtensils" value="<?= $recipe_data['utensils'] ?>">
	</div>
	<div class="form-group">
		<label for="r_inputLevel">Cooking Level</label>
		<select class="form-control" id="r_inputLevel" name="r_inputLevel">
			<option value="Beginner" <?php if ($recipe_data['level'] == 'Beginner') echo 'selected="selected"' ?>>Beginner</option>
			<option value="Intermediate" <?php if ($recipe_data['level'] == 'Intermediate') echo 'selected="selected"' ?>>Intermediate</option>
			<option value="Expert" <?php if ($recipe_data['level'] == 'Expert') echo 'selected="selected"' ?>>Expert</option>
		</select>
	</div>
	<div class="form-group">
		<label for="r_inputMealType">Meal Type</label>
		<input class="form-control" id="r_inputMealType" type="text" name="r_inputMealType" value="<?= $recipe_data['type'] ?>">
	</div>
<?php }
