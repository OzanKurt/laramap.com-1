<template>
    <div class="row">
        <div class="col-md-3">
            <h3 class="page-title mb-5">Countries</h3>

            <div>
                <div class="list-group list-group-transparent mb-0">
                    <a v-for="country in countries" v-bind:href="'/users/' + encodeURIComponent(country.name)" class="list-group-item list-group-item-action d-flex align-items-center active">
                        {{ country.name }} <span class="ml-auto badge badge-primary">{{ country.users_count }}</span>
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
        data() {
            return {
                users: [],
                countries: [],
            }
        },

        mounted() {
            this.getUsers();
            this.getCountries();
        },

        methods: {
            async getUsers() {
                let self = this;
                await axios.get('/public-api/users')
                    .then(function (response) {
                        self.users = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            async getCountries() {
                let self = this;
                await axios.get('/public-api/users/countries')
                    .then(function (response) {
                        self.countries = response.data.data;
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
