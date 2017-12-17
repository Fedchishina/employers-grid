
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


$( function() {
    'use strict';
    var $form = $('.form');
    var $errBlock = $form.find('.error-list');

    init();

    function init() {
        initDepartment();
        initForms();
    }

    function initDepartment(){
        var $btnDelInTable = $('.table .btn-delete');
        $btnDelInTable.on('click', function () {
            $errBlock.html('');
            var $this = $(this);
            var $modalDel = $('#modal-container-delete-department');
            //filling the form with url parameters
            $modalDel.find( "input[name='id']" ).val( $this.data('id') );
        });

        var $btnEditInTable = $('.table .btn-edit');
        $btnEditInTable.on('click', function () {
            $errBlock.html('');
            var $this = $(this);
            var params = $this.data('params');
            var $modalEdit = $('#modal-container-edit-department');
            $modalEdit.find( "input[name='id']" ).val(params.id );
            $modalEdit.find( "input[name='name']" ).val(params.name );
        });
    }

    function initForms() {
        $form.on('submit', function (event) {
            var $this = $(this);
            event.preventDefault();
            $errBlock.html('');
            $.ajax({
                url: $this.attr('action'),
                method: $this.attr('method'),
                data: $this.serialize(),
                dataType: 'html'
            }).done(function (data) {
                //close modal form
                $(".form .btn-close").trigger("click");
                //update content of table
                $('.table-content').html(data);
                init();
            }).fail(function (err) {
                //validation errors
                if (err.status == 422) {
                    var errorList = '<ul>';
                    var errors = JSON.parse(err.responseText);
                    //getting list of errors
                    for(var prop in errors) {
                        if(!!errors[prop]) {
                            errorList += '<li><strong>' + errors[prop] + '</strong></li>';
                        }
                    }
                    errorList += '</ul>';
                    //viewing list of errors on edit short url form
                    $errBlock.html(errorList);
                }
            })
        });
    }
});
