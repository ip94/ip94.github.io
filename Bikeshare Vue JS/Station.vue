<template>
    <div class="col-*-6">
        <h3>From</h3>
        <Data v-bind:stationArray="stationArray" v-on:update="updateBikes('update', a, b)"/>
        <!-- v-on shorthand = @ -->
    </div>
    <div class="col-*-6">
        <h3>To</h3>
        <Data v-bind:stationArray="stationArray" v-on:update="updateDocks"/>
    </div>
    <div>
        <p v-if="bikesFrom == 0 or docksTo == 0">
            Maybe choose from a nearby station...
        </p>
        <p v-else-if="bikesFrom == 1">
            Not many bikes left. Gotta hurry up!
        </p>
        <p v-else-if="docksTo == 1">
            Hurry and get your butt there!
        </p>
        <p v-else>
            Let's get going!
        </p>
    </div>
</template>

<script>
    import Data from './Data.vue'
    export default {
        data () {
            return {
                stationArray: [],
                bikesFrom: 0,
                docksTo: 0
            }
        },
        methods: {
            fetchStationNames() {
              fetch("https://tor.publicbikesystem.net/ube/gbfs/v1/en/station_information", {
                method: "GET"
              })
                .then(response => response.json())
                .then(json => this.stationArray = json.data.stations)
            },
            updateBikes() {
                this.bikesFrom = a
            },
            updateDocks() {
                this.docksTo = b
            }
        },
        created () {
            fetchStationNames()
        },
        components: {
            Data
        }
    }
</script>