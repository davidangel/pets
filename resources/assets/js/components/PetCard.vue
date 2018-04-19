<template>
    <div class="card m-3 box-shadow text-center">
        <img class="card-img-top rounded-circle p-3" :src="pet.avatar_url" :alt="pet.name">
        <div class="card-body">
            <p class="card-text">{{ pet.name }}</p>
            <small class="text-muted text-center">Human: {{ human.name }}</small>
        </div>
    </div>
</template>
<script>
export default {
        data() {
            return {
                avatar: '',
                human: {}
            }
        },
        props: ['pet'],
        mounted() {
            axios.get('/api/pet/' + this.pet.id)
                .then(response => {
                    this.avatar = response.data.avatar_url
                    this.human = response.data.human
                })
                .catch(function (error) {
                    console.log(error);
                })
        },
        methods: {
            getPic(index) {
                return this.avatar
            }
        }
    }
</script>