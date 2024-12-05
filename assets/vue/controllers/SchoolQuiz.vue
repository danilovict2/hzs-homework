<template>
    <div class="container min-vh-100 d-flex justify-content-center align-items-center flex-column">
        <div v-if="stage === 1">
            <h3>Lokacija</h3>
            <h1>Gde zelite da idete u skolu?</h1>
            <h6>Dodajte drzave koje vas interesuju.</h6>
            <div v-for="(country, index) in countries" :key="index" class="mb-1">
                <input type="text" class="form-control" v-model="country.value" @input="onInput(index)"
                    placeholder="Unesite zemlju" />
                <ul class="list-group mt-2" v-if="country.filteredSuggestions">
                    <li v-for="(suggestion, idx) in country.filteredSuggestions" :key="idx"
                        class="list-group-item list-group-item-action" @click="selectSuggestion(index, suggestion)">
                        {{ suggestion }}
                    </li>
                </ul>
            </div>
        </div>
        <div v-if="stage === 2">
            <h3>Preferencije</h3>
            <h1>Sta vam je najbitnije?</h1>
            <h6>Za najbolje rezultate izaberite 3-5 prioriteta.</h6>
            <div class="row my-3">
                <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                    <div v-for="(item, index) in priorities.slice(0, 3)" :key="index" class="d-flex flex-column">
                        <label :for="item.label">{{ item.label }}</label>
                        <input type="range" min="1" max="100" v-model="item.value" :name="item.label" @change="canContinue = true"/>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                    <div v-for="(item, index) in priorities.slice(3)" :key="index" class="d-flex flex-column">
                        <label :for="item.label">{{ item.label }}</label>
                        <input type="range" min="1" max="100" v-model="item.value" :name="item.label" @change="canContinue = true" />
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-success" :disabled="!canContinue" @click="onClick">Nastavi</button>
        <p>Korak {{ stage }}/2</p>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';

const stage = ref(1);
const canContinue = ref(false);

const countries = ref([
    {
        value: '',
        filteredSuggestions: []
    }
]);

const priorities = ref([
    { label: 'Akademska vrednost:', value: 1, name: 'academicValue' },
    { label: 'Isplativost:', value: 1, name: 'value' },
    { label: 'Kampus:', value: 1, name: 'campus' },
    { label: 'Lokacija:', value: 1, name: 'location' },
    { label: 'Sigurnost:', value: 1, name: 'security' },
    { label: 'Profesori:', value: 1, name: 'professors' },
]);

const suggestions = [
    'Srbija',
    'Slovenija',
    'Hrvatska',
    // Placeholders => implement reading countries from database
];

const onInput = (index) => {
    const input = countries.value[index];
    input.filteredSuggestions = suggestions.filter(suggestion =>
        suggestion.toLowerCase().includes(input.value.toLowerCase())
    ).filter(suggestion =>
        !countries.value.some(inputField => inputField.value === suggestion)
    )
};

const selectSuggestion = (index, suggestion) => {
    countries.value[index].value = suggestion;
    countries.value[index].filteredSuggestions = [];
    canContinue.value = true;

    if (countries.value.length < suggestions.length) {
        countries.value.push({
            value: '',
            filteredSuggestions: []
        })
    }
};

const onClick = () => {
    stage.value++; 
    canContinue.value = false;
    if (stage.value == 3) {
        const data = new FormData();
        data.append('countries', JSON.stringify(countries.value));
        data.append('priorities', JSON.stringify(priorities.value));
        axios.post('', data, {
            headers: {
                "Content-Type": "multipart/form-data"
            }
        }).then(response => window.location = response.data);
    }
}
</script>
