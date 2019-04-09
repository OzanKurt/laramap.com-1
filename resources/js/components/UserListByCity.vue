<template>
    <div class="row">
        <div class="col-3" v-for="user in users">
            <user-card v-bind:user="user"></user-card>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            country: String,
            city: String
        },

        data() {
            return {
                users: []
            }
        },

        mounted() {
            this.getUsers();
        },

        methods: {
            async getUsers() {
                let self = this;
                await axios.get(
                    '/public-api/users/filterByLocation/' + encodeURIComponent(self.country) +
                        '/' + encodeURIComponent(self.city))
                    .then(function (response) {
                        self.users = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
        }
    }
</script>

<style scoped>

</style>
