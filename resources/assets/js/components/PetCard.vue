<template>
  <div class="card m-3 box-shadow text-center">
    <img :src="pet.avatar_url" :alt="pet.name" class="card-img-top rounded-circle p-3">
    <div class="card-body">
      <p class="card-text">{{ pet.name }}</p>
      <small class="text-muted text-center">Human: {{ human.name }}</small>
    </div>
  </div>
</template>

<script>
export default {

}
</script>
