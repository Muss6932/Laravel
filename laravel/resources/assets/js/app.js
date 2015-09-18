$(document).ready(function(){

//SEARCH TABLE

    init.push(function () {


        $('#jq-datatables-example').dataTable();
        $('#jq-datatables-example_wrapper .table-caption').text('');
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Rechercher...');


        // Multiselect
        $(".select2-multiple").select2({
            placeholder: ""
        });








        $('input.date').datepicker({
            format: "dd/mm/yyyy",
            todayBtn: "linked"
        })

        //var options = {
        //    todayBtn: "linked",
        //    orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
        //}
        //$('#bs-datepicker-example').datepicker(options);
        //
        //$('#bs-datepicker-component').datepicker();
        //
        //var options2 = {
        //    orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
        //}
        //$('#bs-datepicker-range').datepicker(options2);
        //
        //$('#bs-datepicker-inline').datepicker();


        $('#timepicker2').timepicker({
            minuteStep: 5,
            showSeconds: false,
            showMeridian: false,
            defaultTime: false
        });






        $('.summernote').summernote({
            height: 300
        });





        if (!$('html').hasClass('ie8')) {
            $('.summernote-example').summernote({
                height: 200,
                tabsize: 2,
                codemirror: {
                    theme: 'monokai'
                }
            });
        }

        $('.summernote-boxed').switcher({
            on_state_content: '<span class="fa fa-check" style="font-size:11px;"></span>',
            off_state_content: '<span class="fa fa-times" style="font-size:11px;"></span>'
        });
        $('.summernote-boxed').on($('html').hasClass('ie8') ? "propertychange" : "change", function () {
            var $panel = $(this).parents('.panel');
            if ($(this).is(':checked')) {
                $panel.find('.panel-body').addClass('no-padding');
                $panel.find('.panel-body > *').addClass('no-border');
            } else {
                $panel.find('.panel-body').removeClass('no-padding');
                $panel.find('.panel-body > *').removeClass('no-border');
            }
        });






            // Add phone validator
            $.validator.addMethod(
                "phone_format",
                function (value, element) {
                    var check = false;
                    return this.optional(element) || /^\(\d{3}\)[ ]\d{3}\-\d{4}$/.test(value);
                },
                "Invalid phone number."
            );

            $.validator.addMethod(
                "languages",
                function (value, element, regexp) {
                    var re = new RegExp(regexp);
                    return this.optional(element) || re.test(value);
                },
                "La langue choisie n'est pas dans la liste."
            );

            // Setup validation
            $(".formular-validate").validate({
                ignore: '.ignore, .select2-input',
                focusInvalid: false,
                rules: {
                    'firstname': {              /* nom de l'id (? à vérifier) */
                        required: true
                    },
                    'lastname': {
                        required: true
                    //},
                    //'image': {
                    //    required: true
                    },
                    'languages': {
                        regex: 'regex:/^(en|fr)$/'
                    },
                    'categories': {
                        required: true
                    },
                    'title': {
                        required: true
                    },
                    'jq-validation-phone': {
                        required: true,
                        phone_format: true
                    },
                    'jq-validation-select': {
                        required: true
                    },
                    'jq-validation-multiselect': {
                        required: true,
                        minlength: 2
                    },

                },
                messages: {
                    'firstname': 'Ce champs est obligatoire',
                    'lastname': 'Ce champs est obligatoire',
                    'lien': "Merci d'entre un lien valide",
                    'title': 'Ce champs est obligatoire.'
                }
            });





        $('#image').pixelFileInput(
                { placeholder: 'Aucun fichier selectionné...',
                  }
            )








        $(".limit-textarea-200").limiter(200, {label: '.label-limit-textarea-label'});


        $(".switcher").switcher();








        var easyPieChartDefaults = {
            animate: 2000,
            scaleColor: false,
            lineWidth: 6,
            lineCap: 'square',
            size: 90,
            trackColor: '#e5e5e5'
        };

        $('.easy-pie-chart-1').easyPieChart($.extend({}, easyPieChartDefaults, {
            barColor: PixelAdmin.settings.consts.COLORS[1]
        }));










        $('#jq-growl-default').click(function () {
            $.growl({title: "Growl", message: "The kitten is awake!"});
        });
        $('#jq-growl-error').click(function () {
            $.growl.error({message: "The kitten is attacking!"});
        });
        $('#jq-growl-notice').click(function () {
            $.growl.notice({message: "The kitten is cute!"});
        });
        $('#jq-growl-warning').click(function () {
            $.growl.warning({message: "The kitten is ugly!"});
        });
        $('#jq-growl-small').click(function () {
            $.growl({title: "Growl", message: "The kitten is awake!", size: 'small'});
        });
        $('#jq-growl-large').click(function () {
            $.growl({title: "Growl", message: "The kitten is awake!", size: 'large'});
        });
        $('#jq-growl-static').click(function () {
            $.growl({title: "Growl", message: "The kitten is awake!", duration: 9999 * 9999});
        });

















// fin

    });

});




