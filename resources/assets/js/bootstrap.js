
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}

require('admin-lte');
require('fullcalendar');
window.swal = require('sweetalert2');

require('bootstrap-validator');




/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

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

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key',
//     cluster: 'mt1',
//     encrypted: true
// });


//custom calendar
jQuery(document).ready(function () {
    jQuery('#calendar').fullCalendar({
        header: {
            left: 'title',
            right: 'today prev,next ',
        },
        locale: 'id',
        firstDay: 0,
        eventRender: function (eventObj, $el) {
            $el.popover({
                title: eventObj.title,
                content: eventObj.description,
                trigger: 'hover',
                placement: 'top',
                container: 'body'
            });
        },

        allDayDefault: true,
        editable: false,
        eventColor: '#378006',
        events: {
            url: '/loadCalendar',

        },
        eventColor: '#378006',
        loading: function (bool) {
            jQuery('#loading').toggle(bool);
        }
    });

});



//loaddataajaxinfinte
// $(document).ready(function() {

//     $(window).scroll(fetchPosts);

//     function fetchPosts() {

//         var page = $('.endless-pagination').data('next-page');
          

//         if(page !== null) {
//             clearTimeout( $.data( this, "scrollCheck" ) );
//             $.data( this, "scrollCheck", setTimeout(function() {
        

//                 var scroll_position_for_posts_load = $(window).height() + $(window).scrollTop() + 100;

//                 if(scroll_position_for_posts_load >= $(document).height()) {
//                     $('.se-pre-con').show()

//                     $.get(page, function(data){

//                         $('.datapost').append(data.datapost);

//                         $('.endless-pagination').data('next-page', data.next_page);

//                         $('.se-pre-con').fadeOut("slow");
//                     });
                    
//                 }

//             }, 350))

//         }
//     }

// })






//add

            
