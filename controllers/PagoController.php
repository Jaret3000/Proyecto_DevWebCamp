<?php

namespace Controllers;

class PagoController {

    public static function capturar() {

        $datos = json_decode(file_get_contents("php://input"), true);

        $orderID = $datos['orderID'];

        $clientId = 'ASA0Ew89wtLfsW8W9_OKIyAaz26r4PtAN9PZWTWI7jh4NGe4QRN_VEmhR-O4G68qJwaMiAKrckjMDq_P';
        $secret = 'EMy6R3veli6PHXm8kxszLeFsFFMX4gIMKJLvWe0QLCjPjzBT6smuzMNX4C2d1O9YKKJ08QHkSwMWd9UH';

        // =====================================
        // OBTENER ACCESS TOKEN
        // =====================================

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/oauth2/token');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_USERPWD, $clientId . ":" . $secret);

        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Accept-Language: en_US'
        ]);

        $resultado = curl_exec($ch);

        curl_close($ch);

        $resultado = json_decode($resultado);

        $accessToken = $resultado->access_token;

        // =====================================
        // CAPTURAR PAGO
        // =====================================

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,
            "https://api-m.sandbox.paypal.com/v2/checkout/orders/$orderID/capture"
        );

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: Bearer " . $accessToken
        ]);

        $respuesta = curl_exec($ch);

        curl_close($ch);

        $respuesta = json_decode($respuesta, true);

        // =====================================
        // RESPUESTA
        // =====================================

        echo json_encode([
            'status' => $respuesta['status'] ?? 'ERROR',
            'respuesta' => $respuesta
        ]);

    }
}