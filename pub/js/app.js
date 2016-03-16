
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
  
  ///ESTA DE AQUI ME PERMITE SABER CUANDO ENTRO EN EL DASHBOARD
  /*var localiz=window.location.href;
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

  function mostrarAdminUsers(){
    s.ajax({
      url:"/M-master/controllers/dashboard/mostrar",
      dataType:'json',
      success:function(output)
      {

      }
    });
  }*/

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
  
  //quitar el menu de crear anuncio 
  $('#cancelar').click(function(){
    $('#article2').hide("fast");
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

  /*$("form.anu").on('submit', function(){
    var postData=$(this).serialize();
    var formURL=$(this).attr("action");
    $.ajax({
      url:formURL,
      data:postData,
      method:'post',
      dataType:'json',
      success:function(output)
      {
        alert("User created.");
      }
      error:function(output)
      {
        alert("An error has ocurred.");
      }
    });
    return false;
  });*/

/*
  $("#mt").click(function(){
    //alert("clickado");
    var aux1="M-master/controllers/dashboard/mostrar";
    $.ajax({
      url:aux1,
      method:'GET',
      success:function(output){
        $("#tt").append(output);
      }
    });
  });
*/
});