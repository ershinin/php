<template>
  <div class="card">
    <h3>Название: {{ object.title }}</h3>
    <span>Цена: {{ object.price }}</span>
    <p>Описание: {{ object.description }}</p>
    <img v-if="loaded" :src="require(`../../images/${object.image}`)" :alt="object.image"/>
  </div>
</template>

<script>
export default {
  name: 'Cake',
  data() {
    return {
      object: {},
      loaded: false
    }
  },
  mounted() {
    fetch('/cakes?id=' + this.$route.params.id)
        .then(response => response.json())
        .then(json => {
          this.object = json;
          this.loaded = true;
        })
  }
}
</script>

<style scoped>

</style>