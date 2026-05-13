<?php

namespace Controllers;
use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use Model\Ponente;
use MVC\Router;

class PaginasController {
    public static function index(Router $router) {
    $eventos = Evento::ordenar('hora_id', 'ASC');
    $eventos_formateados = [];

    foreach($eventos as $evento){
        $evento->categoria = Categoria::find($evento->categoria_id);
        $evento->dia = Dia::find($evento->dia_id);
        $evento->hora = Hora::find($evento->hora_id);
        $evento->ponente = Ponente::find($evento->ponente_id);

        // Definir nombres legibles
        $categoria = $evento->categoria_id == 1 ? 'conferencias' : 'workshops';

            // Mapear días 
            $dias = [
                "1" => "j",
                "2" => "v",
                "3" => "s",
                "4" => "d"
            ];

            $dia = $dias[$evento->dia_id];

            // Estructura matricial
            $eventos_formateados[$categoria][$dia][] = $evento;
        }

        //Obtener el total de cada bloque
        $ponentes_total = Ponente::total();
        $conferencias_total = Evento::total('categoria_id', 1);
        $workshops_total = Evento::total('categoria_id', 2);

        //Obtener todos los ponentes
        $ponentes = Ponente::all();

        $router->render('paginas/index', [
            'titulo' => 'Inicio',
            'eventos' => $eventos_formateados,
            'ponentes_total' => $ponentes_total,
            'conferencias_total' => $conferencias_total,
            'workshops_total' => $workshops_total,
            'ponentes' => $ponentes
        ]);
    }
    public static function evento(Router $router) {
        $router->render('paginas/devwebcamp', [
            'titulo' => 'Sobre DevWebCamp'
        ]);
    }
    public static function paquetes(Router $router) {
        $router->render('paginas/paquetes', [
            'titulo' => 'Paquetes de DevWebCamp'
        ]);
    }
    public static function conferencias(Router $router) {
    $eventos = Evento::ordenar('hora_id', 'ASC');
    $eventos_formateados = [];

    foreach($eventos as $evento){
        $evento->categoria = Categoria::find($evento->categoria_id);
        $evento->dia = Dia::find($evento->dia_id);
        $evento->hora = Hora::find($evento->hora_id);
        $evento->ponente = Ponente::find($evento->ponente_id);

        // Definir nombres legibles
        $categoria = $evento->categoria_id == 1 ? 'conferencias' : 'workshops';

            // Mapear días 
            $dias = [
                "1" => "j",
                "2" => "v",
                "3" => "s",
                "4" => "d"
            ];

            $dia = $dias[$evento->dia_id];

            // Estructura matricial
            $eventos_formateados[$categoria][$dia][] = $evento;
        }

        $router->render('paginas/conferencias', [
            'titulo' => 'Conferencias & Workshops',
            'eventos' => $eventos_formateados
        ]);
    }
    public static function error(Router $router) {
        $router->render('paginas/error', [
            'titulo' => 'Pagina no econtrada'
        ]);
    }
}