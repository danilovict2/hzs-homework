<template>
    <div class="general-container">
        <Map width="1200px" height="500px" :zoom="18" :center="{ lat: school.lat, lng: school.lng }" />
        <div class="college-info">
            <h1>{{ school.name }}</h1>
        </div>
        <div class="website-description-container">
            <div class="college-website">
                <i class="fa-solid fa-globe fa-lg" style="color: gray;"></i><a href="#college-website">{{ school.website
                    }}</a>
            </div>
            <div class="college-grades">
                <div class="grades-container">
                    <div class="grade">
                        <div :class="'grade-' + ratings[0]">
                            {{ ratings[0].toUpperCase() }}
                        </div>
                        <h4>Akademska vrednost</h4>
                    </div>

                    <div class="grade">
                        <div :class="'grade-' + ratings[1]">
                            {{ ratings[1].toUpperCase() }}
                        </div>
                        <h4>Isplativost</h4>
                    </div>

                    <div class="grade">
                        <div :class="'grade-' + ratings[2]">
                            {{ ratings[2].toUpperCase() }}
                        </div>
                        <h4>Kampus</h4>
                    </div>
                </div>
                <div class="grades-container">
                    <div class="grade">
                        <div :class="'grade-' + ratings[3]">
                            {{ ratings[3].toUpperCase() }}
                        </div>
                        <h4>Lokacija</h4>
                    </div>
                    <div class="grade">
                        <div :class="'grade-' + ratings[4]">
                            {{ ratings[4].toUpperCase() }}
                        </div>
                        <h4>Sigurnost</h4>
                    </div>
                    <div class="grade">
                        <div :class="'grade-' + ratings[5]">
                            {{ ratings[5].toUpperCase() }}
                        </div>
                        <h4>Profesori</h4>
                    </div>
                </div>
                <div class="main-grade">
                    <h3>Ukupna ocena: </h3>
                    <div :class="'grade-' + ratings[6]">
                        {{ ratings[6].toUpperCase() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { ref } from 'vue';
import Map from './Map.vue';

const { school } = defineProps({
    school: Object
})

const ratings = ref([]);
const overall = ref(0);
for (let rating of Object.values(school.rating)) {
    if (rating >= 0 && rating <= 20) {
        ratings.value.push('f')
    } else if (rating > 20 && rating <= 40) {
        ratings.value.push('d')
    } else if (rating > 40 && rating <= 60) {
        ratings.value.push('c')
    } else if (rating > 60 && rating <= 80) {
        ratings.value.push('b')
    } else if (rating > 80 && rating <= 100) {
        ratings.value.push('a')
    }

    overall.value += rating;
}

overall.value /= Object.values(school.rating).length;
if (overall >= 0 && overall <= 20) {
    ratings.value.push('f')
} else if (overall > 20 && overall <= 40) {
    ratings.value.push('d')
} else if (overall > 40 && overall <= 60) {
    ratings.value.push('c')
} else if (overall > 60 && overall <= 80) {
    ratings.value.push('b')
} else if (overall > 80 && overall <= 100) {
    ratings.value.push('a')
}
</script>