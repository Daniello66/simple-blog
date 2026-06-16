# Simple Blog
Un blog simple y moderno, construido con Laravel 13, que permite a los usuarios publicar artículos, interactuar mediante comentarios y reacciones, además de gestionar su cuenta de forma segura.

## Características
- **Autenticación de usuarios:** Registro, inicio y cierre de sesión seguros.
- **Gestión de posts:** Crear, editar, visualizar y eliminar publicaciones.
- **Comentarios y reacciones:** Los usuarios autenticados pueden comentar y reaccionar en cualquier publicación.
- **Perfil de usuario:** Cada usuario cuenta con su propio espacio y publicaciones.

## Tecnologías utilizadas
- [Laravel 13](https://laravel.com)

## Instalación
1. Clonar el repositorio.
```bash
git clone https://github.com/Daniello66/simple-blog.git
```

2. Instalar las dependencias.
```bash
composer install
```

3. Generar la clave de aplicación.
```bash
php artisan key:generate
```

4. Configurar el entorno.<br>
Crear el archivo `.env` con base en `.env.example` y configurar la conexión a la base de datos.

5. Ejecutar las migraciones.
```bash
php artisan migrate
```
