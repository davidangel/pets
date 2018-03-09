<template>
    <div class="card m-3 box-shadow">
        <img class="card-img-top rounded-circle p-3" :src="pet.avatar_url" :alt="pet.name">
        <div class="card-body">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
            </div>
            <small class="text-muted">9 mins</small>
            </div>
        </div>
    </div>
</template>
<script>
export default {
        data() {
            return {
                avatar: ''
            }
        },
        props: ['pet'],
        mounted() {
            axios.get('/api/pet/' + this.pet.id)
                .then(response => {
                    this.avatar = response.data.avatar_url
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