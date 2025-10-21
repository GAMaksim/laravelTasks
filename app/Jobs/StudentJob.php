<?php

namespace App\Jobs;

use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class StudentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $student;
    public $action;

    /**
     * Create a new job instance.
     */
    public function __construct(Student $student, string $action)
    {
        $this->student = $student;
        $this->action = $action;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Task 25: Log file ga yozish
        $message = match($this->action) {
            'created' => "✅ Yangi student qo'shildi: {$this->student->name} {$this->student->lastname} (ID: {$this->student->id})",
            'updated' => "📝 Student yangilandi: {$this->student->name} {$this->student->lastname} (ID: {$this->student->id})",
            'deleted' => "🗑️ Student o'chirildi: {$this->student->name} {$this->student->lastname} (ID: {$this->student->id})",
            default => "Student event: {$this->action}",
        };

        // Log file ga yozish
        Log::channel('single')->info($message, [
            'student_id' => $this->student->id,
            'action' => $this->action,
            'user_id' => $this->student->user_id,
            'timestamp' => now()->toDateTimeString(),
        ]);
    }
}