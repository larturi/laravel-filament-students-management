# Students Management | Laravel & Filament

## Local Mode

1. Crear el .env basado en .env.template y configuarar las variables de la base de datos MySql

```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=filament-students-mgmt
DB_USERNAME=sail
DB_PASSWORD=password
```

2. Levantar los Contenedores con Docker Sail

```bash
./vendor/bin/sail up -d
```

3. Ejecutar Migraciones

```bash
./vendor/bin/sail artisan migrate --seed
```

4. Generar un usuario con Filament

```bash
./vendor/bin/sail artisan make:filament-user
```

5. Entrar a <http://localhost/admin>
