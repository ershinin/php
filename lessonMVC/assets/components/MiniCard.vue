<template>
  <div class="card">
    <h3>Название: {{ object.title }}</h3>
    <span id="price">Цена: {{ object.price }}</span>
    <img :src="require(`../../images/${object.image}`)" :alt="object.image"/>
    <router-link :to="'/cakes/' + object.id">Подробнее</router-link>
  </div>
</template>

<script>
export default {
  props: {
    object: Object,
  }
}
</script>

<style scoped>

</style>