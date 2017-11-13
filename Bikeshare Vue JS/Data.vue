<template>
    <div class="col-md-4">
        <select v-model="selectedStation" @change="getDetail(selectedStation)">
            <option v-for="station in stationArray" value="station">
                {{station.address}}
            </option>
        </select>
        <div class="station-card"> <!-- new class "station" -->
            <div class="card-block" onchange="emitDetail(this)">
              <h4 class="card-title">{{selectedStation.address}}</h4>
              <div>
                  <p><strong>Bikes: </strong>{{bikes}}</p>
                  <p><strong>Docks: </strong>{{docks}}</p>
              </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:["stationArray"],
        data () {
            return {
                statusArray: [],
                bikes: 0,
                docks: 0,
            }
        },
        methods: {
            // 7164 Ryerson
            // 7246 Trinity Bellwoods
            fetchStatus() {
                fetch("https://tor.publicbikesystem.net/ube/gbfs/v1/en/station_status", {
                method: "GET"
              })
                .then(response => response.json())
                .then(json => this.statusArray = json.data.stations)
            },
            getDetail(station) {
                stn = this.statusArray.filter((status) => status.station_id == station.station_id)
                this.bikes = stn.num_bikes_available
                this.docks = stn.num_docks_available
            },
            emitDetail() {
                this.$emit("update", this.bikes, this.docks)
            }
        }
    }
</script>