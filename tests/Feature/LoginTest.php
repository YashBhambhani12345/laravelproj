<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class LoginTest extends TestCase
{
    public function test_admin_signup(){
        $faker = \Faker\Factory::create();
        $data = [
            '_token' => csrf_token(),
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => 'yash32987ryh4u',
        ];

        $response = $this->withoutMiddleware()->post('/adminsignup', $data);

        $response->assertStatus(302);
    }


    public function test_admin_login()
    {
        $admin = Admin::factory()->create([
            'password' => bcrypt('yash@2002'),
        ]);

        $response = $this->followingRedirects()->withoutMiddleware()->post('adminlogin', [
            '_token' => csrf_token(),
            'email' => $admin['email'],
            'password' => 'yash@2002',
        ]);


        $this->assertAuthenticated();

    }
    

    public function  test_user_signup(){
        $faker = \Faker\Factory::create();
        $data = [
            '_token' => csrf_token(),
            'name' => $faker->name,
            'age' => $faker->numberBetween(18, 65), 
            'email' => $faker->email,
            'password' => 'yash32987ryh4u',
        ];

        $response = $this->followingRedirects()->withoutMiddleware()->post('/usersignup', $data);

        $response->assertStatus(302);
    }


    public function test_user_login_with_valid_credentials()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

    
        $response = $this->withoutMiddleware()->post('userlogin', [
            '_token' => csrf_token(),
            'email' => $user->email,
            'password' => 'password',
        ]);


        $this->assertAuthenticated();
    }
    
    
    
  

    public function test_edit(){
        $user = User::find(50);
        $response = $this->withoutMiddleware()->post('/update/50', [
            '_token' => csrf_token(), 
            'name' => 'yash',
            'email' => 'yash@example.com'
        ]);
        $response->assertStatus(200);
        $user->refresh();
        $this->assertEquals('yash', $user->name);
        $this->assertEquals('yash@example.com', $user->email);
    }




    public function test_delete(){
        $response = $this->withoutMiddleware()->get('/delete-record/50');
        $response->assertStatus(200);
    }




    public function test_changepassword(){
        $response = $this->followingRedirects()->withoutMiddleware()->post('/changepassword', [
            '_token' => csrf_token(), 
            'oldpassword' => 'yash2002',
            'newpassword' => 'yash1234'
        ]);
        $response->assertStatus(200);
    }




    public function test_forgetpassword(){
        $response = $this->followingRedirects()->withoutMiddleware()->post('/forgetpassword',[
            '_token' => csrf_token(), 
            'email' => 'yash@gmail.com',
            'password' => '888'
        ]);

        $response->assertStatus(200);

    }
    
   

}
