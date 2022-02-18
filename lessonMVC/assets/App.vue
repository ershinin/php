<template>
  <div id="navigation">
    <router-link to="/cakes">Все торты</router-link>
    <router-link to="/addCake">Добавить торт</router-link>
    <router-link to="/findCakes">Поиск тортов</router-link>
  </div>
  <router-view/>
</template>


<style>
#navigation a {
  background-color: darkgray;
  border-radius: 3px;
  margin: 10px;
  padding: 5px;
  display: inline-block;
}
.card {
  background-color: darkgray;
  border-radius: 3px;
  margin: 10px;
  display: inline-block;
}
.card > img {
  width: 100px;
  object-fit: cover;
}
.card > a {
  display: block;
}
.card > #price {
  display: block;
}
</style>