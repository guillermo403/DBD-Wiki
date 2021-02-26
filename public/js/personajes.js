const request = require('request');
const requestPromise = require('request-promise');
const cheerio = require('cheerio');
const fs = require('fs');

let personajes = [];

(async() => {

    try {

        let response = await requestPromise("https://w.atwiki.jp/deadbydaylight/pages/12.html");
        let $ = cheerio.load(response);

        $('div#wikibody > table > tbody > tr').each(function() {
            let nombre = $(this).find('td:nth-child(2)').text();
            let imagen = $(this).find('td:nth-child(1) > picture > img').attr('data-original');

            var start_pos = nombre.indexOf('(') + 1;
            var end_pos = nombre.indexOf(')',start_pos);
            var nombreEsp = nombre.substring(start_pos, end_pos);

            personajes.push({
                Nombre: nombreEsp,
                Imagen: imagen,
                Tipo: "Superviviente"
            });
        });

        response = await requestPromise("https://w.atwiki.jp/deadbydaylight/pages/22.html");
        $ = cheerio.load(response);

        $('#wikibody > table:nth-child(7) > tbody:nth-child(2) > tr').each(function() {
            let nombre = $(this).find('td:nth-child(2)').text();
            let imagen = $(this).find('td > picture:nth-child(1) > img').attr('data-original');

            var start_pos = nombre.indexOf('(') + 1;
            var end_pos = nombre.indexOf(')',start_pos);
            var nombreEsp = nombre.substring(start_pos, end_pos);

            personajes.push({
                Nombre: nombreEsp,
                Imagen: imagen,
                Tipo: "Asesino"

            });
        });

        let personajes_json = JSON.stringify(personajes);
        fs.writeFileSync('personajes.json', personajes_json);


    } catch (e) {
        console.error(e);
    }

})();

