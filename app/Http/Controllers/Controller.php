<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @return string
     */
    public function getRole(): string
    {
        return (isset(Auth::user()->role)) ? Auth::user()->role : 'user';
    }

    /**
     * @param $tasks
     * @param $defaultTask
     * @return mixed|null
     */
    public function newTask($tasks = [], $defaultTask)
    {
        $userRole = $this->getRole();
        foreach ($tasks as $role => $callback) {
            if ($role == $userRole) {
                return $callback();
            }
        }
        return $defaultTask();
    }

    /**
     * @param integer $status
     * @param array $data
     * @param array|null $httpHeaders
     * @param string|null $info
     * @return void
     */
    public function response($status = 100, array $data = [], array $httpHeaders = null, string $info = null): json
    {

        //
        if ($status < 200) {
            $respuesta = 'HTTP\2.0 ' . $status . ' La solicitud ha sido recibida, permanece en proceso';
        } else if ($status >= 200 && $status < 300) {
            $respuesta = 'HTTP\2.0 ' . $status . ' La solicitud ha sido procesada exitosamente';
        } else if ($status >= 300 && $status < 400) {
            $respuesta = 'HTTP\2.0 ' . $status . ' La solicitud se redireccionará';
        } else if ($status >= 400 && $status < 500) {
            $respuesta = 'HTTP\2.0 ' . $status . ' La solicitud presenta un error';
        } else if ($status >= 500) {
            $respuesta = 'HTTP\2.0 ' . $status . ' La solicitud no pudo ser procesada con éxito, error del servidor';
        }

        //
        if (isset($httpHeaders)) {
            //
            array_push($httpHeaders, $respuesta, 'Content-Type: application/json');

            //
            if (is_array($httpHeaders) && count($httpHeaders)) {
                foreach ($httpHeaders as $httpHeader) {
                    header($httpHeader);
                }
            }
        }

        //
        $responseArray = ['status' => $status, 'message' => $respuesta];
        $responseArray['data'] = (isset($data)) ? $data : ["No hay nada para mostrar"];
        if (isset($info)) {
            $responseArray['information'] = $info;
        }

        //
        echo json_encode($responseArray);
        exit;
    }
}
