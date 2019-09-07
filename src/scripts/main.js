const loadData = (target, add) => {
    if(add) {
        fetch('/assets/data/' + target + '.geojson')
        .then(response => response.json())
        .then(data => {
                // var feats = [];
                // for (var i = 0; i < data.features.length; i++) {
                //     var dataJson = {
                //         type: 'Feature',
                //         geometry: data.features[i].geometry
                //     };
                //     feats.push(dataJson);
                // }

                const dataSource = map.getSource(target + '-data');
                if(!dataSource) {
                    map.addSource(target+'-data', {
                        type: 'geojson',
                        data: data
                    });
                }

                // map.loadImage('../img/school.png', function(error, image) {
                //     if (error) throw error;
                //     map.addImage('school', image);

                const dataLayer = map.getLayer(target + '-layer');
                if(!dataLayer) {

                    map.addLayer({
                        'id': target + '-layer',
                        'type': 'fill',
                        'source': target + '-data',
                        // 'layout': {
                        //     'icon-image': 'school'
                        // },
                        'paint': {
                            'fill-color': {
                                type: 'categorical',
                                property: 'G18',
                                stops: [
                                    ['PT-MORENA-PES', '#F00'],
                                    ['PRI', '#0f0'],
                                    ['PAN-PRD-MC', '#00f'],
                                    ['MORENA', '#000']
                                ]
                            },
                            'fill-outline-color': '#fff',
                            'fill-opacity': 0.6
                        },
                    });

                    map.on('click', target + '-layer', function(e) {
                        var description = '<h4>' + e.features[0].properties.CABECERA + '</h4>' +
                            '<p><strong>Gobernado por:</strong>' + e.features[0].properties.G18 + '</p>';
                        new mapboxgl.Popup()
                            .setLngLat(e.lngLat)
                            .setHTML(description)
                            .addTo(map);
                    });

                    // map.on('click', 'escuelas-layer', function(e) {
                    //     var coordinates = e.features[0].geometry.coordinates.slice();
                    //     var description = '<h4>' + e.features[0].properties.NOMSERV + '</h4>' +
                    //         '<p>' + e.features[0].properties.GEOGRAFICO + ' ' + e.features[0].properties.TIPO + ' ' + e.features[0].properties.AMBITO + '</p>' +
                    //         '<em>Estado: ' + e.features[0].properties.CONDICION + '</em>';

                    //     while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                    //         coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                    //     }

                    //     new mapboxgl.Popup()
                    //         .setLngLat(coordinates)
                    //         .setHTML(description)
                    //         .addTo(map);
                    // });

                    map.on('mouseenter', 'ganadores-layer', function() {
                        map.getCanvas().style.cursor = 'pointer';
                    });

                    map.on('mouseleave', 'ganadores-layer', function() {
                        map.getCanvas().style.cursor = '';
                    });
                } else {
                    map.setLayoutProperty(target + '-layer', 'visibility', 'visible');
                }
        });
    } else {
        // console.log('Ocultar capa: ' + target);
        map.setLayoutProperty(target + '-layer', 'visibility', 'none');
    }
};