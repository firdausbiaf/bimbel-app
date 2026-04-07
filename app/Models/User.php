<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    public const ROLE_ADMIN = 'admin';
    public const ROLE_TUTOR = 'tutor';
    public const ROLE_STUDENT = 'student';

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

    public function getRoleName(): ?string
    {
        return $this->role?->name;
    }

    public function hasRole(string $role): bool
    {
        return $this->getRoleName() === $role;
    }

    public function dashboardRoute(): string
    {
        return match ($this->getRoleName()) {
            self::ROLE_ADMIN => route('admin.dashboard'),
            self::ROLE_TUTOR => route('tutor.dashboard'),
            self::ROLE_STUDENT => route('student.dashboard'),
            default => route('login'),
        };
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
