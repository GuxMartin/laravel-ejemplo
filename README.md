# Ejemplo de Laravel (5.8)

Basado en el tutorial del blog de Fernando Gaitan [https://fernando-gaitan.com.ar/laravel-parte-1-introduccion-e-instalacion/](https://fernando-gaitan.com.ar/laravel-parte-1-introduccion-e-instalacion/)


## Instalación

### Librerías

```
composer install
```

### Copiar configuración de entorno y editaras
```
cp .env.example .env
nano .env
```

### Crear manualmente base de datos

### Ejecutar migraciones
```
php artisan migrate
```

### Regenerar key aplication
```
php artisan key:generate
```

### Correr aplicación
```
php artisan serve
```
