<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth; // 🆕 Bu qatorni qo'shing

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(15);
        return view('students.index', ['students' => $students]);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
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
        ]);

        Student::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'age' => $request->age,
            'user_id' => Auth::id(), // 🆕 Auth::id() ishlatamiz
        ]);

        return redirect()->route('students.index')
                         ->with('success', '✅ Student muvaffaqiyatli qo\'shildi!');
    }

    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', ['student' => $student]);
    }

    public function edit(string $id)
    {
        $student = Student::findOrFail($id);

        if (Gate::denies('edit-student', $student)) {
            abort(403, 'Bu studentni tahrirlash huquqingiz yo\'q!');
        }

        return view('students.edit', ['student' => $student]);
    }

    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        if (Gate::denies('edit-student', $student)) {
            abort(403, 'Bu studentni tahrirlash huquqingiz yo\'q!');
        }

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

        $student->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'age' => $request->age,
        ]);

        return redirect()->route('students.index')
                         ->with('success', '✅ Student ma\'lumotlari yangilandi!');
    }

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        if (Gate::denies('edit-student', $student)) {
            abort(403, 'Bu studentni o\'chirish huquqingiz yo\'q!');
        }

        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', '🗑️ Student o\'chirildi!');
    }
}