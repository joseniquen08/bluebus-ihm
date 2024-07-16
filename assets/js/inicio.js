$(document).ready(function () {
  const origenField = $('#floatingSelectOrigen');
  const destinoField = $('#floatingSelectDestino');
  const fechaField = $('#floatingInputFecha');
  const searchButton = $('#search-button');

  function toggleSearchButton() {
    if (origenField.val() && destinoField.val() && fechaField.val()) {
      searchButton.prop('disabled', false);
    } else {
      searchButton.prop('disabled', true);
    }
  }

  origenField.change(function () {
    const origen = $(this).val();
    destinoField.prop('disabled', false);
    destinoField.html('<option selected disabled>Elige...</option>');

    for (const cod in destinos) {
      if (cod !== origen) {
        destinoField.append('<option value="' + cod + '">' + destinos[cod] + '</option>');
      }
    }

    toggleSearchButton();
  });

  destinoField.change(toggleSearchButton);
  fechaField.change(toggleSearchButton);

  $('#search-form').submit(function (event) {
    event.preventDefault();

    const origen = origenField.val();
    const destino = destinoField.val();
    const fecha = fechaField.val();

    $.ajax({
      url: 'api/buscar_viajes.php',
      method: 'POST',
      data: {
        origen: origen,
        destino: destino,
        fecha: fecha
      },
      success: function (response) {
        if (response.trim() === 'no-results') {
          $('#alerta').html('<div class="alert alert-warning" role="alert">No se encontraron viajes para los criterios seleccionados.</div>');
        } else if (response.trim() === 'invalid-date') {
          $('#alerta').html('<div class="alert alert-danger" role="alert">La fecha ingresada es inválida.</div>');
        } else if (response.trim() === 'missing-parameters') {
          $('#alerta').html('<div class="alert alert-danger" role="alert">Faltan parámetros para realizar la búsqueda.</div>');
        } else {
          window.location.href = 'viajes?origen=' + origen + '&destino=' + destino + '&fecha=' + fecha;
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error('Error: ' + textStatus + ' - ' + errorThrown);
      }
    });
  });
});