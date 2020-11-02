<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates the main admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        do{
            $username = $this->ask('Veuillez taper le nom d\'utilisateur de l\'administrateur');
            $email = $this->ask('Veuillez taper l\'adresse email de l\'administrateur');
            $password = $this->secret('Veuillez taper le mot de passe de l\'administrateur');
            $password_confirmation = $this->secret('Veuillez confirmer le mto de passe de l\'administrateur');
            $data= compact('username', 'email', 'password', 'password_confirmation');
            $validation = $this->validateData($data);
            if(!$validation['status']){
                foreach($validation['errors'] as $error){
                    $this->error($error);
                    $this->newLine();
                }
            }
        }while(!$validation['status']);

        $admin = Admin::create([
            'username' => $username,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        $this->info('l\'adminstrateur '.$admin->username.' a été crée avec succès !');
        return true;
    }
    private function validateData($data){
        $validator = Validator::make($data, [
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|confirmed',
        ]);
        if($validator->fails()){
            return [
                'status' => false,
                'errors' => $validator->errors()->all(),
            ];
        } 
        return [
            'status' => true
        ];
    }
}

