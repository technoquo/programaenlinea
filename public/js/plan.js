$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function selectProgram() {

    var x = document.getElementById("selectNivel").value;

    var element = document.getElementById("create_week");
    if (x != 0) {
        element.classList.remove("d-none");
    } else {
        element.classList.add("d-none");
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
         document.getElementById("nombre_nivel").innerHTML = 'LESCO '+ x;
         

    }
}

const selectElement = document.querySelector('.selectProgram');

if (selectElement != null) {
selectElement.addEventListener('change', (event) => {
 
   const $select = document.querySelector('.selectProgram');
   $select.querySelectorAll('option')[`${event.target.value}`].selected = 'selected';
});
}


$(document).on("click", "#crear", function(event) {
   $('.mensaje_error').html('')

   let nivel =$('#selectNivel').val(); 
   let contenido = CKEDITOR.instances['contenido'].getData()
   let semana =  $('.selectProgram').val();
   let codigo = $("input[name=codigo]").val()

    if (contenido == ''){
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
          'codigo_video':codigo

      },
      success: function(response){
        
         if (response['message']=='success') {   
         $('.alert-danger').addClass('d-none')
         window.location.href = window.location.href
         }

      },
      error: function(error) {
      console.log(error);
      }
  });
});


function MostrarContenido(x){
   console.log(x);
}