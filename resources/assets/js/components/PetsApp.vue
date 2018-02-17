<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">Pets App</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                "pets": []
            }
        },
        mounted() {
            console.log('Component mounted.')
            axios.get('/api/pet')
                .then(function (response) {
                    console.log(response)
                    this.pets = response.data
                })
                .catch(function (error) {
                    console.log(error);
                })
        }
    }
</script>
