
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
$(function () {
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        language: 'hu'
    });

    $.extend(true, $.fn.DataTable.defaults, {
        language: {
            url: {
                "sEmptyTable":     "Nincs rendelkezésre álló adat",
                "sInfo":           "Találatok: _START_ - _END_ Összesen: _TOTAL_",
                "sInfoEmpty":      "Nulla találat",
                "sInfoFiltered":   "(_MAX_ összes rekord közül szűrve)",
                "sInfoPostFix":    "",
                "sInfoThousands":  " ",
                "sLengthMenu":     "_MENU_ találat oldalanként",
                "sLoadingRecords": "Betöltés...",
                "sProcessing":     "Feldolgozás...",
                "sSearch":         "Keresés:",
                "sZeroRecords":    "Nincs a keresésnek megfelelő találat",
                "oPaginate": {
                    "sFirst":    "Első",
                    "sPrevious": "Előző",
                    "sNext":     "Következő",
                    "sLast":     "Utolsó"
                },
                "oAria": {
                    "sSortAscending":  ": aktiválja a növekvő rendezéshez",
                    "sSortDescending": ": aktiválja a csökkenő rendezéshez"
                }
            }
        }

    });

});
