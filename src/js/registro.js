import Swal from 'sweetalert2';

(function(){
    let eventos = [];

    const resumen = document.querySelector('#registro-resumen');

    if(resumen){
        const eventosBoton = document.querySelectorAll('.evento__agregar');
        eventosBoton.forEach(boton => boton.addEventListener('click', agregarEvento));

        const formularioRegistro = document.querySelector('#registro');
        formularioRegistro.addEventListener('submit', submitFormulario);
        mostrarEventos();

        function agregarEvento({target}){

            if(eventos.length < 5){
                //Desabilitar el evento
                target.disabled = true;
                eventos = [...eventos, {
                    id: target.dataset.id,
                    titulo: target.parentElement.querySelector('.evento__nombre').textContent.trim(),
                }]
                mostrarEventos();
            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'Solo puedes agregar 5 eventos',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                })
            }
        }

        function mostrarEventos(){
            //Limpiar el HTML
            limpiarEventos();

            if(eventos.length > 0){
                eventos.forEach(evento => {
                    const eventoDOM = document.createElement('DIV');
                    eventoDOM.classList.add('registro__evento');

                    const titulo = document.createElement('H3');
                    titulo.classList.add('registro__nombre');
                    titulo.textContent = evento.titulo;

                    const botonEliminar = document.createElement('BUTTON');
                    botonEliminar.classList.add('registro__eliminar');
                    botonEliminar.innerHTML = `<i class="fa-solid fa-trash"></i>`;
                    botonEliminar.onclick = function(){
                        eliminarEvento(evento.id);
                    }

                    //Renderizar en el HTML
                    eventoDOM.appendChild(titulo);
                    eventoDOM.appendChild(botonEliminar);
                    resumen.appendChild(eventoDOM);
                })
            } else {
                const noRegistro = document.createElement('P');
                noRegistro.textContent = 'No hay eventos, puedes añadir hasta 5 eventos de lado izquierdo';
                noRegistro.classList.add('registro__texto');
                resume.appendChild(noRegistro);
            }   
        }

        function eliminarEvento(id){
            eventos = eventos.filter(evento => evento.id !== id);
            const botonAgregar = document.querySelector(`[data-id="${id}"]`);
            botonAgregar.disabled = false;
            mostrarEventos();
        }

        function limpiarEventos(){
            while(resumen.firstChild){
                resumen.removeChild(resumen.firstChild);
            }
        }

        async function submitFormulario(e){
            e.preventDefault();

            //Obtener el regalo
            const regaloId = document.querySelector('#regalo').value;

            const eventosId = eventos.map(evento => evento.id);

            if(eventosId.length === 0 || regaloId === ''){
                Swal.fire({
                    title: 'Error',
                    text: 'Elige al menos un evento y un regalo',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                })
                return;
            }

            
            //Objeto de FormData
            const datos = new FormData();
            datos.append('eventos', eventosId);
            datos.append('regalo_id', regaloId);

            const url = '/finalizar-registro/conferencias';
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            })
            const resultado = await respuesta.json();

            if(resultado.resultado){
                Swal.fire(
                    'Registro de forma exitosa',
                    'Tus eventos se han almacenado correctamente y tu registro fue completado, te esperamos en DevWebCamp',
                    'success' 
                ).then(() => location.href = `/boleto?id=${resultado.token}`)
            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un error en tu registro',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                }).then(() => location.reload()) 
            }
        }
    }
})();