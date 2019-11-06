<script>
    $(document).on('click', '#add-option', function () {
        var option_answers = $('.option-answer');

        var view =  '<div class="form-group row option-answer">\n' +
                       '<input type="radio" class="form-control col-lg-2 float-left" name="correct" value="'+ option_answers.length +'">\n' +
                       '<input type="text" class="form-control col-lg-8 mr-1" name="option_answer[]">\n' +
                        '<span class="btn btn-outline-danger remove-option"><i class="fas fa-minus"></i></span> \n' +
                    '</div>';

        $('#option').append(view);
    });

    $(document).on('click', '.remove-option', function () {
        $(this).parents('.option-answer').remove();
    });
</script>
