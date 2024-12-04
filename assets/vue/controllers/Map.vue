<template>
    <div id="map" style="width: 100%;height: 50vh;" ref="mapDiv">

    </div>
</template>

<script setup>
import Feature from 'ol/Feature';
import Map from 'ol/Map';
import Point from 'ol/geom/Point';
import VectorSource from 'ol/source/Vector';
import View from 'ol/View';
import { Tile as TileLayer, Vector as VectorLayer } from 'ol/layer';
import 'ol/ol.css';
import { onMounted, useTemplateRef } from 'vue';
import Style from 'ol/style/Style';
import Icon from 'ol/style/Icon';
import { OSM } from 'ol/source';
import Text from 'ol/style/Text';
import Fill from 'ol/style/Fill';
import Stroke from 'ol/style/Stroke';

const { markerCoordinates } = defineProps({
    markerCoordinates: {
        type: Array,
        default: []
    }
})

const mapDiv = useTemplateRef('mapDiv')

onMounted(() => {
    const balkansCenter = { lat: 23.0, lng: 41.0 };

    const map = new Map({
        target: mapDiv.value,
        layers: [
            new TileLayer({
                source: new OSM()
            }),
        ],

        view: new View({
            zoom: 6,
            maxZoom: 18,
            center: [balkansCenter.lat, balkansCenter.lng],
            projection: "EPSG:4326",
            constrainResolution: true
        }),
    });

    const markers = [];
    for (const markerCoordinate of markerCoordinates) {
        const marker = new Feature({
            type: 'icon',
            geometry: new Point([markerCoordinate.lng, markerCoordinate.lat])
        });

        markers.push(marker);
    }

    const styles = {
        'icon': new Style({
            text: new Text({
                text: '\uf3c5',
                font: '900 18px "Font Awesome 6 Free"',
            })
        }),
    };

    const vectorLayer = new VectorLayer({
        source: new VectorSource({
            features: markers,
            transition: 0
        }),
        style: function (feature) {
            return styles[feature.get('type')];
        },
    });

    map.addLayer(vectorLayer);
})

</script>