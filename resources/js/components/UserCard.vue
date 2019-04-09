<template>
    <div class="card">
        <div class="card-body d-flex flex-column">
            <div class="d-flex align-items-center">
                <img class="avatar avatar-md mr-3" v-bind:src="user.avatar">
                <div>
                    <a v-bind:href="'/@' + user.username" class="text-default">{{ user.name }}</a>
                    <small class="d-block text-muted">{{ user.username }}</small>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            user: Object
        }
    }
</script>

<style scoped>

</style>
