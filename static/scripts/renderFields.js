const pasajerosSection = document.getElementById('pasajeros-section');
const cantidadInput = document.getElementById('cantidad_puestos');

function renderPasajerosFields() {
    const n = parseInt(cantidadInput.value) || 1;
    pasajerosSection.innerHTML = '';
    const antiguos = window.pasajerosAntiguos || [];
    for (let i = 0; i < n; i++) {
        const p = antiguos[i] || {};
        pasajerosSection.innerHTML += `
        <div class='p-4 rounded-md'>
            <h3 class='text-lg font-semibold my-4 text-center'>Pasajero ${i+1}</h3>
            <div class='grid grid-cols-1 md:grid-cols-3 gap-4'>
                <div class='space-y-2'>
                    <label class='block text-sm font-medium text-gray-700'>Nombre</label>
                    <input type='text' name='pasajeros[${i}][nombre]' value='${p.nombre || ''}' required class='w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200'/>
                </div>
                <div class='space-y-2'>
                    <label class='block text-sm font-medium text-gray-700'>Apellido</label>
                    <input type='text' name='pasajeros[${i}][apellido]' value='${p.apellido || ''}' required class='w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200'/>
                </div>
                <div class='space-y-2'>
                    <label class='block text-sm font-medium text-gray-700'>Nro de Pasaporte</label>
                    <input type='text' name='pasajeros[${i}][pasaporte]' value='${p.fk_pasaporte || ''}' required class='w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200'/>
                </div>
                <div class='space-y-2'>
                    <label class='block text-sm font-medium text-gray-700'>Edad</label>
                    <input type='number' name='pasajeros[${i}][edad]' value='${p.edad || ''}' min='0' required class='w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200'/>
                </div>
                <div class='space-y-2'>
                    <label class='block text-sm font-medium text-gray-700'>Sexo</label>
                    <select name='pasajeros[${i}][sexo]' required class='w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200'>
                        <option value='Masculino' ${p.sexo === 'Masculino' ? 'selected' : ''}>Masculino</option>
                        <option value='Femenino' ${p.sexo === 'Femenino' ? 'selected' : ''}>Femenino</option>
                    </select>
                </div>
                <div class='space-y-2'>
                    <label class='block text-sm font-medium text-gray-700'>Clase</label>
                    <select name='pasajeros[${i}][clase]' required class='w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200'>
                        <option value='Primera' ${p.clase === 'Primera' ? 'selected' : ''}>Primera</option>
                        <option value='Economica' ${p.clase === 'Economica' ? 'selected' : ''}>Económica</option>
                        <option value='Turista' ${p.clase === 'Turista' ? 'selected' : ''}>Turista</option>
                    </select>
                </div>
                <div class='space-y-2'>
                    <label class='block text-sm font-medium text-gray-700'>Asiento</label>
                    <input type='text' name='pasajeros[${i}][asiento]' value='${p.asiento || ''}' required class='w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200'/>
                </div>
                <div class='space-y-2'>
                    <label class='block text-sm font-medium text-gray-700'>Precio (Yenes)</label>
                    <input type='number' name='pasajeros[${i}][precio]' value='${p.precio || ''}' min='0' required class='w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200'/>
                </div>
            </div>
        </div>
        `;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    if (window.pasajerosAntiguos && window.pasajerosAntiguos.length > 0) {
        cantidadInput.value = window.pasajerosAntiguos.length;
    }
    renderPasajerosFields();
});

cantidadInput.addEventListener('input', renderPasajerosFields);
