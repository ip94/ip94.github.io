<template>
<div id="app">
  <h3>Bike(whe)re<br><small>Can you get there?</small></h3>
  <Station/>
</div>
</template>

<script>
    import Station from "/component/Station.vue"
    export default {
      name: 'app',
      components: {
        Station
      }
    }
</script>