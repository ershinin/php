<template>
  <mini-card v-for="cake in cakes" :key="cake.id" :object="cake"/>
</template>

<script>
import MiniCard from "../components/MiniCard";
export default {
  name: 'Cakes',
  components: {MiniCard},
  data() {
    return {
      cakes: []
    }
  },
  mounted() {
    fetch('/cakes')
        .then(response => response.json())
        .then(json => {
          this.cakes = json;
        })
  }
}
</script>

<style scoped>

</style>