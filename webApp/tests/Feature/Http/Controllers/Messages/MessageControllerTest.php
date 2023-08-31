<?php

namespace Http\Controllers\Messages;

use App\Http\Controllers\Messages\MessageController;
use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Mockery\MockInterface;
use Tests\TestCase;

class MessageControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_non_auth_user_cannot_send_message()
    {

        $response = $this->post(route('message.send'), ['receiver_id' => '2', 'body' => "toto"]);
        $response->assertForbidden();
    }
    public function test_auth_user_cannot_send_message_with_missing_data()
    {
        $user = User::factory()->create();
        Auth::shouldReceive('user')->once()->andreturn($user);
        $response = $this->post(route('message.send'), ['body' => "toto"]);
        $response->assertBadRequest();
    }
    public function test_auth_user_cannot_send_message_to_non_existing_user()
    {
        $fakeId = -2;
        $user = User::factory()->create();
        Auth::shouldReceive('user')->once()->andreturn($user);
        $this->mock(User::class)->shouldReceive('find')->withArgs([$fakeId])->andReturn(null);
        $response = $this->post(route('message.send'), ['receiver_id' => $fakeId, 'body' => "toto"]);
        $response->assertBadRequest();
    }
    public function test_auth_user_can_send_message_to_existing_user()
    {
        $user = User::factory()->create();
        $user2 = User::factory()->create();
        Auth::shouldReceive('user')->once()->andreturn($user);
        $this->mock(User::class)->shouldReceive('find')->withArgs(['id', $user2->id])->andReturn($user2);
        $response = $this->post(route('message.send'), ['receiver_id' => "$user2->id", 'body' => "toto"]);
        $response->assertRedirect('chat/'.$user2->id);
    }
}
