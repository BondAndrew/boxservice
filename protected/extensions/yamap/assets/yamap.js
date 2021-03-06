/**
 * Created by andrewbondarenko on 30.10.14.
 */
/*
 * Yandex map javascript widget
 *
 * @author sergmoro1@ya.ru
 * @site: lisette.su
 * @ license: GPL
 *
 * @var yaMapPoints - array(
 * lat,lng - point coords
 * icon, header, body, footer - balloon options
 * color - place mark color, number[0..12]
 * )
 * @var yaMapParams - array(
 * width, height - map sizes in px
 * visible - should be a map displayed directly or on request
 * zoom - map scale
 * )
 */

ymaps.ready(init);
var map;
var collection;
var placemarkColor = [
    "twirl#lightblueStretchyIcon", "twirl#violetStretchyIcon", "twirl#greenStretchyIcon",
    "twirl#redStretchyIcon", "twirl#yellowStretchyIcon",
    "twirl#darkblueStretchyIcon", "twirl#nightStretchyIcon",
    "twirl#greyStretchyIcon", "twirl#blueStretchyIcon",
    "twirl#orangeStretchyIcon", "twirl#darkorangeStretchyIcon",
    "twirl#pinkStretchyIcon", "twirl#whiteStretchyIcon"
];
function init() {
    if(yaMapPoints.length != 0) {
        var point=yaMapPoints[0];
// get map canvas
        var mc=document.getElementById('map_canvas');
// save visability
        var display=mc.style.display;
// show map canvas
        mc.style.display='block';
// set width and height
        mc.style.width=yaMapParams['width'];
        mc.style.height=yaMapParams['height'];
// make Yandex map and set needed controls
        map = new ymaps.Map ('map_canvas', {center: [point['lat'], point['lng']], zoom: yaMapParams['zoom'], controls: ['zoomControl', 'typeSelector']});

        for(var i=0;i<yaMapPoints.length;i++) {
            point=yaMapPoints[i];
            map.geoObjects.add(makePlacemark(point));
        }
// Добавляет метку на карту
        map.controls.add('smallZoomControl');
        map.controls.add('mapTools');
// make points collection

//        collection = new ymaps.GeoObjectCollection();
// place all defined points on a map
        map.geoObjects.add(map);
// all points should be visible on the map
        if(yaMapPoints.length>1)
            map.setBounds(map.getBounds());
// the map may be hidden and shown by request,
// for example by clicking on a ref
        if(yaMapParams['visible'])
            mc.style.display='block';
        else
        if(display=='none') mc.style.display='none';
    }
}
function makePlacemark(point) {
    newPlacemark = new ymaps.Placemark([point['lat'], point['lng']],
        {
            iconContent: point['icon'],
            balloonContentHeader: point['header'],
            balloonContentBody: '<em>' + point['body'] + '</em>',
            balloonContentFooter: point['footer']
        },
        {
            preset: placemarkColor[point['color'] !== undefined ? point['color'] : 0 ] //'twirl#blueStretchyIcon'
        });
    return newPlacemark;
}