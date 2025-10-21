<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Student;

Route::get('/', function () {
    return view('home');
});



Route::get('/jobs', function () {

    $jobs = Job::all();
    return view('jobs', [
        'jobs' => $jobs
    ]);
});


Route::get('/job/{id}', function ($id) {

    $job = Job::find($id);

    return view('job', ['job' => $job]);

});



Route::get('/contact', function () {
    return view('contact');
});



Route::get('/users', function () {

    $users = [
    [
        'id' => 1,
        'name' => "John Doe",
        'mail' => "johndoe@mail.com"
    ],
    [
        'id' => 2,
        'name' => "Ragnar Lothbrok",
        'mail' => "ragnar@mail.com"
    ],
    [
        'id' => 3,
        'name' => "Lara Croft",
        'mail' => "laracroft@mail.com"
    ],
];

return view('users', [
    'users' => $users
    ]);
});


Route::get('/user/{id}', function ($id) {

    $users = [
        [
            'id' => 1,
            'name' => "John Doe",
            'mail' => "johndoe@mail.com"
        ],
        [
            'id' => 2,
            'name' => "Ragnar Lothbrok",
            'mail' => "ragnar@mail.com"
        ],
        [
            'id' => 3,
            'name' => "Lara Croft",
            'mail' => "laracroft@mail.com"
        ],
    ];

    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return view('user', [
                'user' => $user
            ]);
        }
    }
});



Route::get('/students', function () {
    $students = Student::all();

    return view('students', [
        'students' => $students
    ]);
});


Route::get('/student/{id}', function ($id) {
    
    $student = Student::find($id);
    return view('student', ['student' => $student]);
});

// Task 13: Debug
Route::get('/lazy', function() {
    $posts = App\Models\Post::all();
    return view('lazy', compact('posts'));
});

Route::get('/eager', function() {
    $posts = App\Models\Post::with('comments')->get();
    return view('eager', compact('posts'));
});