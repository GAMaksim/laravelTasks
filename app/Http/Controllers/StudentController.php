<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of students (pagination)
     */
    public function index()
    {
        $students = Student::paginate(15);
        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new student
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created student in storage
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => ['required', 'min:3', 'max:100'],
            'lastname' => ['required', 'min:5', 'max:100'],
            'email' => ['required', 'email', 'unique:students,email'],
            'age' => ['nullable', 'integer', 'min:1', 'max:120'],
        ], [
            'name.required' => 'Ism kiritish majburiy!',
            'name.min' => 'Ism kamida 3 ta belgidan iborat bo\'lishi kerak!',
            'lastname.required' => 'Familiya kiritish majburiy!',
            'lastname.min' => 'Familiya kamida 5 ta belgidan iborat bo\'lishi kerak!',
            'email.required' => 'Email kiritish majburiy!',
            'email.email' => 'Email formati noto\'g\'ri!',
            'email.unique' => 'Bu email allaqachon ro\'yxatdan o\'tgan!',
            'age.integer' => 'Yosh butun son bo\'lishi kerak!',
            'age.min' => 'Yosh kamida 1 bo\'lishi kerak!',
            'age.max' => 'Yosh 120 dan oshmasligi kerak!',
        ]);

        // Create student
        Student::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'age' => $request->age,
        ]);

        return redirect()->route('students.index')
                         ->with('success', '✅ Student muvaffaqiyatli qo\'shildi!');
    }

    /**
     * Display the specified student
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified student
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', ['student' => $student]);
    }

    /**
     * Update the specified student in storage
     */
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        // Validation (ignore current student's email)
        $request->validate([
            'name' => ['required', 'min:3', 'max:100'],
            'lastname' => ['required', 'min:5', 'max:100'],
            'email' => ['required', 'email', 'unique:students,email,' . $id],
            'age' => ['nullable', 'integer', 'min:1', 'max:120'],
        ], [
            'name.required' => 'Ism kiritish majburiy!',
            'name.min' => 'Ism kamida 3 ta belgidan iborat bo\'lishi kerak!',
            'lastname.required' => 'Familiya kiritish majburiy!',
            'lastname.min' => 'Familiya kamida 5 ta belgidan iborat bo\'lishi kerak!',
            'email.required' => 'Email kiritish majburiy!',
            'email.email' => 'Email formati noto\'g\'ri!',
            'email.unique' => 'Bu email boshqa student tomonidan ishlatilmoqda!',
        ]);

        // Update student
        $student->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'age' => $request->age,
        ]);

        return redirect()->route('students.index')
                         ->with('success', '✅ Student ma\'lumotlari yangilandi!');
    }

    /**
     * Remove the specified student from storage
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', '🗑️ Student o\'chirildi!');
    }
}