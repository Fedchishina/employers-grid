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
        'grid' => 'Сетка',
        'departments' => 'Отделы',
        'employers' => 'Сотрудники',
    ],
    'buttons' => [
        'save' => ' сохранить',
        'close' => ' отмена',
        'add' => ' добавить',
        'edit' => ' редактировать',
        'del' => ' удалить'
    ],
    'delete_form' => [
        'title' => 'Удаление',
        'message' => 'Вы действительно хотите удалить запись?',
    ],
    'gender' => [
        'male' => 'мужчина',
        'female' => 'женщина'
    ],

    /*
     * departments
     */
    'department' => [
        'columns' => [
            'name' => 'название',
            'count_employers' => 'кол-во сотрудников',
            'max_salary' => 'макс. зарплата сотрудников',
            'actions' => 'действия'
        ],
        'forms' => [
            'add_title' => 'Добавление отдела',
            'edit_title' => 'Редактирование отдела'
        ]
    ],

    /*
     * employers
     */
    'employers' => [
        'columns' => [
            'first_name' => 'имя',
            'middle_name' => 'отчество',
            'last_name' => 'фамилия',
            'gender' => 'пол',
            'salary' => 'зарплата',
            'departments' => 'отделы',
            'actions' => 'действия'
        ],
        'forms' => [
            'add_title' => 'Добавление сотрудника',
            'edit_title' => 'Редактирование сотрудника'
        ]
    ],

];