<template>
    <div class="my-3 my-md-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-profile">
                        <div class="card-header" v-bind:style="'background-image: url('+ mapLink + ');'"></div>
                        <div class="card-body text-center">
                            <img class="card-profile-img" v-bind:src="user.avatar">
                            <h3 class="mb-3">{{ user.name }}</h3>

                            <a class="btn btn-outline-primary btn-sm" v-if="user.web_link" v-bind:href="user.web_link">
                                <i class="fas fa-globe"></i>
                            </a>

                            <a class="btn btn-outline-primary btn-sm" v-if="user.twitter_link" v-bind:href="user.twitter_link">
                                <i class="fab fa-twitter"></i>
                            </a>

                            <a class="btn btn-outline-primary btn-sm" v-if="user.github_link" v-bind:href="user.github_link">
                                <i class="fab fa-github"></i>
                            </a>

                            <a class="btn btn-outline-primary btn-sm" v-if="user.linkedin_link" v-bind:href="user.linkedin_link">
                                <i class="fab fa-linkedin"></i>
                            </a>

                            <a class="btn btn-outline-primary btn-sm" v-if="user.facebook_link" v-bind:href="user.facebook_link">
                                <i class="fab fa-facebook"></i>
                            </a>

                            <div v-if="user.is_sponsor || user.is_admin || user.is_hireable">
                                <br>

                                <small v-if="user.is_admin">
                                    <i class="fas fa-user-shield"></i> Administrator &nbsp;
                                </small>

                                <small v-if="user.is_sponsor">
                                    <i class="fas fa-star sponsor"></i> Sponsor &nbsp;
                                </small>

                                <small v-if="user.is_hireable">
                                    <i class="fas fa-briefcase"></i> Available for hire &nbsp;
                                </small>
                            </div>

                            <p class="text-muted" v-if="user.company">
                                <small>
                                    <i class="fas fa-briefcase"></i> {{ user.company }}
                                </small>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8" v-show="user.biography">
                        <div class="card">
                            <div class="card-header">
                                Biography
                            </div>

                            <div class="card-body" v-html="user.biography"></div>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                Latest activity
                            </div>

                            <div class="card-body">
                                <ul class="timeline" v-if="user.activities">
                                    <li class="timeline-item" v-for="activity in user.activities">
                                        <div class="timeline-badge bg-green"></div>
                                        {{ user.name }} {{ activity.description }}
                                        <div class="timeline-time">{{ activity.created_at | momentFull }}</div>
                                    </li>
                                </ul>

                                <h4 class="text-center" v-else>
                                    {{ user.name }} has no recent activity
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['userid'],

        data() {
            return {
                user: {},
                mapLink: null,
            }
        },

        mounted() {
            this.getUser();
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
            getUser() {
                let self = this;
                axios.get('/public-api/users/' + this.userid)
                    .then(function (response) {
                        self.user = response.data.data;
                        self.mapLink = 'https://maps.googleapis.com/maps/api/staticmap?center=' + response.data.data.latitude + ',' + response.data.data.longitude + '&zoom=13&scale=false&size=600x300&maptype=roadmap&key=' + window.Laramap.gmaps_key + '&format=png&visual_refresh=true';
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
        }
    }
</script>

<style scoped>
    .sponsor {
        color: #FFD700;
    }
</style>
