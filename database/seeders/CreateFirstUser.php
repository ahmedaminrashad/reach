<?php

namespace Database\Seeders;

use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CreateFirstUser extends Seeder
{

    /**
     * @var  UserService
     */

    private $userService;



    public function __construct(UserService $userService)
    {

        $this->userService = $userService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $userArray=[
            'name'=>'admin',
            'email'=>'admin@email.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>bcrypt('admin@1234'),
            ];

        $this->userService->createUser($userArray);
    }
}
