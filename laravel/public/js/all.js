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











// GRAPH POUR WELCOME

    // RÉPARTITION DES FILMS PAR CATÉGORIES


        $.getJSON($('#graph-film-categorie-index').data('url'), function (data) {

                // Radialize the colors
                Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
                    return {
                        radialGradient: {
                            cx: 0.5,
                            cy: 0.3,
                            r: 0.7
                        },
                        stops: [
                            [0, color],
                            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                        ]
                    };
                });

                // Build the chart
                $('#graph-film-categorie-index').highcharts({
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: null
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                },
                                connectorColor: 'silver'
                            }
                        }
                    },
                    series: [{
                        name: "Brands",
                        data: data
                    }]
                });

        });


// GRAPH POUR WELCOME

    // RÉPARTITION DES SÉANCES PAR MOIS


        $.getJSON($('#graph-sessions-per-month').data('url'), function (data) {

                $('#graph-sessions-per-month').highcharts({
                chart: {
                    type: 'column',
                    margin: 75,
                    options3d: {
                        enabled: true,
                        alpha: 10,
                        beta: 25,
                        depth: 70
                    }
                },
                title: {
                    text: null
                },
                subtitle: {
                    text: null
                },
                plotOptions: {
                    column: {
                        depth: 25
                    }
                },
                xAxis: {
                    categories: Highcharts.getOptions().lang.shortMonths
                },
                yAxis: {
                    title: {
                        text: null
                    }
                },
                series: [{
                    name: 'Séances',
                    data: data
                }]
            });

        });


        // GRAPH POUR WELCOME

        // RÉPARTITION DES SÉANCES PAR MOIS


        $.getJSON($('#graph-categorie-per-best-actor').data('url'), function (data) {

            $('#graph-categorie-per-best-actor').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: null
                },
                xAxis: {
                    categories: data.categories
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Total fruit consumption'
                    },
                    stackLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                        }
                    }
                },
                legend: {
                    align: 'right',
                    x: -30,
                    verticalAlign: 'top',
                    y: 25,
                    floating: true,
                    backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                    borderColor: '#CCC',
                    borderWidth: 1,
                    shadow: false
                },
                tooltip: {
                    headerFormat: '<b>{point.x}</b><br/>',
                    pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                            style: {
                                textShadow: '0 0 3px black'
                            }
                        }
                    }
                },
                series: data.series
            });

        });







//-------------------------------------------------------------------------------------------------
//              TCHAT
//-------------------------------------------------------------------------------------------------

        $(".chat-controls-input .form-control").autosize();


//-------------------------------------------------------------------------------------------------
//              Modifier COMMENTAIRE
//-------------------------------------------------------------------------------------------------


            $('.update-comments').editable({
                type: 'text',
                name: 'content',
                title: 'comments',
                params: { _token : $('.update-comments').data('token')}
            });


//-------------------------------------------------------------------------------------------------
//              Modifier categorie film
//-------------------------------------------------------------------------------------------------




        $.getJSON($('.update-movies-categorie').data('donnee'), function (data) {

                $('.update-movies-categorie').editable({
                source: data,
                params: {_token: $('.update-movies-categorie').data('token')},
                select2: {
                width: 200,
                placeholder: 'Select country',
                allowClear: true
                }
            });

        });

//-------------------------------------------------------------------------------------------------
//              Modifier acteur film
//-------------------------------------------------------------------------------------------------


        $.getJSON($('.update-movies-actors').data('donnee'), function (data) {

            var tab = [];
            for ( var i = 0 ; i < data.length ; i++ ) {
                //console.log(data[i]['fullname']);
                tab.push(data[i]['fullname']);
            }

            console.log(tab);


                $('.update-movies-actors').editable({
                    params: {_token: $('.update-movies-actors').data('token')},
                    select2: {
                    tags: tab,
                    tokenSeparators: [",", " "]
                }
            });

        });

// fin

    });

});





$(document).ready(function(){

    //console.log('Blablabla');


    // 1ERE METHODE


    $('table.list .effetajax').click(function(e){
        e.preventDefault();     // --> annule l'évenement href de mes liens
        console.log('vous avez cliquez dessus.');

        // Je récupère le lien sur lequel j'ai cliqué
        var elt = $(this);

        // Module Ajax
        $.ajax({
            url: elt.attr('href')   // Url de mon href du lien sur lequel j'ai cliqué
        }).done(function() {
            elt.parents('tr').fadeOut('slow');

        });


    });



    //-------------------------------------------------------------------


    $('#actionslist button').click(function (e) {
        console.log('hey');

        e.preventDefault();
        console.log('vous avez cliquez dessus.');

        var selection = $(this).val();
        console.log(selection);

        //si je veux supprimer
        if(selection == "supprimer"){

            // boucle en jquery : pour chaque bouton coché (each())
            $('.listComments :checked').each(function(index){
                console.log($(this));

                var elt = $(this);

                // envoyer une requête ajax de suppression
                // pour chaque film coché
                $.ajax({
                    url: elt.attr('data-url')
                }).done(function() {
                    elt.parents('tr').fadeOut('slow');
                });

            });
        } else if (selection == "activer"){
            $('.listComments :checked').each(function (index) {
                console.log($(this));

                var elt = $(this);



            });
        }

    });


    //-------------------------------------------------------------------


    // 2EME METHODE, POUR LES LISTES DÉROULANTES PAR EXEMPLE, LA METHODE CHANGE


    $('#actionslist button').change(function(e) {

        console.log('hey');
        var selection = $(this).val();
        // récupère la valeur de l'option sélectionné
        console.log(selection);

        //si je veux supprimer
        if (selection == "supprimer") {

            // boucle en jquery : pour chaque bouton coché (each())
            $('.listComments :checked').each(function (index) {
                console.log($(this));

                var elt = $(this);

                // envoyer une requête ajax de suppression
                // pour chaque film coché
                $.ajax({
                    url: elt.attr('data-url')
                }).done(function () {
                    elt.parents('tr').fadeOut('slow');
                });

            });
        }
    });



    $('form#addcomment').submit(function(e){
        e.preventDefault();

        var elt = $(this);

        console.log(elt);
        console.log(elt.attr('action'));
        console.log(elt.serialize());

        $.ajax({
            url: elt.attr('action'),
            method: "POST",             // Méthode d'envoi de ma requête
            data: elt.serialize()       // data: envoyezr des données
        }).done(function(data){
            console.log(data.reponse);
            var html = '<li>Moi: ' + elt.find('textarea').val() + '</li>';
            elt.parents('#content-wrapper').find('ul:last').append(html);
            elt.find('textarea').val(" ");
        });
        console.log('coucou');
    });





    // AJOUTER UN FILM EN AJAX, LA DIV DISPARAIT A L'AJOUT


    $('form#addMovie').submit(function (e) {
        e.preventDefault();
        console.log('Mon evenement!');

        var elt = $(this);
        //
        //console.log(elt);
        //console.log(elt.attr('action'));
        //console.log(elt.serialize());


        $.ajax({
            url: elt.attr('action'),
            method: "POST", // Methode d'envoi de ma requete
            data: elt.serialize()
            // data: envoyer des données
        }).done(function () {
            //elt.parents('.panel').fadeOut('slow');
            $.growl.notice({title: "Bravo!", message: "Le film a été ajouté", duration: 7000});
            elt.find('input[name="title"]').val(" ");
            elt.find('input[name="categories"]').val(" ");
            elt.find('textarea').val(" ");


        });

    });





//--------------------------------------------------------------------------------------------------------
//           supprimer tache dans welcome advanced
//--------------------------------------------------------------------------------------------------------


    $('form#deleteTasks').submit(function (e) {
        e.preventDefault();

        var elt = $(this);
        console.log(elt);
        console.log(elt.attr('action'));
        console.log(elt.serialize());


        $.ajax({
            url: elt.attr('action'),
            method: "GET",              // Méthode d'envoi de ma requête
            data: elt.serialize()       // data: envoyezr des données
        }).done(function () {
            $.growl.notice({message: "Les taches ont été supprimés", duration: 7000});

        });


    });


//--------------------------------------------------------------------------------------------------------
//           MOVIES LIKED / DISLIKED
//--------------------------------------------------------------------------------------------------------


    $('a.moviesLiked, a.commentsLiked ').click(function (e) {
        e.preventDefault();     // --> annule l'évenement href de mes liens
        console.log('vous avez cliquez dessus.');

        // Je récupère le lien sur lequel j'ai cliqué
        var elt = $(this);

        // Module Ajax
        $.ajax({
            url: elt.attr('href')   // Url de mon href du lien sur lequel j'ai cliqué
        }).done(function () {
            if (elt.find('i').hasClass('fa fa-heart-o fa-2x')){
                elt.find('i').attr('class','fa fa-heart fa-2x');
            } else {
                elt.find('i').attr('class', 'fa fa-heart-o fa-2x');
            }


        });


    });


});
//# sourceMappingURL=all.js.map