<template>
    <div id="map" :style="{width: width, height: height}" ref="mapDiv">

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
import { OSM } from 'ol/source';
import Text from 'ol/style/Text';


const { markerCoordinates, center, zoom, width, height } = defineProps({
    markerCoordinates: {
        type: Array,
        default: []
    },
    center: {
        type: Object,
        // Center of the balkans
        default: {
            lat: 23.0,
            lng: 41.0
        }
    },
    zoom: {
        type: Number,
        default: 6
    },
    width: {
        type: String,
        default: '100%'
    },
    height: {
        type: String,
        default: '50vh'
    },
})

const mapDiv = useTemplateRef('mapDiv')

onMounted(() => {
    const map = new Map({
        target: mapDiv.value,
        layers: [
            new TileLayer({
                source: new OSM()
            }),
        ],

        view: new View({
            zoom: zoom,
            maxZoom: 18,
            center: [center.lat, center.lng],
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