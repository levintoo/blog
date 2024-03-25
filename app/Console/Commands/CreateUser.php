<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use function Laravel\Prompts\password;
use function Laravel\Prompts\text;
use function Laravel\Prompts\info;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = text(
            label: 'What is your name?',
            validate: ['name' => 'required|string|max:255']
        );

        $email = text(
            label: 'What is your email?',
            validate: ['name' => 'required','string','lowercase','email','max:255','unique:'.User::class]
        );

        $password = password(
            label: 'What is your password?',
            placeholder: 'password',
            validate: ['required', Rules\Password::defaults()],
            hint: 'Minimum 8 characters.'
        );

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        info('created user ' . $name . ' success!');
    }
}
