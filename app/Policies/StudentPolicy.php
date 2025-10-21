<?php

namespace App\Policies;

use App\Models\Student;
use App\Models\User;

class StudentPolicy
{
    /**
     * Determine if the user can view the student.
     */
    public function view(User $user, Student $student): bool
    {
        return true; // Hamma ko'rishi mumkin
    }

    /**
     * Determine if the user can create students.
     */
    public function create(User $user): bool
    {
        return true; // Hamma yaratishi mumkin
    }

    /**
     * Determine if the user can update the student.
     */
    public function update(User $user, Student $student): bool
    {
        // Faqat o'z studenti bo'lsa
        return $user->id === $student->user_id;
    }

    /**
     * Determine if the user can delete the student.
     */
    public function delete(User $user, Student $student): bool
    {
        // Faqat o'z studenti bo'lsa
        return $user->id === $student->user_id;
    }
}