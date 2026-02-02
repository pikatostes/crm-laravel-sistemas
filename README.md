# CRM Laravel con AdminLTE

## 📌 Descripción del proyecto
Este proyecto consiste en el desarrollo de un CRM básico utilizando el framework **Laravel** y el panel administrativo **AdminLTE**.  
La aplicación permite gestionar información básica de una empresa mediante distintos módulos CRUD, simulando una aplicación real de gestión empresarial.

El objetivo principal es practicar la estructura de Laravel, la conexión con base de datos y la implementación de operaciones CRUD completas.

---

## 🛠️ Tecnologías utilizadas
- PHP
- Laravel
- MySQL
- AdminLTE
- Blade
- XAMPP
- GitHub

---

## 📂 Módulos incluidos (CRUD)
La aplicación incluye los siguientes módulos:

- **Clientes** (obligatorio)
- **Productos**
- **Empleados**
- **Proveedores**
- **Facturas**

Cada módulo permite:
- Listar registros
- Crear nuevos registros
- Editar registros existentes
- Eliminar registros

---

## ⚙️ Requisitos para ejecutar el proyecto
- PHP instalado
- Composer
- MySQL
- XAMPP o servidor local similar
- Node.js y npm (opcional, para assets)
- Cuenta en GitHub

---

## 🚀 Instalación y ejecución

1. Clonar el repositorio:
```bash
git clone https://github.com/tuusuario/tu-repositorio.git
```
2. Acceder a la carpeta del proyecto:
```bash
cd crm
```

3. Instalar dependencias de PHP:
```bash
composer install
```

4. Copiar el archivo de entorno:
```bash
cp .env.example .env
```

5. Generar la clave de la aplicación:
```bash
php artisan key:generate
```

6. Configurar la base de datos en el archivo .env:
```env
DB_DATABASE=crm_laravel
DB_USERNAME=root
DB_PASSWORD=
```

7. Ejecutar las migraciones:
```bash
php artisan migrate
```

8. Arrancar el servidor:
```bash
php artisan serve
```

9. Acceder a la aplicación:
```bash
http://127.0.0.1:8000
```
## 👤 Usuario de prueba

Se ha incluido uno llamado `admin` con contraseña `admin123`.

## 🗄️ Base de datos

El repositorio incluye un archivo SQL de backup con:

- Las tablas creadas

- Datos de prueba

Este archivo puede importarse directamente desde phpMyAdmin.

## 📌 Observaciones

- El diseño es sencillo y funcional.

- El enfoque principal del proyecto es el correcto funcionamiento de los CRUDs y la estructura del código.

- El proyecto cumple todos los requisitos solicitados en la primera entrega del CRM en Laravel.

## 📎 Autor
José Alejandro Ríos Bermúdez, 2ºDAM
Proyecto realizado como práctica académica de desarrollo web con Laravel.