<template>
    <TheNavbar />

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

    <div class="map-container">
        <div class="map"></div>
    </div>
</template>

<script setup>
import TheNavbar from '../components/TheNavbar.vue';
    
</script>
