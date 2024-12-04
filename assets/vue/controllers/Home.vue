<template>
    <div class="first-section">
        <div class="students-image">
            <img src="/img/students.jpg" alt="students">
        </div>
        <div class="find-colledge">
            <h3>PRONAĐI FAKULTET</h3>
            <h2><b>KOJI TI NAJVIŠE ODGOVARA</b></h2>
            <hr>
            <p>
                Pronalaženje pravog fakulteta za tebe ne treba biti teško. Širom Balkana, olakšavamo otkrivanje i povezivanje sa najboljim fakultetima za 
                <a href="#">
                    <b>tebe</b>
                </a>.
            </p>
        </div>
    </div>

    <Map :markerCoordinates="markers"></Map>
</template>

<script setup>
import Coordinate from '../utils/Coordinate';
import Map from './Map.vue';
    
const markers = [new Coordinate(34.0522, -118.2437), new Coordinate(48.8566, 2.3522)];
</script>
