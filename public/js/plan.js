$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


function selectProgram() {

  var x = document.getElementById("selectNivel").value;

  var element = document.getElementById("create_week");
  if (element != null) {


    if (x != 0) {
      element.classList.remove("d-none");
    } else {
      element.classList.add("d-none");
    }
  }

  MostrarContenido(x);
}

if (document.getElementById("create_week") != null) {
  document.getElementById("create_week").addEventListener("click", crearContenido);

  function crearContenido() {
    var x = document.getElementById("selectNivel").value;
    var element = document.getElementById("create_week");
    var seleccion = document.getElementById("seleccion");
    var creacion = document.getElementById("creacion");
    element.classList.add("d-none");
    seleccion.classList.add("d-none");
    creacion.classList.remove("d-none");
    document.getElementById("nombre_nivel").innerHTML = 'LESCO ' + x;


  }
}

const selectElement = document.querySelector('.selectProgram');

if (selectElement != null) {
  selectElement.addEventListener('change', (event) => {
    console.log(event.target.value);
    const $select = document.querySelector('.selectProgram');
    $select.querySelectorAll('option')[`${event.target.value}` - 1].selected = 'selected';
  });
}


$(document).on("click", "#crear", function (event) {
  $('.mensaje_error').html('')

  let nivel = $('#selectNivel').val();
  let contenido = CKEDITOR.instances['contenido'].getData()
  let semana = $('.selectProgram').val();
  let codigo = $("input[name=codigo]").val()

  if (contenido == '') {
    $('.alert-danger').removeClass('d-none')
    $('.mensaje_error').html('Obligatorio: contenido')
    return false
  } else if (codigo == '') {
    $('.alert-danger').removeClass('d-none')
    $('.mensaje_error').html('Obligatorio: código de video')
    return false
  }



  $.ajax({
    url: '/semanas/AgregarPlan',
    method: "POST",
    dataType: "json",
    data: {
      'id_nivel': nivel,
      'contenido': contenido,
      'semana': semana,
      'codigo_video': codigo

    },
    success: function (response) {

      if (response['message'] == 'success') {
        $('.alert-danger').addClass('d-none')
        window.location.href = window.location.href
      }

    },
    error: function (error) {
      console.log(error);
    }
  });
});


function MostrarContenido(x) {


  let permiso = $('#permiso').val();

  $(".nav-pills").html('');
  $("#v-pills-tabContent").html('');
  let list = "";
  let list2 = "";
  $.ajax({
    url: '/semanas/ListaPlanPorNivel',
    method: "POST",
    dataType: "json",
    data: {
      'id_nivel': x,


    },
    success: function (response) {


      $.each(response['data'], function (index, value) {

        const activar = (value.semana === 1) ? 'active' : ''
        list += ' <button class="pill-boton nav-link ' + activar + '" id="v-pills-' + value.semana + '-tab" data-bs-toggle="pill" data-bs-target="#v-pills-' + value.semana + '" type="button" role="tab" aria-controls="v-pills-' + value.semana + '" aria-selected="true">Semana ' + value.semana + '</button>';

      });
      $(".nav-pills").append(list);

      $.each(response['data'], function (index, value) {
        const mostrar = (value.semana === 1) ? 'show active' : ''


        list2 += '<div class="tab-pane fade ' + mostrar + '" id="v-pills-' + value.semana + '" role="tabpanel" aria-labelledby="v-pills-' + value.semana + '-tab">';
        list2 += '<div class="boton_editar"><a class="btn btn-secondary" href="/semanas/' + value.id_semana + '/edit">Editar plan</a></div>';
        list2 += '<div class="form-group">' + value.contenido + '</div>';
        list2 += '<div class="text-black fw-bold">INSTRUCCION PARA PROFESORES DE HANDS ON</div>';
        list2 += '<div><iframe src="https://www.youtube.com/embed/' + value.codigo_video + '" style="width: 35em;height: 19em;"></iframe></div>';
        list2 += '</div>';

      });

      $("#v-pills-tabContent").append(list2);

    },
    error: function (error) {
      console.log(error);
    }
  });
}