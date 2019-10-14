const loadData = (target, add) => {
    const capaUrl = '/assets/data/fill/' + target + '.geojson';
    console.log(capaUrl);
    if(add) {
        fetch(capaUrl)
        .then(response => response.json())
        .then(data => {
            const dataSource = map.getSource(target + '-data');
            if(!dataSource) {
                map.addSource(target+'-data', {
                    type: 'geojson',
                    data: data
                });
            }

            const dataLayer = map.getLayer(target + '-layer');
            if(!dataLayer) {

                let tipo = capaUrl.substr(13, 4);

                map.addLayer({
                    'id': target + '-layer',
                    'type': tipo,
                    'source': target + '-data',
                    'paint': {
                        "fill-color": {
                            property: 'bgColor',
                            type: 'identity'
                        },
                        'fill-outline-color': '#fff',
                        'fill-opacity': 0.9
                    },
                });

                map.on('click', target + '-layer', function(e) {
                    var description = 
                    '<p><strong>Entidad: </strong>' + e.features[0].properties.Entidad + '</p>' +
                    '<p><strong>Distrito Local: </strong>' + e.features[0].properties.Distrito_L + '</p>' +
                    '<p><strong>Municipio: </strong>' + e.features[0].properties.Municipio+ '</p>' +
                    '<p><strong>Partido Ganador: </strong>' + e.features[0].properties.G_1999 + '</p>' +
                    '<p><strong>Candidato: </strong>' + e.features[0].properties.Candidato + '</p>';
                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(description)
                        .addTo(map);
                });

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
        map.setLayoutProperty(target + '-layer', 'visibility', 'none');
    }
};