$(function () {
  // SPA: Inicialización
  $(".view").hide();
  $("#view-home").show();

  $("[data-section='home']").click(function () {
    $(".view").hide();
    $("#view-home").show();
    $(".nav-link").removeClass("active");
    $(this).addClass("active");
  });

  $("[data-section='productos']").click(function () {
    $(".view").hide();
    $("#view-productos").show();
    $(".nav-link").removeClass("active");
    $(this).addClass("active");
  });

  $("[data-section='contacto']").click(function () {
    $(".view").hide();
    $("#view-contacto").show();
    $(".nav-link").removeClass("active");
    $(this).addClass("active");
  });

  $("[data-section='login']").click(function () {
    $(".view").hide();
    $("#view-login").show();
    $(".nav-link").removeClass("active");
    $(this).addClass("active");
  });

  // Manejo del hash en la URL
  $(window).on("hashchange", function () {
    var hash = location.hash;
    var seccion = hash.replace("#", "");
    if (seccion == "") { seccion = "home"; }

    $(".view").hide();
    $("#view-" + seccion).show();

    $(".nav-link").removeClass("active");
    $("[data-section='" + seccion + "']").addClass("active");
  });

  // Al hacer clic, cambia el hash (para historial)
  $("[data-section]").click(function () {
    var seccion = $(this).data("section");
    location.hash = seccion;
  });

  // Mostrar/ocultar descripción en cards
  $(".card").on("click", function () {
    $(this).find(".card-text").toggle();
  });

  /* ================= Formulario: validación mínima + modal ================= */
  var $f = $("#contact-form");
  if (!$f.length) $f = $("#view-contacto form").first();

  if ($f.length) {
    $f.on("submit", function (e) {
      e.preventDefault();
      var n = $("#nombre").val() || "",
          em = $("#email").val() || "",
          m = $("#mensaje").val() || "";
      var ok = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(em);

      if (n.trim() && ok && m.trim()) {
        this.reset();
        var modal = document.getElementById("graciasModal");
        if (modal && typeof bootstrap !== "undefined") new bootstrap.Modal(modal).show();
        else if ($("#graciasModal").length) $("#graciasModal").modal("show");
        else alert("¡Gracias!");
      } else {
        alert("Completa nombre, email válido y mensaje.");
      }
    });
  }
});
