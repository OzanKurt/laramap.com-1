
require('./tabler');

window._ = require('lodash');
window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.toastr = require('toastr');
window.toastr.options = {
    "positionClass": "toast-bottom-right",
};

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios.interceptors.request.use(function (config) {
    window.app.isLoading = true;
    return config;
}, function (error) {
    window.app.isLoading = false;
    toastr.error(error.message);
    return Promise.reject(error);
});

window.axios.interceptors.response.use(function (response) {
    window.app.isLoading = false;
    return response;
}, function (error) {
    window.app.isLoading = false;
    toastr.error(error.message);
    return Promise.reject(error);
});

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true
});

window.mapboxgl = require('mapbox-gl');
window.mapboxgl.accessToken = 'pk.eyJ1IjoiZndhcnRuZXIiLCJhIjoiY2lyYWxwaDlmMDA0YWk5bWd2cjd1cHk1OCJ9.kzizG2lpFQU3tsuhfZBrGQ';

import Mapbox from 'mapbox-gl-vue';
Vue.component('mapbox', Mapbox);

/**
 * Require third party libraries
 */
window.d3 = require('d3');
window.moment = require('moment');
window.fullcalendar = require('fullcalendar');
window.mapboxgl = require('mapbox-gl');
window.collect = require('collect.js');
window.getstream = require('getstream');

window.places = require('places.js');
window.moment = require('moment');
window.swal = require('sweetalert2');
window.c3 = require('c3');
window.marked = require('marked');
