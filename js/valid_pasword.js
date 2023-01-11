$(document).ready(function () {
  $("#password1").keyup(function () {
    $("#mensajeSalida").html(checkStrength($("#password1").val()));
  });
  function checkStrength(password) {
    var strength = 0;
    if (password.length < 6) {
      $("#mensajeSalida").removeClass();
      $("#mensajeSalida").addClass("Short");
      return "Demasiado Corto";
    }
    if (password.length > 7) strength += 1;
    // If password contains both lower and uppercase characters, increase strength value.
    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1;
    // If it has numbers and characters, increase strength value.
    if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))
      strength += 1;
    // If it has one special character, increase strength value.
    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;
    // If it has two special characters, increase strength value.
    if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/))
      strength += 1;
    // Calculated strength value, we can return messages
    // If value is less than 2
    if (strength < 2) {
      $("#mensajeSalida").removeClass();
      $("#mensajeSalida").addClass("Weak");
      return "Debil";
    } else if (strength == 2) {
      $("#mensajeSalida").removeClass();
      $("#mensajeSalida").addClass("Good");
      return "Buena";
    } else {
      $("#mensajeSalida").removeClass();
      $("#mensajeSalida").addClass("Strong");
      return "Fuerte";
    }
  }
});

/*-----------------------------*/


$(document).ready(function () {
  //variables
  var pass1 = $("[name=password1]");
  var pass2 = $("[name=password2]");
  var confirmacion = "Las contraseñas si coinciden";
  var negacion = "No coinciden las contraseñas";
  var vacio = "La contraseña no puede estar vacía";
  //oculto por defecto el elemento span
  var span = $("<div id='repeatpasMessage' ></div>").insertAfter(pass2);
  span.hide();
  //función que comprueba las dos contraseñas
  function coincidePassword() {
    var valor1 = pass1.val();
    var valor2 = pass2.val();
    //muestro el span
    span.show().removeClass();
    //condiciones dentro de la función
    if (valor1 != valor2) {
      $("#repeatpasMessage").removeClass();
      span.text(negacion).addClass("Weak");
    }
    if (valor1.length == 0 || valor1 == "") {
      $("#repeatpasMessage").removeClass();
      span.text(vacio).addClass("Weak");
    }
    if (valor2.length == 0 || valor2 == "") {
      $("#repeatpasMessage").removeClass();
      span.text(vacio).addClass("Weak");
    }
    if (valor2.length == 0 || valor2 == "") {
      $("#repeatpasMessage").removeClass();
      span.text(vacio).addClass("Weak");
    }

    if (valor1.length != 0 && valor1 == valor2) {
      span.text(confirmacion).removeClass("Weak").addClass("Good");
    }
  }
  //ejecuto la función al soltar la tecla
  pass2.keyup(function () {
    coincidePassword();
  });
});

window.addEventListener("load", function () {
  // icono para poder interaccionar con el elemento
  iconshowPassword = document.querySelector(".iconshowPassword");
  showPassword = document.querySelector(".btn-view-password");

  showPassword.addEventListener("click", () => {
    // elementos input de tipo password
    password1 = document.querySelector("#password1");
    password2 = document.querySelector("#password2");

    if (password1.type === "text") {
      password1.type = "password";
      password2.type = "password";
      iconshowPassword.classList.remove("fa-eye-slash");
    } else {
      password1.type = "text";
      password2.type = "text";
      iconshowPassword.classList.toggle("fa-eye-slash");
    }
  });
});




