import './bootstrap';
import $ from 'jquery';

document.addEventListener('DOMContentLoaded', function() {
    let noCalidadMessage = document.querySelector('.no_calidad');
    noCalidadMessage.style.display = 'none'
    document.getElementById('proveedor').addEventListener('change', function() {
        var proveedorId = this.value;
        var calidadSelect = document.getElementById('calidad');
        calidadSelect.disabled = true;
        calidadSelect.innerHTML = '<option value="">Seleccione una calidad</option>';
      
        if (proveedorId) {
            fetch(`/calidades/${proveedorId}`)
                .then(response => response.json())
                .then(data => {
                    calidadSelect.disabled = false;
                    if(data.length > 0){
                        noCalidadMessage.style.display = 'none';
                        calidadSelect.style.display="inline";
                        data.forEach(calidad => {
                            var option = document.createElement('option');
                            option.value = calidad.id;
                            option.text = calidad.nombre;
                            calidadSelect.add(option);
                        });
                    }else{
                        calidadSelect.style.display="none";
                        noCalidadMessage.style.display = 'block';

                    }
                    
                });
        }
    });
});