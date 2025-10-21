<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\Student;
use App\Models\User;
use App\Policies\StudentPolicy;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Task 23: edit-student Gate
        Gate::define('edit-student', function (User $user, Student $student) {
            return $user->id === $student->user_id;
        });

        // Task 23: StudentPolicy ni register qilish
        Gate::policy(Student::class, StudentPolicy::class);
    }
}