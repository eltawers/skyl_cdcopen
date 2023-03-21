Conexion a la BD 
 * La base de datos tiene un Identificador que lo trae el json que esta como unico, por lo cual aunque se busque muchas veces solo guardara un registor por libro.


Resolucion de puntos : 
1 - dentro del PHP \data\consulta_books.php se hace la llamada a la api dependiendo del valor que entrega el cliente, una vez obtenido el JS \js\general.js 
funcion busqueda_libros parsea el json y obtiene los resultados.
2 - al realizar el punto 1, se realiza la muestra d elos datos en pantalla.
3 - se estaba realizando local "se envia script en caso que no funcione", se usa https://www.db4free.net/ para generar una base de datos mysql
para ver el PHPMYADMIN, usar lo siguiente:
https://www.db4free.net/phpMyAdmin/index.php?route=/
user = root123456
pass = root

en caso de que no funcione, va el script de la base de datos y las claves se deben configurar en data\conexion.php

4 - al momento de realizar la busqueda, esta se guarda en la base, despues tiene una opcion en el menu que puede dirigirlo a "Objetos Guardados", 
desde aca ya se puede manipular la data directa de la base de datos, al ser externa tiene un poco de delay, de igual forma se le puede agregar comentario o eliminar.
5 - se realiza el eliminar y la modificacion del dom del mismo para que el registro deje de estar visible para el usuario.
