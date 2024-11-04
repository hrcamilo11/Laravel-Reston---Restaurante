<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Reston </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
 
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <div class="hero_area">
    <div class="bg-box">
      <img src="images/hero-bg.jpg" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ url('/') }}">
            <span>
              Reston
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item active">
              <a class="nav-link" href="{{ url('/') }}">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/menu') }}">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/about') }}">Sobre nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/book') }}">Reserva una mesa</a>
              </li>
            </ul>
            <div class="user_option">
              <a href="{{ route('user') }}" class="user_link">
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
              <a class="cart_link" href="#">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                  <g>
                    <g>
                      <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                   c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                   C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                   c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                   C457.728,97.71,450.56,86.958,439.296,84.91z" />
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                   c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                    </g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                </svg>
              </a>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
              @auth
              <a href="{{ route('exit') }}" class="order_online">Cerrar sesion</a>
              @else
              <a href="{{ url('/login') }}" class="order_online">
              Iniciar sesión
             </a>
              @endauth

            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                    ¡Bienvenidos a Reston!
                    </h1>
                    <p>
                    En Reston, te invitamos a disfrutar de la mejor comida rápida de la ciudad. Nuestros platos están diseñados para satisfacer tu antojo, utilizando solo ingredientes frescos y de calidad.
                    </p>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                    Satisfacción en Cada Bocado
                    </h1>
                    <p>
                    Descubre nuestro variado menú que incluye hamburguesas jugosas, papas fritas crujientes y opciones saludables. ¡Hay algo para todos los gustos!
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                    Un Lugar para Compartir
                    </h1>
                    <p>
                    Resto es el lugar ideal para disfrutar con amigos y familia. Ven a vivir momentos inolvidables mientras saboreas nuestras deliciosas comidas rápidas en un ambiente acogedor.
                    </p>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
          </ol>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <!-- offer section -->

  <section class="offer_section layout_padding-bottom">
    <div class="offer_container">
      <div class="container ">
        <div class="row">
          <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="images/o1.jpg" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Martes de hamburguesas
                </h5>
                <h6>
                  <span>20%</span> Off
                </h6>
                <a href="">
                  Compra ahora <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                    <g>
                      <g>
                        <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                     c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                     C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                     c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                     C457.728,97.71,450.56,86.958,439.296,84.91z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                     c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                      </g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="images/o2.jpg" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Viernes de Pizza
                </h5>
                <h6>
                  <span>15%</span> Off
                </h6>
                <a href="">
                  Compra ahora <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                    <g>
                      <g>
                        <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                     c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                     C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                     c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                     C457.728,97.71,450.56,86.958,439.296,84.91z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                     c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                      </g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end offer section -->

<!-- food section -->
<section class="food_section layout_padding-bottom">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Nuestro Menú
            </h2>
        </div>

        <!-- Filtros de menú -->
        <div class="filters_menu">
            <ul class="filters_menu">
                <li class="active" data-filter="*" onclick="filterCategory('*')">All</li>
                <li data-filter=".burger" onclick="filterCategory('.burger')">hamburguesa</li>
                <li data-filter=".pizza" onclick="filterCategory('.pizza')">Pizza</li>
                <li data-filter=".pasta" onclick="filterCategory('.pasta')">Pasta</li>
                <li data-filter=".fries" onclick="filterCategory('.fries')">papas</li>
            </ul>
        </div>

        <div class="filters-content">
            <div class="row grid" id="productGrid">
                @foreach($productos as $producto)
                    <div class="col-sm-6 col-lg-4 all {{ $producto->categoria }}">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset($producto->image) }}" alt="{{ $producto->name }}" style="width: auto; height: auto;">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{ $producto->name }}
                                </h5>
                                <p>
                                    {{ $producto->description }}
                                </p>
                                <div class="options">
                                    <h6>
                                        ${{ number_format($producto->price, 2) }}
                                    </h6>
                                    <a href="">
                                        <!-- SVG icon aquí -->
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
    function filterCategory(category) {
        const products = document.querySelectorAll('.grid .col-sm-6');

        products.forEach(product => {
            // Mostrar u ocultar productos basados en la categoría seleccionada
            if (category === '*' || product.classList.contains(category.substring(1))) {
                product.style.display = ""; // Mostrar producto
            } else {
                product.style.display = "none"; // Ocultar producto
            }
        });
    }
</script>


  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Somos Resto
              </h2>
            </div>
            <p>
    ¡Bienvenidos a Resto! Somos un restaurante de comidas rápidas apasionado por ofrecerte la mejor experiencia culinaria en un ambiente acogedor y moderno. Desde nuestra apertura, nos hemos comprometido a servir platos deliciosos y de calidad, utilizando ingredientes frescos y recetas innovadoras.<br><br>

    En Resto, entendemos que cada bocado cuenta. Por eso, nuestro menú incluye una variedad de opciones que satisfacen todos los gustos, desde hamburguesas jugosas y papas fritas crujientes hasta ensaladas frescas y batidos refrescantes. Ya sea que estés buscando una comida rápida para llevar o un lugar para disfrutar con amigos y familia, aquí encontrarás lo que necesitas.<br><br>

    Nuestro equipo está compuesto por apasionados de la gastronomía, dedicados a brindarte un servicio excepcional y hacer de cada visita una experiencia memorable. En Resto, no solo nos preocupamos por el sabor, sino también por el ambiente y la satisfacción de nuestros clientes.<br><br>

    ¡Te invitamos a visitarnos y descubrir por qué Resto es el lugar favorito de todos para disfrutar de las mejores comidas rápidas!
</p>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- book section -->
  <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Has una reservacion
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="">
              <div>
                <input type="text" class="form-control" placeholder="Tu nombre" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Numero de telefono" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Tu Correo" />
              </div>
              <div>
                <select class="form-control nice-select wide">
                  <option value="" disabled selected>
                    cuantas personas?
                  </option>
                  <option value="">
                    2
                  </option>
                  <option value="">
                    3
                  </option>
                  <option value="">
                    4
                  </option>
                  <option value="">
                    5
                  </option>
                </select>
              </div>
              <div>
                <input type="date" class="form-control">
              </div>
              <div class="btn_box">
                <button>
                  Solicita ahora
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container ">
            <div id="googleMap"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end book section -->
  <section class="client_section layout_padding-bottom">
    <div class="container">
        <div class="heading_container heading_center psudo_white_primary mb_45">
            <h2>
                Que dicen nuestros clientes
            </h2>
        </div>
        <div class="carousel-wrap row">
            <div class="owl-carousel client_owl-carousel">
                @foreach ($comments as $comment)
                <div class="item">
                    <div class="box">
                        <div class="detail-box">
                            <p>
                                {{ $comment->message }}
                            </p>
                            <h6>
                                {{ $comment->name }}
                            </h6>
                            
                        </div>
                        <div class="img-box">
                            <img src="images/usuario.png" alt="" class="box-img"> <!-- Cambia la ruta de la imagen según sea necesario -->
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Botón para crear un nuevo comentario -->
<div class="text-center mt-4">
    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#createCommentModal">
        ¡Crea tu propio comentario aquí!
    </button>
</div>

<!-- Modal para crear un nuevo comentario -->
<div class="modal fade" id="createCommentModal" tabindex="-1" aria-labelledby="createCommentLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCommentLabel">Crear Comentario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createCommentForm" action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="text-dark">Nombre</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="message" class="text-dark">Comentario</label>
                        <textarea name="message" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Crear Comentario</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script para cerrar el modal después del envío del formulario -->
<script>
    document.getElementById('createCommentForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Previene el comportamiento por defecto del formulario
        const formData = new FormData(this);

        fetch(this.action, {
            method: this.method,
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Asegúrate de que el token CSRF esté incluido
            }
        })
        .then(response => {
            if (response.ok) {
                return response.json(); // Asegúrate de que el servidor devuelva un JSON
            } else {
                throw new Error('Error en la creación del comentario');
            }
        })
        .then(data => {
            // Si el comentario se ha creado exitosamente, cierra el modal
            $('#createCommentModal').modal('hide'); // Cierra el modal
            this.reset(); // Limpia el formulario
            location.reload(); // Recarga la página
        })
        .catch(error => {
            console.error('Error:', error);
            // Mostrar el mensaje de error en la consola para depuración
            alert('Ocurrió un error al crear el comentario: ' + error.message); // Mensaje de error opcional
        });
    });
</script>


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Contactanos
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Estamos en:
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Llama al 3125792542
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  restonrestaurant@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
              Reston
            </a>
            <p>
            Resto es un restaurante de comidas rápidas dedicado a ofrecer platos deliciosos y frescos en un ambiente acogedor. Nuestro compromiso es brindarte la mejor experiencia culinaria cada vez que nos visites.
            </p>
            <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Horarios
          </h4>
          <p>
            Todos los dias
          </p>
          <p>
            10.00 Am -10.00 Pm
          </p>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> Todos los derechos reservados por
          <a href="https://html.design/">restonrestaurant</a><br><br>
          &copy; <span id="displayYear"></span> Distributed By
          <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>
