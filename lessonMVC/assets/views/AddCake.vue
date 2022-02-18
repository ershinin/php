<template>
  <form method="post" name="addCake" enctype="multipart/form-data" @submit="addCake">
    <input type="text" name="title" placeholder="введите название торта" required>
    <input type="number" name="price" placeholder="введите цену" required>
    <input type="text" name="description" placeholder="введите описание" required>
    <input name="image" accept="image/*" type="file">
    <input type="submit" value="Добавить торт">
  </form>
  <span>{{message}}</span>
</template>

<script>
export default {
  name: 'AddCake',
  data() {
    return {
      message: '',
    }
  },
  methods: {
    addCake(event) {
      event.preventDefault();
      fetch('/addCake', {
        method: 'post',
        body: new FormData(document.forms.addCake)
      })
          .then(response => response.json())
          .then(json => {
            if (json.message === 'SUCCESS') {
              this.message = 'Торт добавлен в базу данных';
            } else if (json.message === 'ERROR' && json.reason == 1) {
              this.message = 'Торт с таким названием уже существует';
            } else {
              this.message = 'Произошла ошибка, попробуйте позже. ' + json.reason;
            }
          })
    }
  }
}
</script>

<style scoped>
form > input{
  display: block;
}
</style>