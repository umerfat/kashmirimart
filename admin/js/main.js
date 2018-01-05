$(document).ready(function () {

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 2000);

    $(".delete_post_link").on('click', function () {

        var user_id = $(this).attr('rel');
        var delete_user_url = "users.php?delete="+ user_id +"";
        $(".modal_delete_link").attr("href", delete_user_url);
    });

    $(".delete_user").on('click', function () {

        var user_id = $(this).attr('rel');
        var delete_user_url = "users.php?delete="+ user_id +"";
        $(".modal_delete_link").attr("href", delete_user_url);
    });

    // $(function() {
    //     $('textarea').froalaEditor({
    //         toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '|', 'emoticons', 'specialCharacters', 'insertHR', 'selectAll', 'clearFormatting', '|', 'print', 'help', 'html', '|', 'undo', 'redo'],
    //         pluginsEnabled: null
    //     })
    // });

    var showChar = 20;
    var ellipsestext = "...";
    var moretext = "more";
    var lesstext = "less";
    $('.more').each(function() {
        var content = $(this).html();

        if(content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar-1, content.length - showChar);

            var html = c + '<span class="moreelipses">'+ellipsestext+'</span>&nbsp;<span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">'+moretext+'</a></span>';

            $(this).html(html);
        }

    });

    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });

    $('#selectAllBoxes').click(function (event) {
        if (this.checked){
            $('.checkBoxes').each(function () {
                this.checked = true;
            });
        }
        else {
            $('.checkBoxes').each(function () {
                this.checked = false;
            });
        }
    });

});

$(document).ready(function() {
    //noinspection JSUnresolvedFunction
    $('#add-labour-admin').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                row: '.col-md-6 col-sm-12 col-xs-12',
                validators: {
                    notEmpty: {
                        message: 'Item Name is required'
                    },
                    regexp: {
                        regexp: /[^A-Za-z0-9]+/,
                        message: 'Name can only consist of alphabets'
                    }
                }
            },
            status: {
                row: '.col-md-6 col-sm-12 col-xs-12',
                validators: {
                    notEmpty: {
                        message: 'Status is required'
                    }
                }
            },
            category: {
                validators: {
                    notEmpty: {
                        message: 'Category is required'
                    }
                }
            },
            image: {
                validators: {
                    notEmpty: {
                        message: 'Image is required'
                    }
                }
            },
            description: {
                validators: {
                    notEmpty: {
                        message: 'Description is required'
                    }
                }
            }
        }
    })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
            //noinspection JSUnresolvedFunction
            $('#add-labour-admin').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');
        });
});

$(document).ready(function() {
    //noinspection JSUnresolvedFunction
    $('#add-category-form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            cat_name: {
                row: '.col-md-6 col-sm-12 col-xs-12',
                validators: {
                    notEmpty: {
                        message: 'Category is required'
                    }
                }
            }
        }
    })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
            //noinspection JSUnresolvedFunction
            $('#add-labour-admin').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');
        });
});

$(document).ready(function() {
    //noinspection JSUnresolvedFunction
    $('#add-sub-category-form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            sub_cat_name: {
                row: '.col-md-3 col-sm-12 col-xs-12',
                validators: {
                    notEmpty: {
                        message: 'Sub Category Name is required'
                    }
                }
            },
            category: {
                validators: {
                    notEmpty: {
                        message: 'Category is required'
                    }
                }
            }
        }
    })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
            //noinspection JSUnresolvedFunction
            $('#add-sub-category-form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');
        });
});
