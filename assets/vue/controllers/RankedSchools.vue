<template>
    <div class="colleges-scroll">
        <div class="college" v-for="(school, i) in schools">
            <a :href="'/school/' + school.id">
                <div class="college">
                    <div class="college-container">
                        <h1>{{ school.name }}</h1>
                        <h4>{{ i + 1 }}# Na rang listi fakulteta</h4>
                    </div>
                    <Map width="300px" height="200px" :center="{ lat: school.lat, lng: school.lng }" :zoom="18" />
                </div>
            </a>
        </div>
    </div>
</template>

<script setup>
import Map from './Map.vue';

const { schools } = defineProps({
    schools: Array
});
</script>

<style scoped>
a {
    text-decoration: none;
}
</style>