const now = new Date();

// Establecer la fecha mínima (hoy)
const year = now.getFullYear();
const month = String(now.getMonth() + 1).padStart(2, '0');
const day = String(now.getDate()).padStart(2, '0');
const hours = String(now.getHours()).padStart(2, '0');
const minutes = String(now.getMinutes()).padStart(2, '0');

const formattedDateTimeMin = `${year}-${month}-${day}T${hours}:${minutes}`;
document.getElementById('datetime').min = formattedDateTimeMin;

// Calcular la fecha máxima (2 semanas en el futuro)
const maxDate = new Date(now);
maxDate.setDate(now.getDate() + 14); // Sumar 14 días

const maxYear = maxDate.getFullYear();
const maxMonth = String(maxDate.getMonth() + 1).padStart(2, '0');
const maxDay = String(maxDate.getDate()).padStart(2, '0');
const maxHours = String(maxDate.getHours()).padStart(2, '0');
const maxMinutes = String(maxDate.getMinutes()).padStart(2, '0');

const formattedDateTimeMax = `${maxYear}-${maxMonth}-${maxDay}T${maxHours}:${maxMinutes}`;
document.getElementById('datetime').max = formattedDateTimeMax;

// Restringir la hora seleccionada
document.getElementById('datetime').addEventListener('input', function () {
    const selectedDate = new Date(this.value);
    const selectedHours = selectedDate.getHours();

    // Si la hora seleccionada está fuera del rango permitido (6:00 AM - 6:00 PM)
    if (selectedHours < 6 || selectedHours >= 18) {
        alert('Por favor, selecciona una hora entre las 6:00 AM y las 6:00 PM');
        // Opcionalmente, puedes restablecer el valor al mínimo permitido
        this.value = '';
    }
});
