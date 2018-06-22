# rrhh

### Descargar el proyecto

```sh
git clone https://github.com/MUS3RP0L/rrhh.git
cd rrhh
cp .env.example .env
```

* Editar el archivo `.env` y definir las credenciales para la conexióna la base de datos

* Servir la aplicación mediante Apache o Nginx con extensión PHP habilitada y apuntar a la ruta `public`

### Dependencias de sistema

* Habilitar extensión GD de PHP [php-gd]

```sh
sed "s/;extension=gd/extension=gd/g" /etc/php/php.ini
```

* Instalar las fuentes de Microsoft [Debian: ttf-mscorefonts-installer] [Arch: ttf-ms-fonts]

```sh
sudo apt install -y ttf-mscorefonts-installer
```

### Dependencias de la aplicación

* Instalar las dependencias de composer

```sh
composer install
```

* Inicializar la base de datos

```sh
php artisan migrate
```

* Generar una clave para cifrado

```sh
php artisan key:generate
```

* Instalar las dependencias del frontend

```sh
npm install
npm run prod
```

*Para continuar el desarrollo se debe ejecutar el comando: `npm run dev`*
