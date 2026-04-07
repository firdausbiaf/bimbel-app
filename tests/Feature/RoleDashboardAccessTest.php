<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleDashboardAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_is_redirected_to_admin_dashboard_from_generic_dashboard(): void
    {
        $admin = $this->createUserWithRole(User::ROLE_ADMIN);

        $response = $this->actingAs($admin)->get('/dashboard');

        $response->assertRedirect(route('admin.dashboard'));
    }

    public function test_tutor_is_redirected_to_tutor_dashboard_from_generic_dashboard(): void
    {
        $tutor = $this->createUserWithRole(User::ROLE_TUTOR);

        $response = $this->actingAs($tutor)->get('/dashboard');

        $response->assertRedirect(route('tutor.dashboard'));
    }

    public function test_student_is_redirected_to_student_dashboard_from_generic_dashboard(): void
    {
        $student = $this->createUserWithRole(User::ROLE_STUDENT);

        $response = $this->actingAs($student)->get('/dashboard');

        $response->assertRedirect(route('student.dashboard'));
    }

    public function test_user_cannot_access_another_role_dashboard(): void
    {
        $student = $this->createUserWithRole(User::ROLE_STUDENT);

        $response = $this->actingAs($student)->get('/admin/dashboard');

        $response->assertForbidden();
    }

    public function test_role_dashboard_displays_authenticated_user_role(): void
    {
        $tutor = $this->createUserWithRole(User::ROLE_TUTOR);

        $response = $this->actingAs($tutor)->get('/tutor/dashboard');

        $response->assertOk();
        $response->assertSee('Tutor Dashboard');
        $response->assertSee('Your role is tutor.');
    }

    private function createUserWithRole(string $roleName): User
    {
        $role = Role::factory()->create([
            'name' => $roleName,
        ]);

        return User::factory()->create([
            'role_id' => $role->id,
        ]);
    }
}
