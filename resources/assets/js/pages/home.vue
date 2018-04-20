<template>
  <div class="row justify-content-center">
    <div v-for="pet in pets" :key="pet.id" :title="pet.name" class="col-lg-3 text-center p-5 grow">
      <img :src="pet.avatar_url" :alt="pet.name" class="rounded-circle img-fluid">
      <h2>{{ pet.name }}</h2>
      <p>belongs with { human name }</p>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  middleware: 'auth',

  data () {
    return {
      pets: []
    }
  },

  metaInfo () {
    return { title: this.$t('home') }
  },

  mounted () {
    axios.get('/api/pet')
      .then(response => {
        this.pets = response.data
      })
      .catch(function (error) {
        console.log(error)
      })
  }
}
</script>
