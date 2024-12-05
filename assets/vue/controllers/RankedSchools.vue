<template>
    <div class="filters">
        <h4>Filteri</h4>
        <div class="country-filter">
            <h5>Država</h5>
            <label for="Srbija"><input type="checkbox" name="Srbija" id="serbia"> Srbija</label>
            <label for="Hrvatska"><input type="checkbox" name="Hrvatska" id="croatia"> Hrvatska</label>
            <label for="Slovenija"><input type="checkbox" name="Slovenija" id="Slovenia"> Slovenija</label>
            <label for="Bosna"><input type="checkbox" name="Bosna" id="bosnia"> Bosna i Hercegovina</label>
            <label for="Montenegro"><input type="checkbox" name="Montenegro" id="montenegro"> Crna Gora</label>
            <label for="Makedonija"><input type="checkbox" name="Makedonija" id="macedonia"> Makedonija</label>
        </div>
    </div>
    <div class="colleges-scroll">
        <div class="college" v-for="(school, i) in schools">
            <div class="college">
                <div class="college-container">
                    <h1>{{ school.name }}</h1>
                    <h4>{{ i+1 }}# Na rang listi fakulteta</h4>
                </div>
                <Map width="300px" height="200px" :center="{lat: school.lat, lng: school.lng}" :zoom="18"/>
            </div>
        </div>
    </div>
</template>

<script setup>
import Map from './Map.vue';

const { schools } = defineProps({
    schools: Array
});
</script>