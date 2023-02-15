

## Como Probarlo:

Para realizar pruebas, 
- Descargue el repositorio en su maquina
- Ubicado en la terminal en la carpeta del proyecto
- Instale dependencias composer.json con el comando => composer update
- Instale dependencias packages.json con el comando => npm update
- Cree la base de datos local con el nombre de la base de datos segun el archivo .env en la raiz de este proyecto, si no lo tiene cambiele en el nombre a .env.example por .env
- Ejecute los comandos desde la terminal: 
- php artisan migrate:fresh --seed
- php artisan serve y npm run dev (Ejecutar al tiempo en terminales diferentes)

## Credenciales de prueba:

Administrador:
- admin@woobsing.org
- admin2023

Invitado:
- guest@woobsing.org
- invitado2023
