<main class="registro">
    <h2 class="registro__heading"><?php echo $titulo; ?></h2>
    <p class="registro__descripcion">Elige tu plan</p>

    <div class="paquetes__grid">
        <div <?php aos_animacion(); ?> class="paquete">
            <h2 class="paquete__nombre">Pase gratis</h2>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
            </ul>
            <p class="paquete__precio">$0 USD</p>

            <form method="POST" action="/finalizar-registro/gratis">
                <input class="paquetes__submit" type="submit" value="Inscripcion Gratis">
            </form>
        </div>
        
        <div <?php aos_animacion(); ?> class="paquete">
            <h2 class="paquete__nombre">Pase Presencial</h2>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso presencial a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 4 dias</li>
                <li class="paquete__elemento">Acceso a talleres y conferencias</li>
                <li class="paquete__elemento">Acceso a las grabaciones</li>
                <li class="paquete__elemento">Camisa oficial del evento</li>
                <li class="paquete__elemento">Comida y bebida</li>
            </ul>
            <p class="paquete__precio">$39.99 USD</p>

            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container"></div>
                </div>	
            </div>
        </div>

        <div <?php aos_animacion(); ?> class="paquete">
            <h2 class="paquete__nombre">Pase Virtual</h2>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso virtual a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 4 dias</li>
                <li class="paquete__elemento">Acceso a talleres y conferencias</li>
                <li class="paquete__elemento">Acceso a las grabaciones</li>
            </ul>
            <p class="paquete__precio">$19.99 USD</p>

            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container-virtual"></div>
                </div>	
            </div>
        </div>
    </div>
</main>

<!-- SDK de PayPal -->
<script src="https://www.paypal.com/sdk/js?client-id=ASA0Ew89wtLfsW8W9_OKIyAaz26r4PtAN9PZWTWI7jh4NGe4QRN_VEmhR-O4G68qJwaMiAKrckjMDq_P&currency=USD" 
data-sdk-integration-source="button-factory"></script>

<script>

//Pase presencial
paypal.Buttons({
    style: {
        shape: 'rect',
        color: 'blue',
        layout: 'vertical',
        label: 'pay'
    },
    
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                custom_id: "1",
                description: "Pase PRESENCIAL DevWebCamp",
                amount: {
                    currency_code: "USD",
                    value: "39.99"
                }
            }]
        });
    },

    onApprove: function(data) {
        fetch('/paypal/capturar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                orderID: data.orderID
            })
        })
        .then(res => res.json())
        .then(respuesta => {

        console.log(
            JSON.stringify(respuesta, null, 2)
        );

        if(respuesta.status === 'COMPLETED') {
            const captura =
                respuesta.respuesta.purchase_units[0]
                .payments
                .captures[0];
            const paqueteID = captura.custom_id;
            const pagoID = captura.id;
            const datos = new FormData();
            datos.append('paquete_id', paqueteID);
            datos.append('pago_id', pagoID);

            fetch('/finalizar-registro/pagar', {
                method: 'POST',
                body: datos
            })
            .then(res => res.json())
            .then(resultado => {
                console.log(resultado);
                window.location.href = '/finalizar-registro/conferencias';
            });
            } else {
                alert('No se pudo completar el pago');
            }
        });
    },

    onError: function(err) {
        console.error('ERROR PAYPAL:', err);
        alert('Hubo un error con PayPal');
    }

}).render('#paypal-button-container');

//Pase virtual
paypal.Buttons({
    style: {
        shape: 'rect',
        color: 'blue',
        layout: 'vertical',
        label: 'pay'
    },
    
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                custom_id: "2",
                description: "Pase VIRTUAL DevWebCamp",
                amount: {
                    currency_code: "USD",
                    value: "19.99"
                }
            }]
        });
    },

    onApprove: function(data) {
        fetch('/paypal/capturar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                orderID: data.orderID
            })
        })
        .then(res => res.json())
        .then(respuesta => {

        console.log(
            JSON.stringify(respuesta, null, 2)
        );

        if(respuesta.status === 'COMPLETED') {
            const captura =
                respuesta.respuesta.purchase_units[0]
                .payments
                .captures[0];
            const paqueteID = captura.custom_id;
            const pagoID = captura.id;
            const datos = new FormData();
            datos.append('paquete_id', paqueteID);
            datos.append('pago_id', pagoID);

            fetch('/finalizar-registro/pagar', {
                method: 'POST',
                body: datos
            })
            .then(res => res.json())
            .then(resultado => {
                console.log(resultado);
                window.location.href = '/finalizar-registro/conferencias';
            });
            } else {
                alert('No se pudo completar el pago');
            }
        });
    },

    onError: function(err) {
        console.error('ERROR PAYPAL:', err);
        alert('Hubo un error con PayPal');
    }

}).render('#paypal-button-container-virtual');

</script>