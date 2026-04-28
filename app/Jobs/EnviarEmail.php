<?php
namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\Usuario;

class EnviarEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, SerializesModels;

    protected $usuario;

    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    public function handle(): void
    {
        Mail::raw("Bem vindo " . $this->usuario->nome, function($message) {
            $message->to($this->usuario->email)->subject('Bem vindo!');
        });
    }
}