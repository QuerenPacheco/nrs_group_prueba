<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Prueba NRS GROUP

Esta prueba consiste en una aplicación web usando el framework Laravel para gestionar una compañía intermediaria en el mercado del gas ciudad. Algunas de las características del mercado en el que se encuentra la empresa son:

-La empresa tiene diferentes clientes y proveedores, cada proveedor tiene mínimo una calidad de gas. El cliente tiene un proveedor y una calidad asignados.

-Se puede dar de alta, modificar, eliminar y listar clientes y proveedores.

-El listado de proveedores tiene un botón "Calidades" el cual mostrará los detalles de ese proveedor y las calidades que tiene asociadas puediendo editarlas, borrarlas y añadir nuevas. Al editar la calidad estará seleccionado por defecto el proveedor al que pertenece y no lo podremos cambiar.

-El sistema muestra un aviso cuando hay clientes que tengan un margen de beneficio negativo mostrando debajo una tabla con dichos clientes.

-Tanto clientes como proveedores tienen un botón para exportar en csv.

## Despliegue
Este proyecto tiene una configuración docker. Si queremos desplegarlo mediante docker deberemos usar el comando:
```
   docker-compose up -d --build
```
Cuando el contenedor esté levantado, si las carpetas vendor y node_modules no están completas, puede aparecer un error 502. Este problema se resuelve al cabo de unos segundos cuando las carpetas ya están completas. 
Si no queremos desplegarlo con docker deberemos tener los siguientes requisitos:
- PHP 8.2
- NPM
- Composer con: [Link de instalación](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-20-04)
- MySql con: `sudo apt install mysql-server`

Y ejecutar los siguientes comandos:
- Actualización de libresias del backend : `composer update`
- Instalación de librerias del backend : `composer install`
- Preparación de la base de datos: `php artisan migrate`
- Alimentación de la base de datos: php artisan db:seed
- Instalación de librerias del frontend : `npm ci`
- Construir frontend: `npm run build`

## Mejoras
- Internacionalización de textos.
- Exportación de calidades junto con los datos de proveedores.
- Control de borrado de proveedores (mostrar aviso si tiene clientes asociados).
- Tests
