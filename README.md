# 🍽️ RESTON - Sistema de Gestión de Restaurante

## 📋 Descripción

RESTON es una aplicación web robusta desarrollada con Laravel, diseñada específicamente para la gestión integral de restaurantes. Ofrece una suite completa de funcionalidades que incluyen:

- 🍔 Gestión de menú
- 📅 Sistema de reservas
- 💬 Manejo de comentarios y feedback de clientes
- 👥 Administración de usuarios

## ✨ Características Principales

### 1. 👤 Gestión de Usuarios
- 🔐 Registro y autenticación segura
- 🎭 Sistema de roles y permisos
- 🖼️ Perfiles de usuario personalizables

### 2. 🍽️ Gestión de Menú
- ✏️ CRUD completo para productos
- 🗂️ Categorización eficiente
- 💰 Gestión de precios y descripciones detalladas

### 3. 📅 Sistema de Reservas
- 🪑 Reserva de mesas intuitiva
- ⏰ Gestión de horarios flexible
- ✅ Sistema de confirmaciones automáticas

### 4. 💬 Sistema de Comentarios
- 📝 Recopilación de feedback de usuarios
- 🛡️ Moderación de comentarios
- 🤝 Herramientas para interacción con clientes

## 🏗️ Arquitectura y Diseño

RESTON sigue una arquitectura MVC (Modelo-Vista-Controlador) robusta y utiliza patrones de diseño modernos para garantizar un código limpio, mantenible y escalable.

### Componentes Principales

| Componente | Descripción | Ubicación |
|------------|-------------|-----------|
| 🎮 Controladores | Lógica de la aplicación | `app/Http/Controllers/` |
| 📊 Modelos | Entidades de la base de datos | `app/Models/` |
| 🖼️ Vistas | Interfaces de usuario (Blade) | `resources/views/` |
| 🛣️ Rutas | Puntos de entrada de la aplicación | `routes/web.php`, `routes/api.php` |
| 🔀 Migraciones | Estructura de la base de datos | `database/migrations/` |
| 🌱 Seeders | Datos iniciales | `database/seeders/` |


### Prerrequisitos

Asegúrate de tener instalado en tu sistema:



### 📊 Modelos
Representan la lógica de negocio y la interacción con la base de datos:
- `User.php`
- `Comment.php`
- `Producto.php`

### 🖼️ Vistas
Interfaces de usuario implementadas con Blade:
- 🧩 Layouts modulares
- 🔄 Componentes reutilizables
- 🎨 Integración de Bootstrap y CSS personalizado

### 🎮 Controladores
Manejan la lógica de la aplicación:
- `AuthController`
- `CommentController`
- `ProductController`

### 🧬 Patrones de Diseño Implementados
- 📚 **Repository Pattern**: Para una separación clara de la lógica de acceso a datos.
- 🔌 **Service Provider Pattern**: Utilizado para la configuración global y la inyección de dependencias.
- 🏭 **Factory Pattern**: Implementado para la creación eficiente de objetos, especialmente en migraciones y seeders.

## 👌 Buenas Prácticas

### 🔒 Seguridad
- 🛡️ Autenticación y autorización robusta
- 🚫 Protección contra CSRF
- ✅ Validación exhaustiva de entrada de datos
- 🔐 Encriptación segura de contraseñas

### 🧹 Código Limpio
- 📝 Nomenclatura descriptiva para variables y funciones
- 💡 Comentarios explicativos estratégicamente ubicados
- 🗂️ Organización lógica y estructurada del código
- 🔄 Aplicación del principio DRY (Don't Repeat Yourself)

### 💾 Base de Datos
- 🔄 Migraciones versionadas para un control preciso
- 🔗 Relaciones bien definidas entre entidades
- 🚀 Índices optimizados para un rendimiento superior
- 🔒 Uso de transacciones donde sea necesario

### 🖥️ Frontend
- 📱 Diseño totalmente responsivo
- 🎨 CSS modular y mantenible
- ⚡ JavaScript organizado y eficiente
- 🚀 Optimización de recursos para carga rápida

## 🛠️ Requisitos Técnicos

- 🐘 PHP >= 8.1
- 🚀 Laravel 10.x
- 🐬 MySQL/PostgreSQL
- 🎼 Composer
- 📦 Node.js y NPM

## 🚀 Instalación

Sigue estos pasos para configurar RESTON en tu entorno local:

```bash
# Clonar el repositorio
git clone https://github.com/hrcamilo11/Laravel-Reston---Restaurante.git

# Instalar dependencias
composer install
npm install

# Configurar el entorno
cp .env.example .env
php artisan key:generate

# Migrar la base de datos
php artisan migrate

# Compilar assets
npm run dev

# Iniciar el servidor
php artisan serve
```

## 📁 Estructura de Directorios

```
reston/
├── app/
│   ├── Http/Controllers/
│   ├── Models/
│   └── Providers/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
│   ├── css/
│   └── js/
├── resources/
│   ├── views/
│   └── js/
└── routes/
    └── web.php
```

## 🤝 Contribución

¡Las contribuciones son bienvenidas y apreciadas! Para contribuir:

1. 🍴 Fork el proyecto
2. 🌿 Crea una rama para tu función (`git checkout -b feature/AmazingFeature`)
3. 💾 Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. 📤 Push a la rama (`git push origin feature/AmazingFeature`)
5. 🔀 Abre un Pull Request

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo `LICENSE.md` para más detalles.

## 📞 Contacto

👨‍💻 Camilo Hernández - [GitHub](https://github.com/hrcamilo11)

🔗 Link del proyecto: [https://github.com/hrcamilo11/Laravel-Reston---Restaurante](https://github.com/hrcamilo11/Laravel-Reston---Restaurante)

---

¡Gracias por tu interés en RESTON! 🙌 Si tienes alguna pregunta o sugerencia, no dudes en abrir un issue o contactarnos directamente. ¡Buen provecho! 🍽️🍔
