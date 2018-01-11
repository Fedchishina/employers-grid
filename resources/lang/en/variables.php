<?php
/*
|--------------------------------------------------------------------------
| Языковые ресурсы для перевода интерфейсов сайта
|--------------------------------------------------------------------------
|
| Следующие языковые ресурсы используются во время отображения интерфейсов
| сайта для различных сообщений которые мы должны вывести пользователю на
| экран.Вы можете свободно изменять эти языковые ресурсы в соответствии
| с требованиями вашего приложения.
|
*/

return [
    /*
     * general variables
     */
    'menu' => [
        'grid' => 'Grid',
        'departments' => 'Departments',
        'employers' => 'Employers',
    ],
    'buttons' => [
        'save' => ' save',
        'close' => ' close',
        'add' => ' add',
        'edit' => ' edit',
        'del' => ' delete'
    ],
    'delete_form' => [
        'title' => 'Delete',
        'message' => 'Do you really want to delete this note?'
    ],
    'gender' => [
        'male' => 'male',
        'female' => 'female'
    ],

    /*
     * departments
     */
    'department' => [
        'columns' => [
            'name' => 'name',
            'count_employers' => 'count of employers',
            'max_salary' => 'max salary',
            'actions' => 'actions'
        ],
        'forms' => [
            'add_title' => 'Adding department',
            'edit_title' => 'Editing department'
        ]
    ],

    /*
     * employers
     */
    'employers' => [
        'columns' => [
            'first_name' => 'first name',
            'middle_name' => 'middle name',
            'last_name' => 'last name',
            'gender' => 'gender',
            'salary' => 'salary',
            'departments' => 'departments',
            'actions' => 'actions'
        ],
        'forms' => [
            'add_title' => 'Adding employer',
            'edit_title' => 'Editing employer'
        ]
    ],

];