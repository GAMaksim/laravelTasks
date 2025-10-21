<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth; // 🆕 Bu qatorni qo'shing
use App\Mail\StudentPosted;
use Illuminate\Support\Facades\Mail;
use App\Jobs\StudentJob;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $students = Student::with('user')
                          ->search($search)
                          ->latest()
                          ->paginate(15)
                          ->withQueryString(); // Query string ni saqlab qolish
    
        return view('students.index', [
            'students' => $students,
            'search' => $search,
        ]);
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

    $student = Student::create([
        'name' => $request->name,
        'lastname' => $request->lastname,
        'email' => $request->email,
        'age' => $request->age,
        'user_id' => Auth::id(),
    ]);

    // Task 25: Email ni queue orqali yuborish
    $user = Auth::user();
    if ($user && $user->email) {
        Mail::to($user->email)
            ->queue(new StudentPosted($student, 'created'));
    }

    // Task 25: StudentJob ni dispatch qilish (log file)
    StudentJob::dispatch($student, 'created');

    return redirect()->route('students.index')
                     ->with('success', '✅ Student qo\'shildi! Email va log queue ga yuborildi.');
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

    // Task 25: Email ni queue orqali yuborish
    if ($student->user && $student->user->email) {
        Mail::to($student->user->email)
            ->queue(new StudentPosted($student, 'updated'));
    }

    // Task 25: StudentJob ni dispatch qilish
    StudentJob::dispatch($student, 'updated');

    return redirect()->route('students.index')
                     ->with('success', '✅ Student yangilandi! Email va log queue ga yuborildi.');
}

    public function destroy(string $id)
    {
    $student = Student::findOrFail($id);

    if (Gate::denies('edit-student', $student)) {
        abort(403, 'Bu studentni o\'chirish huquqingiz yo\'q!');
    }

    // Task 25: Email va Job ni dispatch qilish (o'chirishdan OLDIN!)
    if ($student->user && $student->user->email) {
        Mail::to($student->user->email)
            ->queue(new StudentPosted($student, 'deleted'));
    }

    StudentJob::dispatch($student, 'deleted');

    $student->delete();

    return redirect()->route('students.index')
                     ->with('success', '🗑️ Student o\'chirildi! Email va log queue ga yuborildi.');
    }
}