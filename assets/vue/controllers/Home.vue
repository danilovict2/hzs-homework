<template>
<<<<<<< HEAD
    <div class="first-section">
=======
    <TheNavbar />

    <div class="first-section shadow-lg">
>>>>>>> refs/remotes/origin/frontend
        <div class="students-image">
            <img src="/img/students.jpg" alt="students">
        </div>
        <div class="find-colledge md fs-6">
            <h3>PRONAĐI FAKULTET</h3>
            <h2><b>KOJI TI NAJVIŠE ODGOVARA</b></h2>
            <hr>
            <p class="">
                Pronalaženje pravog fakulteta za tebe ne treba biti teško. Zato na području bivše Jugoslavije, olakšavamo otkrivanje i povezivanje sa najboljim fakultetima za 
                <a href="#">
                    <b>tebe</b>
                </a>.
            </p>
        </div>
    </div>

<<<<<<< HEAD
    <Map :markerCoordinates="markers"></Map>
=======
    <div class="between-section">
        <h2>Tvoja pretraga je jedinstvena <br/> Baš kao i ti.</h2>
        <p>
            Personalizujemo tvoju pretragu fakulteta prema tvojim interesovanjima <br/> kako bismo ti olakšali izbor u odabiru pravog fakulteta za tebe. 
            <br/>
            Proveri lokacije popularnih fakulteta na 
            <a href="#map"><b>mapi</b>.</a>
        </p>
    </div>

    <div class="second-section shadow-lg md fs-6">
        <div class="find-colledge">
            <h4 class="fw-light">ODABERI FAKULTET</h4>
            <h2><b>SVE ŠTO TI JE POTREBNO DA ODLUČIŠ</b></h2>
            <hr>
            <p>
                Sa svim potrebnim informacijama o svim fakultetima na području bivše Jugoslavije, sa lakoćom ćeš uporediti različite fakultete i odabrati onaj koji ti najviše odgovara.
            </p>
        </div>
        <div class="students-image">
            <img src="/img/graduation.jpg" alt="students">
        </div>
    </div>
    
    <div class="map-container">
        <div class="map"></div>
    </div>
    <a id="map"></a>
>>>>>>> refs/remotes/origin/frontend
</template>

<script setup>
import Coordinate from '../utils/Coordinate';
import Map from './Map.vue';
    
const markers = [new Coordinate(34.0522, -118.2437), new Coordinate(48.8566, 2.3522)];
</script>
