<template>
  <form name="find" @submit.prevent="findCakes">
    <span>Условия для поиска: </span>
    <label>
      Цена от
      <input type="number"  v-model="priceFrom" >
      до
      <input type="number" v-model="priceTo">
    </label>
    <label>
      Название
      <input type="text" v-model="title">
    </label>
    <input type="submit" value="Найти">
    <span>{{ message }}</span>
  </form>
  <span>Результат:</span>
  <mini-card v-for="cake in cakes" :key="cake.id" :object="cake"/>
</template>

<script>
import MiniCard from "../components/MiniCard";
export default {
  name: 'FindCakes',
  components: {MiniCard},
  data() {
    return {
      cakes: [],
      priceFrom: 0,
      priceTo: 1000,
      title: '',
      message: ''
    }
  },
  methods: {
    findCakes() {
      if (this.priceFrom >= 0 && this.priceTo > 1) {
        fetch('/findCakes?priceFrom=' + this.priceFrom + '&priceTo=' + this.priceTo + '&title=' +this.title.trim())
            .then(response => response.json())
            .then(json => {
              this.message = '';
              this.cakes = json;
            })
      } else this.message = 'Некорректные условия поиска'

    }
  },
}
</script>

<style scoped>
form > label,
span {
  display: block;
}
</style>