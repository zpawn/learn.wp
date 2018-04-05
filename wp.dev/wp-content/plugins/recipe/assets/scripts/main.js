(function ($) {
    $('#recipe_rating').bind('rated', function () {
        var $this = $(this),
            formData = {
                action: 'r_rate_recipe',
                rid: $this.data('rid'),
                rating: $this.data('rateitValue')
            };

        $this.rateit('readonly', true);

        $.post( recipe_obj.ajax_url, formData, function (data) {
            console.log('<<<:', data);
        });
    });

    $(document).on('submit', '#recipeForm', function (e) {
        e.preventDefault();
        var $this = $(this),
            $notify = $('#recipeStatus'),
            formData = {
                action: 'r_submit_user_recipe',
                title: $('#r_inputTitle').val(),
                content: tinymce.activeEditor.getContent(),
                ingredients: $('#r_inputIngredients').val(),
                time: $('#r_inputTime').val(),
                utensils: $('#r_inputUtensils').val(),
                level: $('#r_inputLevel').val(),
                meal_type: $('#r_inputMealType').val()
            };

        $this.hide();
        $notify.html('<div class="alert alert-info">Please wait! We are submitting your recipe.</div>');

        $.post(recipe_obj.ajax_url, formData, function (data) {
            console.log('<<< response:', data);
            if (data.status === 2) {
                $notify.html('<div class="alert alert-success">Recipe submitted successfully! An Admin will approved.</div>');
            } else {
                $notify.html('<div class="alert alert-error">Unable to submit recipe. Please fill in all fields!</div>');
                $('#recipeForm').show();
            }
        });
    });

}(jQuery));
