<template>
    <div>
        <div v-show="!user.longitude" class="alert alert-avatar alert-primary alert-dismissible">
            <img class="avatar" src="/static/florian.jpg" alt="Florian Wartner">
            In order to place yourself on the map, please make sure that you have filled out your address-field on this page.
        </div>

        <!--<span class="tag tag-white">-->
                    <!--<span class="text-gray-dark">fwartner</span>-->
                    <!--<span class="tag-addon tag-red"><i class="fab fa-laravel"></i> &nbsp; Laramap</span>-->
                <!--</span>-->

        <form class="card">
            <div class="card-body">
                <h3 class="card-title">Edit Profile</h3>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" v-model="user.name">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username" readonly v-model="user.username">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <places
                                v-model="user.address"
                                placeholder="Where are we going ?"
                                language="en"
                                @change="updateAddress">
                            </places>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" v-model="user.email">
                            <small class="text-muted">This is also for Gravatar.com</small>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" placeholder="City" name="city" v-model="user.city">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Postal Code</label>
                            <input type="text" class="form-control" placeholder="ZIP Code" name="zip" v-model="user.zip">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-label">Country</label>
                            <select class="form-control custom-select" v-model="user.country">
                                <option v-for="country in countries"  name="country" v-bind:value="country.name">{{ country.name }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-label">Company</label>
                            <input type="text" class="form-control" placeholder="Company" name="company" v-model="user.company">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Available for hire</label>
                            <input type="checkbox" class="form-control" name="is_hireable" v-model="user.is_hireable">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">About Me</label>
                            <textarea rows="5" class="form-control" placeholder="Here can be your biography" v-html="user.biography" v-model="user.biography"></textarea>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-label">Website</label>
                            <input type="text" class="form-control" placeholder="https://example.com" name="web_link" v-model="user.web_link">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-label">GitHub-Profile</label>
                            <input type="text" class="form-control" placeholder="https://github.com/fwartner" name="github_link" v-model="user.github_link">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-label">Twitter-Profile</label>
                            <input type="text" class="form-control" placeholder="https://twitter.com/fwartner" name="twitter_link" v-model="user.twitter_link">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-label">LinkedIn-Profile</label>
                            <input type="text" class="form-control" placeholder="https://linkedin.com/fwartner" name="linkedin_link" v-model="user.linkedin_link">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <div class="text-left">
                            <button class="btn btn-danger" v-on:click="deleteAccountPrompt">Delete Account</button>
                        </div>
                    </div>

                    <div class="col">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" v-on:click="updateAccount">Update Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import Places from 'vue-places';
    export default {
        components: {
            Places
        },

        data() {
            return {
                isLoading: false,
                countries: [],
                user: {}
            }
        },

        mounted() {
            this.getUser();
            this.getCountries();
        },

        methods: {
            async getUser() {
                let self = this;
                await axios.get('/api/users/' + window.Laramap.currentUser.id)
                    .then(function (response) {
                        self.user = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            async getCountries() {
                let self = this;
                await axios.get('/api/countries')
                    .then(function (response) {
                        self.countries = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            async updateAccount(e) {
                e.preventDefault();
                await axios.patch('/api/users/' + window.Laramap.currentUser.id, this.user)
                    .then(function (response) {
                        toastr.success('Your profile has been updated', '✅')
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            updateAddress(val) {
                console.log(val);
                this.user.latitude = val.latlng.lat;
                this.user.longitude = val.latlng.lng;
                this.user.country = val.country;
                this.user.city = val.name;
                this.user.zip = val.postcode;
            },

            deleteAccountPrompt() {
                alert('This function will come next week.. 😘')
            }
        }
    }
</script>

<style scoped>

</style>
