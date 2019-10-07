const loadData = (target, add) => {
    const capaUrl = '/assets/data/fill/' + target + '.geojson';
    if(add) {
        fetch(capaUrl)
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

                    let tipo = capaUrl.substr(13, 4);

                    map.addLayer({
                        'id': target + '-layer',
                        'type': tipo,
                        'source': target + '-data',
                        // 'layout': {
                        //     'icon-image': 'school'
                        // },
                        'paint': {
                            'fill-color': {
                                type: 'categorical',
                                property: 'G_1999',
                                stops: [
                                    ['PRD-PT', '#F00'],
                                    ['PRI', '#0f0'],
                                    ['PAN-PVEM', '#00f'],
                                ]
                            },
                            'fill-outline-color': '#fff',
                            'fill-opacity': 0.6
                        },
                    });

                    map.on('click', target + '-layer', function(e) {
                        var description = '<h4 class="text-xl">' + e.features[0].properties.CABECERA_1 + '</h4>' +
                        '<p><strong>Gobernado por: </strong>' + e.features[0].properties.G_1999 + '</p>' +
                        '<p><strong>Coalición: </strong>' + e.features[0].properties.Coalicion + '</p>' +
                        '<p><strong>Candidato: </strong>' + e.features[0].properties.Candidato + '</p>';
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