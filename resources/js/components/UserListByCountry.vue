<template>
    <div class="row">
        <div class="col-md-3">
            <h3 class="page-title mb-5">Cities</h3>

            <div>
                <div class="list-group list-group-transparent mb-0">
                    <a v-for="city in cities" v-bind:href="'/users/' + encodeURIComponent(country) + '/' + encodeURIComponent(city.name)" class="list-group-item list-group-item-action d-flex align-items-center active">
                        {{ city.name }} <span class="ml-auto badge badge-primary">{{ city.users_count }}</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-3" v-for="user in users">
                    <user-card v-bind:user="user"></user-card>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            country: String
        },

        data() {
            return {
                users: [],
                cities: [],
            }
        },

        mounted() {
            this.getCities();
            this.getUsers();
        },

        methods: {
            async getCities() {
                let self = this;
                await axios.get('/public-api/users/cities/' + encodeURIComponent(self.country))
                    .then(function (response) {
                        self.cities = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            async getUsers() {
                let self = this;
                await axios.get('/public-api/users/filterByLocation/' + encodeURIComponent(self.country))
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
