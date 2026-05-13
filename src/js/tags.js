(function(){
    const tagsInput = document.querySelector('#tags_input')

    if(tagsInput){

        const tagsDiv = document.querySelector('#tags');
        const tagsInputHidden = document.querySelector('[name="tags"]');

        let tags = [];

        //Recuperar del input oculto
        if(tagsInputHidden.value !== ''){
            tags = tagsInputHidden.value.split(',');
            mostrarTags();
        }

        //Escuchar los campos en el input
        tagsInput.addEventListener('keypress', guardarTag)
        function guardarTag(e){
            if(e.keyCode === 44){
                if(e.target.value.trim() === '' || e.target.value < 1){ 
                    return
                }
                e.preventDefault();
                tags = [...tags, e.target.value.trim()];
                tagsInput.value = '';

                mostrarTags();
            }
        }

        function mostrarTags(){
            tagsDiv.textContent = '';

                tags.forEach(tag => {
                    const etiqueta = document.createElement('LI');
                    etiqueta.classList.add('formulario__tag');
                    
                    // Texto del tag
                    const texto = document.createElement('SPAN');
                    texto.textContent = tag;
                    
                    // Botón eliminar (X)
                    const botonEliminar = document.createElement('SPAN');
                    botonEliminar.classList.add('formulario__tag-eliminar');
                    botonEliminar.textContent = '×';
                    
                    // Evento click en la X
                    botonEliminar.onclick = eliminarTag;
                    
                    // Mantener doble click si quieres
                    etiqueta.ondblclick = eliminarTag;
                    etiqueta.appendChild(texto);
                    etiqueta.appendChild(botonEliminar);
                    tagsDiv.appendChild(etiqueta);
            });

            actualizarInputHidden();
        }

        function eliminarTag(e){
            let tagTexto;

            if(e.target.classList.contains('formulario__tag-eliminar')){
                tagTexto = e.target.parentElement.firstChild.textContent;
                e.target.parentElement.remove();
            }else{
                tagTexto = e.target.firstChild.textContent;
                e.target.remove();
            }
            tags = tags.filter(tag => tag !== tagTexto);
            actualizarInputHidden();
        }

        function actualizarInputHidden(){
            tagsInputHidden.value = tags.toString();
        }
    }
})();