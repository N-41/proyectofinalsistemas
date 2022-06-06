# proyectofinalsistemas
un programa que pueda reproducir el juego "what's in the box". Las reglas del juego son las siguientes:


-Se tienen 26 cajas, todas con objetos distintos

-Se tienen 3 jugadores: El alfitrion, el recibidor, y el ofertador

-Al principio del juego, el recibidor tomará una caja. Esa caja se apartará de las demás cajas hasta el final del juego, y es el objeto que o el recibidor o el ofertador obtendran

-Después de tomar la primera caja, se toman cajas de una en una y se abren para saber que objetos no son los que están en la caja final

-El juego se divide en varios rounds, cada round termina después de abrir por lo menos 4 cajas

-Al final de cada round, el ofertador le hara una oferta al recibidor, de un objeto que le pueda dar en cambio de la caja final

-Si el recibidor acepta la oferta, el juego termina, y el ofertador se queda con la caja final, mientras que el recibidor se queda con la oferta

-Si la rechaza, el siguiente round empieza y se abren 4 cajas mas

-La cantidad de cajas se reduce a 3 empezando el 4to round, a 2 empezando el 6, y a 1 empezando el octavo

-Si se abren todas las cajas y el recibidor no aceptó ninguna oferta, el recibidor se queda con la caja


La base de datos viene con una tabla de ejemplo, con 26 regalos adicionales. 

Para utilzar una tabla, haz clic en el botón "Enter" de la lista, después oprime el botón "Start!"

Oprime uno de los botones para escoger el regalo, y después, escoge los regalos que se van a eliminar, uno por uno

Cuando escogas uno, oprime "Reveal" para ver su nombre, después vuelve al menú principal con "Next"

Al finalizar un round después de abrir una cierta cantidad de cajas, realiza la oferta con tu ofertador fuera del juego

(Puede que pueda implementar un servicio de mensajeria del ofertador acá si tuviera más tiempo)

Y oprimir "Accept" para aceptar su oferta y acabar el juego, o "Reject" para continuar

Al finalizar el juego, puedes revelar el regalo final al oprimir el botón "Reveal" y terminar al oprimir "Finish"


Tablas necesarias:

regalos2 - Sirve para organizar los regalos al azar durante los juegos. Cada registro se representa como un botón que es la caja dentro del juego

regalos3 - Esta lista mostrará los regalos de la lista principal durante el juego, tachando los que se vayan eliminando

tomado - Tendrá el regalo tomado al inicio del juego

contador - Cuenta los rounds del juego. Cuando no hay registros en contador pero si en tomado, el juego habrá terminado, y el regalo será revelado de tomado

abierta - contiene el nombre de la tabla


Estructura:

regalos2
`id` int(2) not null,
`nombre` varchar(255),
`newid` int(2),
primary key (id)

regalos3
`id` int(2) not null auto_increment,
`nombre` varchar(255),
`ogid` int(2),
primary key (id)

tomado
`numeroderegalo` int(2) not null,
`nombre` varchar(255) not null,
primary key (numeroderegalo)

contador
`round` int(2) not null auto_increment,
`cajasabiertas` int(2),
primary key (round)

abierta
`nombre` varchar(255),
primary key (`nombre`)


Create: Puedes crear nuevas listas de regalos en index

Read: Puedes acceder a cada lista, también para jugar con ellas

Update: Puedes cambiar los registros de cada lista

Delete: Pûedes borrar listas
