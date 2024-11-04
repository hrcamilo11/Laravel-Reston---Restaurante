@extends('layouts.base')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="{{ asset('js/secciones.js') }}" defer></script>
</head>
<body>
  
<!-- Header con Menú de Navegación -->
<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <span>Reston</span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#" data-section="commentsSection">Comentarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="productsSection">Productos</a>
                    </li>
                    <li class="nav-item">
                        @if (strpos(auth()->user()->email, '@admin') !== false) 
                            <a class="nav-link" href="#" data-section="usersSection">Usuarios</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('exit') }}">Salir</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>


  <div class="row">
      <!-- Sección de Comentarios -->
      <div id="commentsSection" class="col-12">
          <h2 class="text-white">Comentarios de Clientes</h2>
          <table class="table table-bordered text-white">
              <thead>
                  <tr class="text-secondary">
                      <th>Nombre</th>
                      <th>Comentario</th>
                      <th>Acciones</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($comments as $comment)
                  <tr>
                      <td class="fw-bold">{{ $comment->name }}</td>
                      <td>{{ $comment->message }}</td>
                      <td>
                          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editCommentModal-{{ $comment->id }}">
                              Editar
                          </button>
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteCommentModal-{{ $comment->id }}">
                              Eliminar
                          </button>
                          <!-- Modal de confirmación para eliminar comentario -->
                          <div class="modal fade" id="confirmDeleteCommentModal-{{ $comment->id }}" tabindex="-1" aria-labelledby="confirmDeleteCommentModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="confirmDeleteCommentModalLabel">Confirmar Eliminación</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          ¿Estás seguro de que deseas eliminar este comentario?
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                          <form action="{{ route('comments.destroy', $comment) }}" method="post" class="d-inline">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-danger">Sí, Eliminar</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </td>
                  </tr>

                  <!-- Modal para editar comentario -->
                  <div class="modal fade" id="editCommentModal-{{ $comment->id }}" tabindex="-1" aria-labelledby="editCommentModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="editCommentModalLabel">Editar Comentario</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <form action="{{ route('comments.update', $comment) }}" method="POST">
                                      @csrf
                                      @method('PUT')
                                      <div class="form-group">
                                          <label for="name" class="text-dark">Nombre</label>
                                          <input type="text" name="name" class="form-control" value="{{ $comment->name }}" required>
                                      </div>
                                      <div class="form-group">
                                          <label for="message" class="text-dark">Comentario</label>
                                          <textarea name="message" class="form-control" required>{{ $comment->message }}</textarea>
                                      </div>
                                      <button type="submit" class="btn btn-warning mt-2">Actualizar Comentario</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endforeach
              </tbody>
          </table>
      </div>
<!-- Sección de Productos -->
<div id="productsSection" class="col-12 mt-5" style="display: none;">
    <h2 class="text-white">Productos</h2>
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createProductModal">
        Crear Producto
    </button>

    <!-- Modal para crear producto -->
    <div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="createProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createProductModalLabel">Crear Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="text-dark">Nombre</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description" class="text-dark">Descripción</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price" class="text-dark">Precio</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="image" class="text-dark">Imagen</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Crear Producto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered text-white">
        <thead>
            <tr class="text-secondary">
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td class="fw-bold">{{ $producto->name }}</td>
                <td>{{ $producto->description }}</td>
                <td>${{ number_format($producto->price, 2) }}</td>
                <td>
                    <img src="{{ asset($producto->image) }}" alt="{{ $producto->name }}" style="width: 50px; height: 50px;">
                </td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editProductModal-{{ $producto->id }}">
                        Editar
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteProductModal-{{ $producto->id }}">
                        Eliminar
                    </button>

                    <!-- Modal de confirmación para eliminar producto -->
                    <div class="modal fade" id="confirmDeleteProductModal-{{ $producto->id }}" tabindex="-1" aria-labelledby="confirmDeleteProductModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteProductModalLabel">Confirmar Eliminación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que deseas eliminar este producto?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    <form action="{{ route('productos.destroy', $producto) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Sí, Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal para editar producto -->
                    <div class="modal fade" id="editProductModal-{{ $producto->id }}" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProductModalLabel">Editar Producto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name" class="text-dark">Nombre</label>
                                            <input type="text" name="name" class="form-control" value="{{ $producto->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="text-dark">Descripción</label>
                                            <textarea name="description" class="form-control" required>{{ $producto->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="price" class="text-dark">Precio</label>
                                            <input type="number" name="price" class="form-control" value="{{ $producto->price }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="text-dark">Imagen</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-warning mt-2">Actualizar Producto</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



      <!-- Sección de Usuarios -->
      <div id="usersSection" class="col-12 mt-5" style="display: none;">
          <h2 class="text-white">Usuarios</h2>
          <table class="table table-bordered text-white">
              <thead>
                  <tr class="text-secondary">
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Acciones</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($users as $user)
                  <tr>
                      <td class="fw-bold">{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteUserModal-{{ $user->id }}">
                              Eliminar
                          </button>

                          <!-- Modal de confirmación para eliminar usuario -->
                          <div class="modal fade" id="confirmDeleteUserModal-{{ $user->id }}" tabindex="-1" aria-labelledby="confirmDeleteUserModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="confirmDeleteUserModalLabel">Confirmar Eliminación</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          ¿Estás seguro de que deseas eliminar este usuario?
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                          <form action="{{ route('users.destroy', $user) }}" method="post" class="d-inline">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-danger">Sí, Eliminar</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>

</body>
@endsection
