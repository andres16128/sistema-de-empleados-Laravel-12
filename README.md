 🏢 Sistema de Empleados - Laravel 12

CRUD completo de empleados desarrollado con Laravel 12, XAMPP, MySQL y Bootstrap.

---

##  Descripción

Sistema web que permite gestionar empleados mediante un CRUD (Crear, Leer, Actualizar, Eliminar). Incluye login, subida de fotos, validación de campos y paginación.

---

##  Tecnologías

| Tecnología | Uso |
|------------|-----|
| Laravel 12 | Framework PHP |
| PHP 8.2 | Lenguaje backend |
| MySQL | Base de datos |
| XAMPP | Servidor local |
| Bootstrap 5 | Estilos |
| Vite | Compilador de assets |
| Node.js | Entorno JS |
| Composer | Dependencias PHP |

---

##  Requisitos

- XAMPP (Apache + MySQL)
- PHP 8.2+
- Composer
- Node.js y npm

---

##  Instalación

```bash
# 1. Entrar al proyecto
cd C:\xampp\htdocs\SISTEMA

# 2. Instalar dependencias PHP
composer install

# 3. Configurar .env
copy .env.example .env

# 4. Generar clave
php artisan key:generate

# 5. Crear BD "sistema" en phpMyAdmin

# 6. Ejecutar migraciones
php artisan migrate

# 7. Crear enlace de storage
php artisan storage:link

# 8. Instalar dependencias JS
npm install

# 9. Compilar assets
npm run dev
```

---

##  Ejecución

Abre en el navegador:

```
http://localhost/SISTEMA/public
```

---

##  Credenciales

| Campo | Valor |
|-------|-------|
| Email | `admin@test.com` |
| Password | `123456` |

---

##  Estructura

```
SISTEMA/
├── app/
│   ├── Http/Controllers/EmpleadoController.php
│   └── Models/empleado.php
├── database/migrations/xxxx_create_empleados_table.php
├── resources/views/
│   ├── auth/
│   ├── empleados/ (index, create, edit, form)
│   └── layouts/app.blade.php
├── routes/web.php
└── storage/app/public/uploads/
```

---

##  Funcionalidades

-  Login y logout con autenticación
-  CRUD completo de empleados
-  Subida y actualización de fotos
-  Eliminación de fotos al borrar empleado
-  Validación de campos (requeridos, email, imagen)
-  Paginación (5 empleados por página)
-  Mensajes de confirmación
-  Diseño responsivo con Bootstrap
-  Rutas protegidas con middleware `auth`

---

##  Rutas principales

| Método | URL | Acción |
|--------|-----|--------|
| GET | `/` | Login |
| GET | `/empleados` | Listado |
| GET | `/empleados/create` | Crear |
| POST | `/empleados` | Guardar |
| GET | `/empleados/{id}/edit` | Editar |
| PATCH | `/empleados/{id}` | Actualizar |
| DELETE | `/empleados/{id}` | Eliminar |

---

##  Base de datos

### Tabla `empleados`

| Campo | Tipo |
|-------|------|
| id | BIGINT |
| Nombres | VARCHAR(255) |
| PrimerApel | VARCHAR(255) |
| SegundoApel | VARCHAR(255) |
| Correo | VARCHAR(255) |
| Foto | VARCHAR(255) |
| created_at | TIMESTAMP |
| updated_at | TIMESTAMP |

---

##  Autor

| Campo | Información |
|-------|-------------|
| **Nombre** | [Andres Guerrero] 
| **instuctor** | [James Morales ] |
| **Fecha** | [28/09/2026] |