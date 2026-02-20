# CRM Laravel — Segunda Entrega

## Descripción

Ampliación de un CRM básico desarrollado con **Laravel 12** y **Jetstream** como sistema de autenticación. En esta segunda entrega se incorporan funcionalidades avanzadas: listados con DataTables, subida de imágenes y archivos PDF, y un sistema de roles con control de permisos.

---

## Tecnologías utilizadas

- PHP 8.x
- Laravel 12
- Laravel Jetstream (autenticación)
- MySQL
- Yajra DataTables
- Bootstrap 5
- jQuery

---

## Requisitos previos

- PHP >= 8.1
- Composer
- Node.js y NPM
- MySQL o MariaDB
- Laravel instalado globalmente (opcional)

---

## Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/pikatostes/crm-laravel-sistemas.git
cd crm-laravel-sistemas
git checkout segunda
```

### 2. Instalar dependencias PHP

```bash
composer install
```

### 3. Instalar dependencias JavaScript

```bash
npm install && npm run build
```

### 4. Configurar el entorno

```bash
cp .env.example .env
php artisan key:generate
```

Editar el archivo `.env` con los datos de la base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crm-laravel-sistemas
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Ejecutar migraciones

```bash
php artisan migrate
```

### 6. Crear el enlace simbólico de storage

```bash
php artisan storage:link
```

### 7. Asignar rol de administrador

```bash
php artisan tinker
```

```php
App\Models\User::where('email', 'tu@email.com')->update(['role' => 'admin']);
exit
```

### 8. Arrancar el servidor

```bash
php artisan serve
```

Acceder en el navegador a: `http://127.0.0.1:8000/`

---

## Funcionalidades implementadas

### Autenticación con Jetstream

El proyecto usa Laravel Jetstream para gestionar el registro, login y perfil de usuarios. Incluye verificación de email, gestión de sesiones y tokens de API.

### Sistema de roles

Se han definido dos roles de usuario:

| Rol | Permisos |
|---|---|
| `admin` | Crear, editar y eliminar clientes |
| `usuario` | Crear y editar clientes (no puede eliminar) |

El rol se almacena en el campo `role` de la tabla `users`. Por defecto, los nuevos usuarios reciben el rol `usuario`.

Para cambiar el rol de un usuario a admin se usa Tinker (ver paso de instalación) o directamente desde la base de datos.

### DataTables

El listado de clientes utiliza la librería **Yajra DataTables** con renderizado en servidor (*server-side*), lo que permite:

- Búsqueda en tiempo real
- Ordenación por columnas
- Paginación automática
- Interfaz en español

El paquete instalado es:

```bash
composer require yajra/laravel-datatables-oracle
```

### Subida de imágenes

Al crear o editar un cliente se puede subir una foto. Las imágenes se almacenan en:

```
storage/app/public/clientes/fotos/
```

Y se muestran en el listado y en el formulario de edición. Formatos aceptados: `jpg`, `jpeg`, `png`, `webp`. Tamaño máximo: 2 MB.

### Subida de archivos PDF

Cada cliente puede tener asociado un documento PDF. Los archivos se almacenan en:

```
storage/app/public/clientes/archivos/
```

Desde el formulario de edición se puede ver o reemplazar el PDF actual. Tamaño máximo: 5 MB.

### Control de permisos en vistas

El botón de eliminar solo aparece en la interfaz si el usuario autenticado tiene rol `admin`:

```php
@if(auth()->user()->isAdmin())
    {{-- Botón eliminar --}}
@endif
```

Las rutas de eliminación también están protegidas a nivel de servidor mediante middleware personalizado, por lo que no es posible saltarse la restricción desde el navegador.

---

## Estructura relevante del proyecto

```
app/
├── Http/
│   ├── Controllers/
│   │   └── ClientesController.php
│   └── Middleware/
│       └── CheckRole.php
├── Models/
│   ├── User.php          ← métodos isAdmin() / isUsuario()
│   └── Clientes.php
database/
└── migrations/
    ├── add_role_to_users_table.php
    └── add_foto_to_clientes_table.php
resources/views/
└── clientes/
    ├── index.blade.php   ← DataTables
    ├── create.blade.php
    └── edit.blade.php
storage/app/public/
├── clientes/fotos/
└── clientes/archivos/
```

---

## Rutas principales

| Método | URL | Acción | Acceso |
|---|---|---|---|
| GET | `/clientes` | Listado con DataTables | Autenticado |
| GET | `/clientes/create` | Formulario crear | Autenticado |
| POST | `/clientes` | Guardar nuevo cliente | Autenticado |
| GET | `/clientes/{id}/edit` | Formulario editar | Autenticado |
| PUT | `/clientes/{id}` | Actualizar cliente | Autenticado |
| DELETE | `/clientes/{id}` | Eliminar cliente | Solo admin |

---

## Notas adicionales

- Al eliminar un cliente, sus archivos asociados (foto y PDF) se borran automáticamente del storage.
- Al editar un cliente y subir una nueva foto o PDF, el archivo anterior se reemplaza y el antiguo se elimina.
- Las validaciones de formulario se realizan en el servidor usando las reglas de Laravel.
- El middleware `CheckRole` protege las rutas sensibles a nivel de servidor, independientemente de lo que se muestre en la vista.

---

## Rama del proyecto

Este proyecto está disponible en la rama `Segunda` del repositorio:

```bash
git checkout Segunda
```