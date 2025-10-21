<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProductController;

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

// Task 13: Debug
Route::get('/lazy', function() {
    $posts = App\Models\Post::all();
    return view('lazy', compact('posts'));
});

Route::get('/eager', function() {
    $posts = App\Models\Post::with('comments')->get();
    return view('eager', compact('posts'));
});

// Route::get('/students', function () {
//     $students = Student::paginate(15);

//     return view('students', [
//         'students' => $students
//     ]);
// });


// Route::get('/student/{id}', function ($id) {
    
//     $student = Student::find($id);
//     return view('student', ['student' => $student]);
// });

// // Task 16: Student Create Form
// Route::get('/students/create', function () {
//     return view('students.create');
// });

// Route::post('/students', function () {
//     // Task 17: Validation qoidalari
//     request()->validate([
//         'name' => ['required', 'min:3', 'max:100'],
//         'lastname' => ['required', 'min:5', 'max:100'],
//         'email' => ['required', 'email', 'unique:students,email'],
//         'age' => ['nullable', 'integer', 'min:1', 'max:120'],
//     ], [
//         // O'zbek tilida xato xabarlari
//         'name.required' => 'Ism kiritish majburiy!',
//         'name.min' => 'Ism kamida 3 ta belgidan iborat bo\'lishi kerak!',
//         'lastname.required' => 'Familiya kiritish majburiy!',
//         'lastname.min' => 'Familiya kamida 5 ta belgidan iborat bo\'lishi kerak!',
//         'email.required' => 'Email kiritish majburiy!',
//         'email.email' => 'Email formati noto\'g\'ri!',
//         'email.unique' => 'Bu email allaqachon ro\'yxatdan o\'tgan!',
//         'age.integer' => 'Yosh butun son bo\'lishi kerak!',
//         'age.min' => 'Yosh kamida 1 bo\'lishi kerak!',
//         'age.max' => 'Yosh 120 dan oshmasligi kerak!',
//     ]);

//     // Student yaratish
//     App\Models\Student::create([
//         'name' => request('name'),
//         'lastname' => request('lastname'),
//         'email' => request('email'),
//         'age' => request('age'),
//     ]);

//     // Muvaffaqiyatli redirect
//     return redirect('/students')->with('success', '✅ Student muvaffaqiyatli qo\'shildi!');
// });

// // Task 18: Student Update (Edit Form)
// Route::get('/student/{id}/edit', function ($id) {
//     $student = App\Models\Student::findOrFail($id);
//     return view('students.edit', ['student' => $student]);
// });

// // Task 18: Student Update (Submit)
// Route::patch('/student/{id}', function ($id) {
//     $student = App\Models\Student::findOrFail($id);
    
//     // Validation
//     request()->validate([
//         'name' => ['required', 'min:3', 'max:100'],
//         'lastname' => ['required', 'min:5', 'max:100'],
//         'email' => ['required', 'email', 'unique:students,email,' . $id],
//         'age' => ['nullable', 'integer', 'min:1', 'max:120'],
//     ], [
//         'name.required' => 'Ism kiritish majburiy!',
//         'name.min' => 'Ism kamida 3 ta belgidan iborat bo\'lishi kerak!',
//         'lastname.required' => 'Familiya kiritish majburiy!',
//         'lastname.min' => 'Familiya kamida 5 ta belgidan iborat bo\'lishi kerak!',
//         'email.required' => 'Email kiritish majburiy!',
//         'email.email' => 'Email formati noto\'g\'ri!',
//         'email.unique' => 'Bu email boshqa student tomonidan ishlatilmoqda!',
//     ]);

//     // Update
//     $student->update([
//         'name' => request('name'),
//         'lastname' => request('lastname'),
//         'email' => request('email'),
//         'age' => request('age'),
//     ]);

//     return redirect('/students')->with('success', '✅ Student ma\'lumotlari yangilandi!');
// });

// // Task 18: Student Delete
// Route::delete('/student/{id}', function ($id) {
//     $student = App\Models\Student::findOrFail($id);
//     $student->delete();
    
//     return redirect('/students')->with('success', '🗑️ Student o\'chirildi!');
// });

// Task 19: Student Resource Controller
//Route::resource('students', StudentController::class);

// Task 21-22: Authentication Routes (Manual)
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Students - faqat authenticated userlar uchun
Route::middleware(['auth'])->group(function () {
    Route::resource('students', StudentController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Products - authenticated users only
Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
});