<template>
    <div class="container">
        <div class="row justify-content-center">
            <pet-card class="col-sm-3" v-for="pet in pets" :pet="pet" :key="pet.id">{{ pet.name }}></pet-card>         
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: 'Pets',
                pets: []
            }
        },
        mounted() {
            console.log('Component mounted.')
            axios.get('/api/pet')
                .then(response => {
                    this.pets = response.data
                })
                .catch(function (error) {
                    console.log(error);
                })
        }
    }
</script>
