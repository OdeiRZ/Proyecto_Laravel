# Proyecto Laravel

Red social estilo Twitter construida con Laravel 5.6: publicación de mensajes, seguidores, mensajes privados, notificaciones y búsqueda.

## Características

- Registro y login de usuarios, incluyendo autenticación social con Facebook (`SocialAuthController`, `laravel/socialite`).
- Publicación de mensajes con imagen adjunta (`MessagesController@create`), almacenada en el disco público de Laravel.
- Búsqueda de mensajes mediante Laravel Scout (`laravel/scout` + Algolia como driver de búsqueda).
- Sistema de seguidores: seguir/dejar de seguir usuarios, y listados de seguidores y seguidos por usuario.
- Mensajería privada entre usuarios organizada en conversaciones (`Conversation`, `PrivateMessage`).
- Respuestas a mensajes (`Message@responses`) y notificaciones de nuevos seguidores (`UserFollowed`), con soporte de tiempo real vía Pusher (`pusher/pusher-php-server`, `BroadcastServiceProvider`).
- Interfaz multi-idioma (español e inglés) mediante los ficheros de traducción en `resources/lang`.
- Frontend con Vue.js (componentes `Notifications.vue`, `Responses.vue`) compilado con Laravel Mix.

## Tecnologías

- PHP 7.1+ / Laravel 5.6
- MySQL (u otro motor soportado por Eloquent, ver migraciones en `database/migrations`)
- Laravel Scout + Algolia (búsqueda)
- Laravel Socialite (login social con Facebook)
- Pusher (notificaciones/broadcasting en tiempo real)
- Vue.js + Laravel Mix (assets del frontend)

## Instalación / Cómo ejecutarlo

1. Instala las dependencias de PHP y de JS:
   ```
   composer install
   npm install
   ```
2. Copia `.env.example` a `.env` y configura la base de datos, las claves de Algolia, Pusher y las credenciales de Facebook que necesites:
   ```
   cp .env.example .env
   php artisan key:generate
   ```
3. Ejecuta las migraciones:
   ```
   php artisan migrate
   ```
4. Compila los assets del frontend:
   ```
   npm run dev
   ```
5. Levanta el servidor de desarrollo:
   ```
   php artisan serve
   ```

## Seguridad

Corregidos varios problemas: CSRF en el login social de Facebook (se restaura la comprobación de estado de Socialite), subida de imágenes sin validar tipo/tamaño en la creación de mensajes, y asignación masiva sin restringir en varios modelos (`Message`, `PrivateMessage`, `Response`, `SocialProfile`). Actualizado `laravel/framework` para incluir el parche de CVE-2018-15133.

## Licencia

MIT (heredada de la plantilla base de Laravel, ver `composer.json`). El repositorio no incluye un archivo LICENSE independiente.
