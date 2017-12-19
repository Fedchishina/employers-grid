
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

var $form = $('.form');
var $errBlock = $form.find('.error-list');
var $modalDel = $('#modal-container-delete');

//deleting rows in table
$(document).on("click", ".btn-delete", function() {
    var $this = $(this);
    $errBlock.html('');
    //insert value id and route for deleting row
    $modalDel.find( "input[name='id']" ).val( $this.data('id') );
    $modalDel.find(".form").attr('action', $this.data('route'));
});

//show edit modal form for Department
$(document).on("click", ".btn-edit", function() {
    var $this = $(this);
    $errBlock.html('');
    var params = $this.data('params');
    var $modalEdit = $('#modal-container-edit-department');
    //insert input params of Department
    $modalEdit.find( "input[name='id']" ).val(params.id );
    $modalEdit.find( "input[name='name']" ).val(params.name );
});

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
    }).fail(function (err) {
        //validation errors
        if (err.status == 422) {
            var errorList = '<ul>';
            var errors = JSON.parse(err.responseText)['errors'];
            //getting list of errors
            for(var prop in errors) {
                if(!!errors[prop]) {
                    errorList += '<li><strong>' + errors[prop] + '</strong></li>';
                }
            }
            errorList += '</ul>';
            //viewing list of errors
            $errBlock.html(errorList);
        }

        if (err.status == 500) {
            var errorList = '<ul><li>Операция не выполнена. Серверная ошибка.</li></ul>';
            //viewing error
            $errBlock.html(errorList);
        }
    })
});