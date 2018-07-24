
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./jquery10');

require('./bootstrap');
require('./activemenu');



// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

// var jc = $.noConflict();
//custom.js
$('.sidebar-toogle').on('click',function(){
    var cls =$body('body').hasClass('sidebar-collapse');
    if(cls == true){
        $('body').removeClass('sidebar-collapse');
    }
    else {
        $('body').addClass('sidebar-collapse');
    }
});

//loadingrubik



