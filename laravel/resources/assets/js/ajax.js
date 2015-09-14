$(document).ready(function(){

    console.log('Blablabla');


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





});