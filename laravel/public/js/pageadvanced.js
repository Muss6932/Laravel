$(document).ready(function () {
    console.log("ready!");

var latlng = new google.maps.LatLng(48.8326563, 2.3859320);
var options = {
    center: latlng,
    zoom: 12,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};

//carte se créer et stocker dans la variable carte
var carte = new google.maps.Map(document.getElementById("map"), options);




    $('.cinemap').each(function(){

        var title = $(this).attr('data-title');
        var position = $(this).attr('data-adresse');
        var nombresession = $(this).attr('data-session');

        var geocoder = new google.maps.Geocoder();

        // Infobulle
        var contentString = '<div id="content">' +
            '<div id="siteNotice">' +
            '</div>' +
            '<h1 id="firstHeading" class="firstHeading">' + title + '</h1>' +
            '<div id="bodyContent">' +
            '<p><i> Prochaines séances : </i><b>' + nombresession + '</b> films prochainement dans ce cinéma</p>' +
            '<p>Adresse : ' + position +
            '</p>' +
            '</div>' ;

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        // Affichage marker
        geocoder.geocode({'address': position}, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                carte.setCenter(results[0].geometry.location);

                var marker = new google.maps.Marker({
                    map: carte,
                    position: results[0].geometry.location
                });

                marker.addListener('click', function () {
                    infowindow.open(carte, marker);
                });

            } else {
                //alert('Erreur de localisation : ' + status);
            }
        });

    });








//var contentString = '<div id="content">' +
//    '<div id="siteNotice">' +
//    '</div>' +
//    '<h1 id="firstHeading" class="firstHeading">3WA</h1>' +
//    '<div id="bodyContent">' +
//    '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
//    'sandstone rock formation in the southern part of the ' +
//    'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) ' +
//    'south west of the nearest large town, Alice Springs; 450&#160;km ' +
//    '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major ' +
//    'features of the Uluru - Kata Tjuta National Park. Uluru is ' +
//    'sacred to the Pitjantjatjara and Yankunytjatjara, the ' +
//    'Aboriginal people of the area. It has many springs, waterholes, ' +
//    'rock caves and ancient paintings. Uluru is listed as a World ' +
//    'Heritage Site.</p>' +
//    '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
//    'https://en.wikipedia.org/w/index.php?title=Uluru</a> ' +
//    '(last visited June 22, 2009).</p>' +
//    '</div>' +
//    '</div>';
//
////créer une window
//var infowindow = new google.maps.InfoWindow({
//    content: contentString //contenu de la fenetre
//});
//
////jecoute le clique du marqueur
//marqueur.addListener('click', function () {
//    //ma windows s'ouvre sur ma carte et plus précisement sur mon marqueur
//    infowindow.open(carte, marqueur);
//});













////geocoder une adresse
//var address = "27 lotissement pascal 34570 Montarnaud";
//
//var geocoder = new google.maps.Geocoder();
//
//geocoder.geocode({'address': address}, function (results, status) {
//    if (status === google.maps.GeocoderStatus.OK) {
//
//        //je modifie son centre
//        carte.setCenter(results[0].geometry.location);
//
//        //creation du marqueur
//        var marker13 = new google.maps.Marker({
//            map: carte,
//            position: results[0].geometry.location
//        });
//
//    } else {
//        alert('Geocode was not successful for the following reason: ' + status);
//    }
//});



///****************Nouveau code****************/

// To add the marker to the map, call setMap();
//marker.setMap(map);

//ne pas oublier de rendre le marqueur "déplaçable"
//marqueur.setDraggable(true);


//google.maps.event.addListener(marqueur, 'dragend', function(event) {
//    //message d'alerte affichant la nouvelle position du marqueur
//    //alert("La nouvelle coordonnée du marqueur est : "+event.latLng);
//});


});

$(document).ready(function () {


init.push(function () {




// -------- GRAPH ACTEUR PAR CITY


    var actorpercity = [];

    $('actorpercity').each(function () {

        var tablea = {city: $(this).attr('data-city'), nombre: $(this).attr('data-count')};

        actorpercity.push(tablea);

        return actorpercity;
    });

    //console.log(actorpercity);

    Morris.Bar({
        element: 'hero-bar',
        data: actorpercity,
        xkey: 'city',
        ykeys: ['nombre'],
        labels: ["Nombre d'acteurs"],
        barRatio: 0.4,
        xLabelAngle: 35,
        hideHover: 'auto',
        barColors: PixelAdmin.settings.consts.COLORS,
        gridLineColor: '#cfcfcf',
        resize: true
    });


// -------- GRAPH TRANCHE D'AGE

    var ageinf25 = [];
    var age2535 = [];
    var age3545 = [];
    var age4560 = [];
    var agesup60 = [];


    $('actorage').each(function () {
        var age = parseInt($(this).attr('data-age'));

        if (age < 26) {
            ageinf25.push(age);
        } else if (age > 25 && age < 36) {
            age2535.push(age);
        } else if (age > 35 && age < 46) {
            age3545.push(age);
        } else if (age > 45 && age < 61) {
            age4560.push(age);
        } else if (age > 60) {
            agesup60.push(age);
        }
    });


    var ages = ageinf25.length + age2535.length + age3545.length + age4560.length + agesup60.length;


    var pourcentageageinf25 = Math.round(ageinf25.length * 100 / ages);
    var pourcentageage2535 = Math.round(age2535.length * 100 / ages);
    var pourcentageage3545 = Math.round(age3545.length * 100 / ages);
    var pourcentageage4560 = Math.round(age4560.length * 100 / ages);
    var pourcentageagesup60 = Math.round(agesup60.length * 100 / ages);


    var doughnutChartData = [{
        label: "Moins de 25 ans", data: pourcentageageinf25
    }, {
        label: "Entre 25 et 35 ans", data: pourcentageage2535
    }, {
        label: "Entre 35 et 45 ans", data: pourcentageage3545
    }, {
        label: "Entre 45 et 65 ans", data: pourcentageage4560
    }, {
        label: "Plus de 60 ans", data: pourcentageagesup60
    }];

    // Init Chart
    $('#jq-flot-pie').pixelPlot(doughnutChartData, {
        series: {
            pie: {
                show: true,
                radius: 1,
                innerRadius: 0.5,
                label: {
                    show: true,
                    radius: 3 / 4,
                    formatter: function (label, series) {
                        return '<div style="font-size:14px;text-align:center;padding:2px;color:white;">' + Math.round(series.percent) + '%</div>';
                    },
                    background: {opacity: 0}
                }
            }
        }
    }, {
        height: 205
    });


// -------- GRAPH RÉPARTITION DES FILMS PAR LES 4 MEILLEURS RÉALISATEURS


    var bestDirectors = [];

    $('bestdirectors').each(function () {
        var name = $(this).attr('data-name');
        bestDirectors.push(name);
    });

    var firstdirector = [];
    var seconddirector = [];
    var thirddirector = [];
    var fourthdirector = [];

    $('bestdirectorsmovies').each(function () {
        var name = $(this).attr('data-name');
        var datesortie = parseInt($(this).attr('data-datesortie').substring(0, 4));

        if (name == bestDirectors[0]) {
            firstdirector.push(datesortie);
        } else if (name == bestDirectors[1]) {
            seconddirector.push(datesortie);
        } else if (name == bestDirectors[2]) {
            thirddirector.push(datesortie);
        } else if (name == bestDirectors[3]) {
            fourthdirector.push(datesortie);
        }
    });

    //console.log(bestDirectors);
    //console.log(firstdirector);
    //console.log(seconddirector);
    //console.log(thirddirector);
    //console.log(fourthdirector);


// pour le premier réalisateur : ------------------------------------------------------------------------------

    var a = [];
    var b = [];
    var c = [];
    var d = [];
    var e = [];
    var f = [];

    for (var i = 0; i <= firstdirector.length; i++) {
        if (firstdirector[i] < 2000) {
            a.push(firstdirector[i]);
        } else if (firstdirector[i] > 1999 && firstdirector[i] < 2004) {
            b.push(firstdirector[i]);
        } else if (firstdirector[i] > 2003 && firstdirector[i] < 2007) {
            c.push(firstdirector[i]);
        } else if (firstdirector[i] > 2006 && firstdirector[i] < 2010) {
            d.push(firstdirector[i]);
        } else if (firstdirector[i] > 2009 && firstdirector[i] < 2013) {
            e.push(firstdirector[i]);
        } else if (firstdirector[i] > 2012) {
            f.push(firstdirector[i]);
        }
    }

    var first_a = a.length;
    var first_b = b.length;
    var first_c = c.length;
    var first_d = d.length;
    var first_e = e.length;
    var first_f = f.length;

    //console.log(first_a, first_b, first_c, first_d, first_e, first_f);

// pour le deuxième réalisateur : ------------------------------------------------------------------------------

    var a = [];
    var b = [];
    var c = [];
    var d = [];
    var e = [];
    var f = [];

    for (var i = 0; i <= seconddirector.length; i++) {
        if (seconddirector[i] < 2000) {
            a.push(seconddirector[i]);
        } else if (seconddirector[i] > 1999 && seconddirector[i] < 2004) {
            b.push(seconddirector[i]);
        } else if (seconddirector[i] > 2003 && seconddirector[i] < 2007) {
            c.push(seconddirector[i]);
        } else if (seconddirector[i] > 2006 && seconddirector[i] < 2010) {
            d.push(seconddirector[i]);
        } else if (seconddirector[i] > 2009 && seconddirector[i] < 2013) {
            e.push(seconddirector[i]);
        } else if (seconddirector[i] > 2012) {
            f.push(seconddirector[i]);
        }
    }

    var second_a = a.length;
    var second_b = b.length;
    var second_c = c.length;
    var second_d = d.length;
    var second_e = e.length;
    var second_f = f.length;

    //console.log(second_a, second_b, second_c, second_d, second_e, second_f);

// pour le troisième réalisateur : ------------------------------------------------------------------------------

    var a = [];
    var b = [];
    var c = [];
    var d = [];
    var e = [];
    var f = [];

    for (var i = 0; i <= thirddirector.length; i++) {
        if (thirddirector[i] < 2000) {
            a.push(thirddirector[i]);
        } else if (thirddirector[i] > 1999 && thirddirector[i] < 2004) {
            b.push(thirddirector[i]);
        } else if (thirddirector[i] > 2003 && thirddirector[i] < 2007) {
            c.push(thirddirector[i]);
        } else if (thirddirector[i] > 2006 && thirddirector[i] < 2010) {
            d.push(thirddirector[i]);
        } else if (thirddirector[i] > 2009 && thirddirector[i] < 2013) {
            e.push(thirddirector[i]);
        } else if (thirddirector[i] > 2012) {
            f.push(thirddirector[i]);
        }
    }

    var third_a = a.length;
    var third_b = b.length;
    var third_c = c.length;
    var third_d = d.length;
    var third_e = e.length;
    var third_f = f.length;

    //console.log(third_a, third_b, third_c, third_d, third_e, third_f);

// pour le quatrième réalisateur : ------------------------------------------------------------------------------

    var a = [];
    var b = [];
    var c = [];
    var d = [];
    var e = [];
    var f = [];

    for (var i = 0; i <= fourthdirector.length; i++) {
        if (fourthdirector[i] < 2000) {
            a.push(fourthdirector[i]);
        } else if (fourthdirector[i] > 1999 && fourthdirector[i] < 2004) {
            b.push(fourthdirector[i]);
        } else if (fourthdirector[i] > 2003 && fourthdirector[i] < 2007) {
            c.push(fourthdirector[i]);
        } else if (fourthdirector[i] > 2006 && fourthdirector[i] < 2010) {
            d.push(fourthdirector[i]);
        } else if (fourthdirector[i] > 2009 && fourthdirector[i] < 2013) {
            e.push(fourthdirector[i]);
        } else if (fourthdirector[i] > 2012) {
            f.push(fourthdirector[i]);
        }
    }

    var fourth_a = a.length;
    var fourth_b = b.length;
    var fourth_c = c.length;
    var fourth_d = d.length;
    var fourth_e = e.length;
    var fourth_f = f.length;

    //console.log(fourth_a, fourth_b, fourth_c, fourth_d, fourth_e, fourth_f);


//  ------------------------------------------------------------------------------
//    var tab = [];
//    for (i = 1; i < 5; i = i + 3) {
//        var obj = {period: '200' + i, a: 50 * i + 5, b: 30 * i + 3, c: 20 * i + 4, d: 10 * i + 2};
//        console.log(obj);
//
//        tab.push(obj);
//    }
//
//    console.log(tab);
//    //{period: '2014', a: 20, b: 25, c: 30, d: 15},
//    //{period: '2012', a: first_e, b: second_e, c: third_e, d: fourth_e},
//    //{period: '2009', a: first_d, b: second_d, c: third_d, d: fourth_d},
//    //{period: '2006', a: first_c, b: second_c, c: third_c, d: fourth_c},
//    //{period: '2003', a: first_b, b: second_b, c: third_b, d: fourth_b},
//    //{period: '2000', a: first_a, b: second_a, c: third_a, d: fourth_a}
//
//    Morris.Area({
//        element: 'hero-area',
//        data: tab,
//        xkey: 'period',
//        ykeys: ['a', 'b', 'c', 'd'],
//        labels: [bestDirectors[0], bestDirectors[1], bestDirectors[2], bestDirectors[3]],
//        hideHover: 'auto',
//        lineColors: PixelAdmin.settings.consts.COLORS,
//        fillOpacity: 0.3,
//        behaveLikeLine: true,
//        lineWidth: 1,
//        pointSize: 4,
//        gridLineColor: '#cfcfcf',
//        resize: true
//    });
//  ------------------------------------------------------------------------------

    Morris.Area({
        element: 'hero-area',
        data: [
            {period: '2015', a: first_f, b: second_f, c: third_f, d: fourth_f},
            {period: '2012', a: first_e, b: second_e, c: third_e, d: fourth_e},
            {period: '2009', a: first_d, b: second_d, c: third_d, d: fourth_d},
            {period: '2006', a: first_c, b: second_c, c: third_c, d: fourth_c},
            {period: '2003', a: first_b, b: second_b, c: third_b, d: fourth_b},
            {period: '2000', a: first_a, b: second_a, c: third_a, d: fourth_a}
        ],
        xkey: 'period',
        ykeys: ['a', 'b', 'c', 'd'],
        labels: [bestDirectors[0], bestDirectors[1], bestDirectors[2], bestDirectors[3]],
        hideHover: 'auto',
        lineColors: PixelAdmin.settings.consts.COLORS,
        fillOpacity: 0.3,
        behaveLikeLine: true,
        lineWidth: 1,
        pointSize: 4,
        gridLineColor: '#cfcfcf',
        resize: true
    });


});


});

//# sourceMappingURL=pageadvanced.js.map