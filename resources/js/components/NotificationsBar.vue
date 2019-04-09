<template>
    <div v-if="notifications.length" class="dropdown d-none d-md-flex">
        <a class="nav-link icon" data-toggle="dropdown">
            <i class="fe fe-bell"></i>
            <span class="nav-unread"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a v-for="notification in notifications.unread_notifications" href="#" class="dropdown-item d-flex">
                <div>
                    <strong>{{ notification.data.from_user.username }}</strong> {{ notification.data.title }}
                    <div class="small text-muted">{{ notification.created_at }}</div>
                </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item text-center text-muted-dark" v-on:click="clearAllNotifications">Mark all as read</a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                notifications: []
            }
        },

        mounted() {
            this.getNotifications();
        },

        methods: {
            async getNotifications() {
                let self = this;
                await axios.get('/api/notifications')
                    .then(function (response) {
                        self.notifications = response.data.data.unread_notifications;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            async clearAllNotifications() {
                let self = this;
                await axios.post('/api/notifications/clear')
                    .then(function (response) {
                        self.notifications = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
