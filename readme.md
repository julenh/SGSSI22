Iñigo Landeta y Julen Hernando
-Para desplegar mediante DOCKER
    +Abrir la terminal en la carpeta del proyecto (SGSS22) donde se encuentran los archivos Dockerfile y docker-compose.yml
    +escribir comando "sudo docker build -t="web" ." para construir la web
    +escribir comando "sudo docker-compose up" o "sudo docker-compose up -d"
    +entrar en "localhost:8890" en el navegador y con el usuario "admin" y la contraseña "test" e importar la base de datos database.sql en la carpeta del proyecto (SGSSi22)
    +entrar en "localhost:81" en el navegador para acceder al sistema web
    +pulsar ctrl+c y comando "sudo docker-compose down" en la terminal para parar el sistema.