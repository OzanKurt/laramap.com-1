<template>
    <div>
        <div class="avatar-list avatar-list-stacked">
            <a  v-for="user in users.slice(0, userLimit)" v-bind:href="'/@' + user.username">
                <img class="avatar" v-bind:src="user.avatar" v-bind:alt="user.username">
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['userlimit'], // 53

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
