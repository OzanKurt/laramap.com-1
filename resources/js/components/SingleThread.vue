<template>
    <div>
        <div class="card">
            <div class="card-status bg-red-lighter"></div>
            <div class="card-header">
                <img class="avatar avatar-md mr-3" v-bind:src="singleThread.user.avatar">
                <div>
                    <a v-bind:href="'/@' + singleThread.user.username" class="text-default">
                                        <span v-if="! singleThread.user.name">
                                            {{ singleThread.user.username }}
                                        </span>

                        <span v-else>
                                            {{ singleThread.user.name }} <small class="text-muted">({{ singleThread.user.username }})</small>
                                        </span>
                    </a>
                    <small class="d-block text-muted">
                        <i class="fal fa-calendar-alt"></i> {{ singleThread.created_at.date | momentDate }} / <i class="fal fa-clock"></i> {{ singleThread.created_at.date | momentTime }}
                    </small>
                </div>
            </div>

            <div class="card-body d-flex flex-column">
                <h4>
                    {{ singleThread.title }}
                </h4>

                <article v-html="singleThread.body"></article>
                <div class="ml-auto text-muted">
                    <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3">
                        <!--<i class="fe fe-heart mr-1"></i>-->
                    </a>
                </div>
            </div>
        </div>

        <div class="card" v-for="reply in singleThread.replies">
            <div class="card-status card-status-left btn-azure"></div>
            <div class="card-header">
                <img class="avatar avatar-md mr-3" v-bind:src="reply.user.avatar">
                <div>
                    <a v-bind:href="'/@' + reply.user.username" class="text-default">
                                        <span v-if="! reply.user.name">
                                            {{ reply.user.username }}
                                        </span>

                        <span v-else>
                                            {{ reply.user.name }} <small class="text-muted">({{ reply.user.username }})</small>
                                        </span>
                    </a>
                    <small class="d-block text-muted">
                        <i class="fal fa-calendar-alt"></i> {{ reply.created_at.date | momentDate }} / <i class="fal fa-clock"></i> {{ reply.created_at.date | momentTime }}
                    </small>
                </div>

                <!--<div class="card-options">-->
                    <!--<div class="dropdown">-->
                        <!--<button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-toggle="dropdown">-->
                            <!--Options-->
                        <!--</button>-->
                        <!--<div class="dropdown-menu">-->
                            <!--<a class="dropdown-item" href="#">Edit</a>-->
                            <!--<a class="dropdown-item" href="#">Delete</a>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
            </div>

            <div class="card-body">
                <article v-html="reply.body"></article>
                <div class="text-right text-muted">
                    <!--<a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i></a>-->
                </div>
            </div>
        </div>

        <div class="card" v-if="currentUser">
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <textarea class="form-control" name="reply" rows="6" placeholder="Your reply.." v-model="reply.body"></textarea>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <div class="text-left">
                                    <button class="btn btn-danger" v-on:click="cancelReply">Cancel</button>
                                </div>
                            </div>

                            <div class="col">
                                <div class="text-right">
                                    <button class="btn btn-primary" v-on:click="createReply">Reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card" v-else>
            <div class="card-body">
                <h3 class="text-center">
                    Please <a class="btn btn-outline-primary btn-sm" href="/login">sign in</a> in order to reply
                </h3>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['threadid'],

        data() {
            return {
                currentUser: this.$parent.currentUser,
                singleThread: {},
                reply: {
                    user_id: null,
                    body: null,
                }
            }
        },

        mounted() {
            this.checkForAuth();
            this.getThread();
        },

        filters: {
            momentDate(myDate) {
                return moment(myDate).format('DD.MM.YYYY');
            },

            momentFull(myDate) {
                return moment(myDate).format('DD.MM.YYYY HH:mm');
            },

            momentTime(myDate) {
                return moment(myDate).format('HH:mm');
            },
        },

        methods: {
            checkForAuth() {
                if (window.Laramap.currentUser) {
                    this.reply.user_id = window.Laramap.currentUser.id;
                }
            },

            async getThread() {
                let self = this;
                await axios.get('/public-api/forums/threads/' + this.threadid)
                    .then(function (response) {
                        self.singleThread = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            async createReply(e) {
                e.preventDefault();
                let self = this;
                await axios.post('/api/forums/threads/' + this.threadid + '/replies', this.reply)
                    .then(function (response) {
                        self.singleThread.replies.push(response.data.data);
                        toastr.success('Your reply has been saved.', '✅');
                        self.reply.body = '';
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            cancelReply(e) {
                e.preventDefault();
                this.reply.body = '';
            }
        }
    }
</script>

<style scoped>

</style>
