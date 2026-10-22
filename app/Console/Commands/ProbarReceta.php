<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Receta;
use App\Models\Ingrediente;

class ProbarReceta extends Command
{
    protected $signature = 'probar:receta';

    protected $description = 'Instanciar una receta y mostrarla en terminal';

    public function handle()
    {
        $receta = new Receta();

        $receta->titulo = 'Queque de vainilla';
        $receta->porciones = 8;
        $receta->instrucciones = 'Mezclar los ingredientes y hornear durante 40 minutos.';

        $receta->ingredientes = [
            new Ingrediente([
                'nombre' => 'Harina',
                'cantidad' => 2,
                'unidad_medida' => 'tazas'
            ]),
            new Ingrediente([
                'nombre' => 'Azucar',
                'cantidad' => 1,
                'unidad_medida' => 'taza'
            ]),
            new Ingrediente([
                'nombre' => 'Huevos',
                'cantidad' => 3,
                'unidad_medida' => 'unidades'
            ])
        ];

        $this->info('INFORMACION DE LA RECETA');
        $this->line('Titulo: ' . $receta->titulo);
        $this->line('Porciones: ' . $receta->porciones);
        $this->line('Instrucciones: ' . $receta->instrucciones);

        $this->line('');
        $this->info('INGREDIENTES');

        foreach ($receta->ingredientes as $ingrediente) {
            $this->line(
                $ingrediente->nombre . ': ' .
                $ingrediente->cantidad . ' ' .
                $ingrediente->unidad_medida
            );
        }

        return Command::SUCCESS;
    }
}
