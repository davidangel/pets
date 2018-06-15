<template>
  <div class="row justify-content-center">
    <div v-for="pet in pets" :key="pet.id" :title="pet.name" class="col-lg-3 text-center p-4 pb-5 grow">
      <img :src="pet.avatar_url" :alt="pet.name" class="rounded-circle img-fluid">
      <h2>{{ pet.name }}</h2>
      <small class="text-muted">belongs with</small>
      <p>{{ pet.human.name }}</p>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import axios from 'axios'
export default {
  middleware: 'auth',

  computed: mapGetters({
    user: 'search/query',
    pets: 'search/results'
  }),

  metaInfo () {
    return { title: this.$t('home') }
  }
}
</script>
