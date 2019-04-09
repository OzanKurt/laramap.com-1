<template>
    <div class="row">
        <div v-for="user in users.reverse().slice(0, 6)" class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="m-0">
                        <a v-bind:href="'/@' + user.username">
                            <img v-bind:src="user.avatar" v-bind:alt="user.username" class="avatar avatar-xl">
                        </a>
                    </div>
                    <div class="text-muted mb-4">{{ user.name }} <small class="text-muted">{{ user.username }}</small></div>
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
                userLimit: this.userlimit
            }
        },

        mounted() {
            this.getUsers();
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
        }
    }
</script>

<style scoped>

</style>
