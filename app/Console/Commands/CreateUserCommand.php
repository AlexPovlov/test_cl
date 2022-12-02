<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user {login} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создание пользователя';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = $this->arguments();
        $validator = Validator::make($data,
        [
            'login' => ['required'],
            'password' => ['required'],
        ]);

        $validate = $validator->validated();
        
        $user = User::firstOrCreate(
            ['login' => $validate['login']],
            ['password' => Hash::make($validate['password'])]
        );

        $token = $user->createToken('token',['*'],now()->addDay());

        $this->info("Пользователь {$user->login} создан");
        $this->info("Токен пользваотеля для авторизации в API - ".$token->plainTextToken );

        return Command::SUCCESS;
    }
}
