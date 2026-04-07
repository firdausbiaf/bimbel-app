<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'role_id',
        'name',
        'email',
        'phone',
        'password',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function tutorClasses(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class, 'class_tutors', 'tutor_id', 'class_id');
    }

    public function studentClasses(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class, 'class_students', 'student_id', 'class_id')
            ->withPivot(['joined_at', 'status'])
            ->withTimestamps();
    }

    public function assignmentsAsTutor(): HasMany
    {
        return $this->hasMany(Assignment::class, 'tutor_id');
    }

    public function assignmentSubmissions(): HasMany
    {
        return $this->hasMany(AssignmentSubmission::class, 'student_id');
    }

    public function assessmentsAsTutor(): HasMany
    {
        return $this->hasMany(Assessment::class, 'tutor_id');
    }

    public function assessmentSubmissions(): HasMany
    {
        return $this->hasMany(AssessmentSubmission::class, 'student_id');
    }
}
