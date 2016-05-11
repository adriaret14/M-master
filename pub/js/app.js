
var show_mesg=function(str){
    $('.message').html('<p>'+str+'</p>');
    setTimeout(function(){
      $('.message').hide();}, 5000);
  
  };
  var show_msg_trans=function(str){
    $('.loading').css('visibility', 'visible');
    $('.loading').html('<h2>'+str+'</h2>');
    setTimeout(function(){$('.loading').css('visibility', 'hidden');},5000);
  };

  var loading_trans=function(){
    $('.loading').css('visibility', 'visible');
    setTimeout(function(){$('.loading').css('visibility', 'hidden');},3500);
  };


//login

$(document).ready(function(){
    function localizame() {
           navigator.geolocation.getCurrentPosition(coordenadas);
     }
     
     function coordenadas(){
           var latitud = position.coords.latitude;
           var longitud = position.coords.longitude;
     }
  
  //ESTA DE AQUI ME PERMITE SABER CUANDO ENTRO EN EL DASHBOARD
  var localiz=window.location.href;
  //alert(localiz);
  var local_aux=localiz.split("/");
  //alert(local_aux);
  var longit=local_aux.length;
  //alert(longit);
  if(local_aux[longit-1]=="dashboard")
  {
    //alert("ahora");
    mostrarAdminUsers();
  }
  if(local_aux[longit-1]=="home2")
  {
    //alert("Anuncios");
    mostrarAnuncios();
  }



  function mostrarAnuncios(){
    //alert("Ieeeeeeeeeeeee");
      $.ajax({
        url:"/M-master/home2/mostrar",     //aqui la llamada a al función del controlador del dashboard
        dataType:'json',
        success:function(output)
        {
          console.log(output);
           var long=output.length;
           for(i=0;i<long;i++)
           {
            $(".container3").append('<article><h3>'+output[i].titulo+'</h3><img src="'+output[i].foto_1+'"><p>'+output[i].descripcion+'</p><h5>'+output[i].precio+'$</h5><a class="likes" id="'+output[i].id_anuncio+'" href="">Like</a></article>');
           }
        }
      });
  }

  $("body").on("click", ".likes", function(){
    //alert("Hola");
    var y=$(this).attr("id");
    //alert(y);
    $.ajax({
      url:'/M-master/home2/valorar',
      type:'POST',
      data:{'id_a':y},
      dataType:'json',
      success:function(r){
        if(r==1)
        {
          alert("Se ha añadido la valoracion");
        }
        else
        {
          alert("Ya habias valorado este anuncio");
        }
      },
      error:function()
      { 
        console.log("AAAAAA");
      }
    });
  });

  function mostrarAdminUsers(){
    $.ajax({
      url:"/M-master/dashboard/mostrar",     //aqui la llamada a al función del controlador del dashboard
      dataType:'json',
      success:function(output)
      {
        //console.log(output);

        //Cuidado porque no puedo añadir a html un objeto json directamente, necesito parsearlo a string primero(stringify)
        //alert(JSON.stringify(output));
        //alert(output.length);
        var long=output.length;

        $("#dtabla").append('<table border="1">');
        $("table").append('<tr style="background-color:#6FBCD6"><th>Borrar</th><th>Nickname</th><th>Email</th><th>Nombre</th><th>Apellidos</th><th>Contraseña</th><th>Telefono</th><th>Rol</th></tr>');
        for(i=0;i<long;i++)
        {
          $("table").append('<tr><td><input type="checkbox" name="borrar_c" value="'+output[i].id_usuario+'" value="Borrar"></td><td id="nick'+output[i].id_usuario+'">'+output[i].nickname+'</td><td id="mail'+output[i].id_usuario+'">'+output[i].email+'</td><td id="nom'+output[i].id_usuario+'">'+output[i].nombre+'</td><td id="ape'+output[i].id_usuario+'">'+output[i].apellidos+'</td><td id="ps'+output[i].id_usuario+'">'+output[i].contra+'</td><td id="tf'+output[i].id_usuario+'">'+output[i].telefono+'</td><td id="typ'+output[i].id_usuario+'">'+output[i].Rol+'</td></tr>');
        }
        $("#dtabla").append('</table>');
        //$(".container2").append(output[0].nickname);
      }
    });
  }


  $('#article2').hide();
  

  $("form.ajax").on('submit', function(){

    var postData=$(this).serialize();
    var formURL=$(this).attr("action");
    $.ajax({
      url:formURL,
      data:postData,
      method:'post',
      dataType:'json',
      success:function(output)
      {
        console.log(output);
        window.location.href=output.redirect;
      }
    });
    return false;
  });
  //register
  $("form#registro.regi").on('submit', function(){
    var postData=$(this).serialize();
    var formURL=$(this).attr("action");
    $.ajax({
      url:formURL,
      data:postData,
      method:'post',
      dataType:'json',
      success:function(output)
      {
        console.log(output);
        window.location.href=output.redirect;
      }
    });
    return false;
  });

  $("header a").on('click', function(){
    //alert("aaaaaa");
    var formURL=$(this).attr("href");
    $.ajax({
      url:formURL,
      data:postData,
      method:'post',
      dataType:'json',
      success:function(output)
      {
        console.log(output);
        window.location.href=output.redirect;
      }
    });
    return false;
  });
  
  //menu de la aplicacion
  $('#ancla_m1').click(function(){
    //alert("Creando nuevo anuncio");
    //$('article').css("opacity", 0.7);
    $('container3').hide("fast");
    $('article').hide("fast");
    $('#article2').show("fast");
  });

  // $("form.ajax2").on('submit', function(){
  //   //alert("sdada");
  //   var postData=$(this).serialize();
  //   var formURL=$(this).attr("action");
  //   $.ajax({
  //     url:formURL,
  //     data:postData,
  //     method:'post',
  //     dataType:'json',
  //     success:function(output)
  //     {
  //       console.log(output);
  //       window.location.href=output.redirect;
  //     }
  //   });
  
  // });

  //crear anuncio
  /*$("form.ajax2").on('submit', function(){
    //alert("sdada");
    var postData=$(this).serialize();
    var formURL=$(this).attr("action");
    $.ajax({
      url:formURL,
      data:postData,
      method:'post',
      dataType:'json',
      success:function(output)
      {
        console.log(output);
        window.location.href=output.redirect;
      }
    });
  
  });*/
  
  //quitar el menu de crear anuncio 
  $('#cancelar').click(function(){
    $('#article2').hide("fast");
    $('container3').show("fast");
    $('article').show("fast"); 
  });

  //duplicacion de password
  $('#repass').focusout(function(){
      var pass=$("#pass").val();
      var repass=$("#repass").val();
      if(pass!==repass)
      {
        show_mesg('Passwords must be equal');
      }
  });

$("form.anu").on('submit', function(){
  var postData=$(this).serialize();
  var formURL=$(this).attr("action");
  $.ajax({
    url:formURL,
    data:postData,
    method:'POST',
    dataType:'json',
    success:function(output)
    {
       $("#dtabla").html('');
        mostrarAdminUsers();
        console.log(output);
        window.location.href=output.redirect;
    }
  });
});

$("form.auu").on('submit', function(){
  var postData=$(this).serialize();
  var formURL=$(this).attr("action");
  $.ajax({
    url:formURL,
    data:postData,
    method:'POST',
    dataType:'json',
    success:function(output)
    {
       $("#dtabla").html('');
        mostrarAdminUsers();
        console.log(output);
        window.location.href=output.redirect;
    }
  });
});

$("#bborrar").click(function(){
  //alert("Cucu");
  $("input[type=checkbox]:checked").each(function(){
    var x=$(this).val();
    $.ajax({
      url:'/M-master/dashboard/du',
      data:{'id': x},
      method:'POST',
      dataType:'json',
      success:function(output)
      {
        $("#dtabla").html('');
        mostrarAdminUsers();
        console.log(output);
        window.location.href=output.redirect;
      }
    });
  });
});

/*$("#bmodif").click(function(){
  //alert("Cucu");

  $("tr").each(function(){
    var x0=$(this).find("td input").val();  //id para el update
    var x1=$(this).find("td").eq(1).html(); //nick
    var x2=$(this).find("td").eq(2).html(); //mail
    var x3=$(this).find("td").eq(3).html(); //nombre
    var x4=$(this).find("td").eq(4).html(); //apellidos
    var x5=$(this).find("td").eq(5).html(); //contraseña
    var x6=$(this).find("td").eq(6).html(); //telefono
    var x7=$(this).find("td").eq(7).html(); //rol
    //alert(x0);
    if(x0==null)
    {
      //es el th
    }
    else
    {
            $.ajax({
            url:'/M-master/dashboard/uu',
            data:{'id': x0,'nick': x1,'mail': x2,'pass': x3,'nombre': x4,'apellidos': x5,'telf': x6,'tipo': x7},
            method:'POST',
            dataType:'json',
            success:function(output)
            {
              $("#dtabla").html('');
              mostrarAdminUsers();
              console.log(output);
              window.location.href=output.redirect;
            }
          });
    }
  });
});*/

});