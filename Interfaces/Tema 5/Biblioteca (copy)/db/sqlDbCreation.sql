CREATE USER 'userBiblio'@'localhost' IDENTIFIED BY 'biblioteca';
GRANT ALL ON *.* TO 'userBiblio'@'localhost';

CREATE DATABASE IF NOT EXISTS biblioteca;
use biblioteca;

CREATE TABLE Books (
    isbn varchar(255) NOT NULL,
    autor varchar(255) NOT NULL,
    titulo varchar(255) NOT NULL,
    genero varchar(255) NOT NULL,
    sinopsis MEDIUMTEXT NOT NULL,
    rutaimg varchar(255) NOT NULL,
    ano int NOT NULL,
    puntuacion DECIMAL(3,2),
    PRIMARY KEY (isbn)
);

CREATE TABLE Multas (
    multaid INT NOT NULL AUTO_INCREMENT,
    isbn varchar(255) NOT NULL,
    fechainicio DATE NOT NULL, /*formato yyyy-mm-dd*/
    fechafinal DATE,
    PRIMARY KEY (multaid),
    FOREIGN KEY (isbn) REFERENCES Books(isbn)
);


CREATE TABLE Users (
    mail varchar(255) NOT NULL,
    nombre varchar(255) NOT NULL,
    multaId INT,
    contrasena varchar(255) NOT NULL,
    administrator boolean NOT NULL,
    PRIMARY KEY (mail),
    FOREIGN KEY (multaid) REFERENCES Multas(multaid)
);

CREATE TABLE Comentarios (
    idcomentario int NOT NULL AUTO_INCREMENT,
    isbn varchar(255) NOT NULL,
    comentario varchar(255),
    puntuacion DECIMAL(3,2),
    mail varchar(255),
    PRIMARY KEY (idcomentario),
    FOREIGN KEY (mail) REFERENCES Users(mail),
    FOREIGN KEY (isbn) REFERENCES Books(isbn)
);

CREATE TABLE Alquiler (
    idalquiler INT NOT NULL AUTO_INCREMENT,
    mail varchar(255) NOT NULL,
    isbn varchar(255) NOT NULL,
    fechainicio DATE NOT NULL,
    fechafinal DATE NOT NULL,
    PRIMARY KEY (idalquiler),
    FOREIGN KEY (mail) REFERENCES Users(mail),
    FOREIGN KEY (isbn) REFERENCES Books(isbn)
);




/*INSERTS BOOKS*/

INSERT INTO `Books` (`isbn`, `autor`, `titulo`, `genero`, `sinopsis`, `rutaimg`, `ano`, `puntuacion`) VALUES
('9788401025655', 'IBON MARTIN', 'LA HORA DE LAS GAVIOTAS', 'NOVELA_NEGRA', 'Las gaviotas sobrevuelan inquietas la ciudad marinera de Hondarribia, que se ha vestido con sus mejores galas para celebrar un día especial. Sus graznidos compiten con los alegres sonidos que inundan las calles, donde los vecinos se preparan para disfrutar de la fiesta ajenos a la terrible amenaza que se cierne sobre ellos.\r\n\r\nEn mitad del desfile se desata el horror. Una puñalada salvaje y certera riega con sangre el frío suelo de piedra. Una mujer ha muerto asesinada. Y no será la última. La suboficial Ane Cestero y su unidad especial tendrán que dar caza a un asesino feroz e implacable, capaz de ocultarse a la vista de todo un pueblo.\r\n\r\nLa hora de las gaviotas es unthrillersinuoso, magnético e impecable que nos enfrenta al peor de los enemigos: el odio visceral que late escondido en todos nosotros.', 'lahoradelasgaviotas.jpg', 2007, '5.00'),
('9788418538506', 'MAURICE LEBLANC', 'ARSENE LUPIN. CABALLERO LADRÓN', 'NOVELA_NEGRA', 'Una nueva edición del libro que recoge los nueve primeros relatos del carismático ladrón de guante blanco. Tan popular y emblemático como Sherlock Holmes o acaso más, Arsène Lupin es un personaje inolvidable, convertido ya en leyenda. Experto en derecho y medicina, diestro en artes marciales, además de prestidigitador y auténtico seductor, Lupin es un héroe de los bajos fondos a quien nadie gana en sagacidad.', 'arsenelupincaballeroladron.jpg', 1993, '5.00'),
('9788425359910', 'TONI HILL', 'EL OSCURO ADIÓS DE TERESA LANZA', 'NOVELA_NEGRA', 'El suicidio de una joven inmigrante altera las vidas de cinco mujeres y sus familias en un idílico y acomodado barrio residencial.\r\n\r\nUna novela intrigante y turbadora sobre la hipocresía, la amistad, la inmigración y los privilegios, escrita con pulso brillante por uno de los autores más renovadores del genero negro en España.', 'eloscuroadiosdeteresalanza.jpg', 2014, '5.00'),
('9788466664417', 'JUAN GOMEZ-JURADO', 'REINA ROJA', 'NOVELA_NEGRA', 'Antonia Scott es especial. Muy especial.\r\n\r\nNo es policía ni criminalista. Nunca ha empuñado un arma ni llevado una placa, y, sin embargo, ha resuelto decenas de crímenes.\r\n\r\nPero hace un tiempo que Antonia no sale de su ático de Lavapiés. Las cosas que ha perdido le importan mucho más que las que esperan ahí fuera.\r\n\r\nTampoco recibe visitas. Por eso no le gusta nada, nada, cuando escucha unos pasos desconocidos subiendo las escaleras hasta el último piso.\r\n\r\nSea quien sea, Antonia está segura de que viene a buscarla.\r\n\r\nY eso le gusta aún menos.', 'reinaroja.jpg', 1999, '5.00'),
('9788491293545', 'JAVIER CASTILLO', 'EL JUEGO DEL ALMA', 'NOVELA_NEGRA', 'Una chica de quince años aparece crucificada en un suburbio a las afueras. Miren Triggs, periodista de investigación del ManhattanPress, recibe de manera inesperada un extraño sobre. En su interior, la polaroid de otra adolescente amordazada y maniatada, con una sola anotación: «GINA PEBBLES, 2002».\r\n\r\nMiren Triggs y Jim Schmoer, su antiguo profesor de periodismo, seguirán la pista de la chica de la imagen mientras investigan la crucifixión de Nueva York. Así se adentrarán en una institución religiosa en la que todo son secretos y en un enigma único lleno de suspense en el que deberán descifrar tres preguntas de respuesta imposible: ¿qué le sucedió a Gina?, ¿quién envía la polaroid? y, la más importante; ¿están conectadas ambas historias?', 'eljuegodelalma.jpg', 2003, '5.00'),
('9788417821371', 'HEATHER DUNE MACADAM', 'LAS 999 MUJERES DE AUSCHWITZ', 'HISTORIA', 'El 25 de marzo de 1942, cientos de jóvenes mujeres judías y solteras abandonaron sus hogares para subir a un tren. Estaban impecablemente vestidas y peinadas, y arrastraban sus maletas llenas de ropa tejida a mano y comida casera. La mayoría de estas mujeres y niñas nunca habían pasado ni una noche fuera de casa, pero se habían ofrecido voluntariamente para trabajar durante tres meses en epoca de guerra. ¿Tres meses de trabajo? No podía ser algo tan malo. Ninguno de sus padres habría adivinado que el gobierno acababa de vender a sus hijas a los nazis para trabajar como esclavas. Ninguno sabía que estaban destinadas a Auschwitz.\r\n\r\nLos libros de historia han podido pasar por alto este hecho, pero lo cierto es que el primer grupo de judíos deportados a Auschwitz para trabajar como esclavos no incluía a combatientes de la resistencia, ni a prisioneros de guerra, no. No había ni un solo hombre prisionero en esos vagones de ganado. Era un tren de 999 chicas solteras, vendido a la Alemania nazi por una dote de 500 Reich Marks, el equivalente', 'las999mujeresdeauschwitz.jpg', 2009, '5.00'),
('9788418205538', 'ANTONIO J. CANDIL', '23-F. EL GOLPE DEL REY', 'HISTORIA', 'Lo que había ocurrido realmente el 23 de febrero de 1981 está claro hoy: independientemente de los autores e inductores, no había sido nunca un intento de golpe de estado sino una operación especial para reparar el sistema político, una operación con la que estaba de acuerdo la mayor parte de la clase política, y por supuesto, la institución monárquica. En principio su objetivo era el de solucionar los problemas surgidos con el desarrollo del proceso autonómico, reformar la Constitución en aspectos que parecían necesarios, modificar la ley y proceso electoral, y acabar con la violencia terrorista. No se hizo nada de esto, y a fecha de hoy sigue sin haberse hecho nada -a excepción del problema terrorista-, ya que el verdadero objetivo era solo reforzar la posición y el papel de la monarquía, sacrificando cualquier otra posible finalidad.', '23felgolpedelrey.jpg', 2020, '5.00'),
('9788441440753', 'NACHO ARES', 'LA HISTORIA PERDIDA: ENIGMAS HISTÓRICOS OCULTADOS POR EL TIEMPO', 'HISTORIA', '«Nadie va a encontrar historias de anunakis, atlantes o seres adimensionales que han venido de nadie sabe dónde para dejarnos un conocimiento secreto. Todo está protagonizado por seres humanos y es ahí donde reside el mayor misterio de nosotros mismos. Somos capaces de hacer cosas increíbles en situaciones inimaginables». En este libro, entre otras muchas cosas, encontrarás: - La historia del papiro Magdalen gr-17 o la única reliquia auténtica de Jesús. - Claves y mensajes secretos en el arte. - Viajes transoceánicos ¿evidencias de los egipcios en América? - La verdad de Piri Reis: el almirante turco que ?cartografi ó? la Antártida. - La terrible maldición de los Austrias. - Escudos de fuego en los cielos antigua Roma. Esta nueva edición, ampliada y actualizada, de La Historia perdida es fruto de la maduración a lo largo de dos décadas sobre alguna de las ideas, así como de la experiencia como historiador tanto en medios de comunicación como en revistas consolidadas. Todos y cada uno de los trabajos van acompañados con la documentación necesaria que los justifi ca precisamente por lo que son: enigmas históricos.', 'lahistoriaperdidaenigmashistoricosocultadosporeltiempo.jpg', 2017, '5.00'),
('9788490623497', 'JAVIER CERCAS', 'ANATOMIA DE UN INSTANTE\r\n', 'HISTORIA', 'Un relato vibrante, tenso y pormenorizado que empieza leyéndose como una novela policíaca y acaba leyéndose como una novela de terror.\r\n\r\n«Este libro es un ensayo en forma de crónica o una crónica en forma de ensayo. Este libro no es una ficción. Este libro es la anatomía de un instante: el instante en que Adolfo Suárez permaneció sentado en la tarde del 23 de febrero de 1981 mientras las balas de los golpistas zumbaban a su alrededor en el hemiciclo del Congreso de los Diputados y todos los demás parlamentarios -todos menos dos: el general Gutiérrez Mellado y Santiago Carrillo- buscaban refugio bajo sus escaños. Este libro es la crónica de ese gesto y la crónica de un golpe de estado y la crónica de unos años decisivos en la historia de España. Este libro es un libro imprescindible. Un libro único.»', 'anatomiadeuninstante.jpg', 2021, '5.00'),
('9788499926223', 'YUVAL NOAH HARARI', 'SAPIENS (DE ANIMALES A DIOSES)', 'HISTORIA', 'Hace 70.000 años al menos seis especies de humanos habitaban la Tierra. Hoy solo queda una, la nuestra:Homo Sapiens.¿Cómo logró nuestra especie imponerse en la lucha por la existencia? ¿Por qué nuestros ancestros recolectores se unieron para crear ciudades y reinos? ¿Cómo llegamos a creer en dioses, en naciones o en los derechos humanos; a confiar en el dinero, en los libros o en las leyes? ¿Cómo acabamos sometidos a la burocracia, a los horarios y al consumismo? ¿Y cómo será el mundo en los milenios venideros?\r\n\r\nEnSapiens, Yuval Noah Harari traza una breve historia de la humanidad, desde los primeros humanos que caminaron sobre la Tierra hasta los radicales y a veces...', 'sapiensdeanimalesadioses.jpg', 2013, '5.00'),
('9788413621678', 'JOE ABERCROMBIE', 'EL PROBLEMA DE LA PAZ', 'FANTASIA', 'A pesar de los reveses sufridos, no hay nada que se interponga en el camino de Savine dan Glokta, en el pasado la inversora más poderosa de Adua, cuando ha puesto su ambición en un objetivo. Para héroes como Leo dan Brock y Stour Ocaso la paz no es más que un inconveniente que debe remediarse cuanto antes. Pero primero hay que alimentar agravios y reunir aliados. Entre tanto, Rikke tiene que dominar el ojo largo... antes de que su poder acabe con ella. En todos los sectores de la sociedad anida el descontento. Los Rompedores aún acechan en la clandestinidad, tramando planes para llevar a cabo el Gran Cambio que por fin libere al pueblo, mientras los nobles descontentos tratan de aumentar su influencia y sus prebendas. Orso intenta hallar un camino seguro en el laberinto de cuchillos que es la política, pero sus deudas y sus enemigos no dejan de aumentar. Ninguna alianza, ninguna amistad, ninguna paz, dura para siempre.', 'elproblemadelapaz.jpg', 2021, '5.00'),
('9788418431005', 'BEN AARONOVITCH', 'EL ÁRBOL DEL AHORCADO', 'FANTASIA', 'La muerte también acecha a la jet set londinense…El agente de policía y aprendiz de mago Peter Grant está más que acostumbrado a lidiar con muertes sospechosas, pero, cuando un misterioso asesinato lo lleva a investigar una fiesta en el exclusivo barrio de Londres, descubrirá que las enormes mansiones de los superricos y famosos esconden un pasado sangriento: miles de personas murieron ahorcadas en el árbol de Tyburn. La magia ha vuelto a la ciudad y es hora de que Peter y su mentor, el inspector Nightingale, patrullen en busca de los seres sobrenaturales que están derramando sangre por las calles más selectas de la capital inglesa.\r\n«Las novelas de Aaronovitch son divertidas, encantadoras, ingeniosas y emocionantes, y dibujan un mundo mágico muy cerca del nuestro.» The Independent\r\n', 'elarboldelahorcado.jpg', 2019, '5.00'),
('9788445073728', 'J.R.R. TOLKIEN', 'EL SEÑOR DE LOS ANILLOS I: LA COMUNIDAD DEL ANILLO', 'FANTASIA', 'Este libro es como un relámpago en un cielo claro. Decir que la novela heroica, espléndida, elocuente, desinhibida, ha retornado de pronto en una época de un antirromanticismo casi patológico, sería inadecuado. Para quienes vivimos en esa extraña época, el retorno -y el alivio que nos trae- es sin duda lo más importante. Pero para la historia misma de la novela -una historia que se remonta a la Odisea y a antes de la Odisea- no es un retorno, sino un paso adelante o una revolución: la conquista de un territorio nuevo.', 'elsenordelosanilloslacomunidaddelanillo.jpg', 1998, '5.00'),
('9788499899619', 'PATRICK ROTHFUSS', 'EL TEMOR DE UN HOMBRE SABIO', 'FANTASIA', 'Llega El temor de un hombre sabio, la esperada continuación de la historia de Kvothe y El nombre del viento.\r\n\r\n\"Todo hombre sabio teme tres cosas: la tormenta en el mar, la noche sin luna y la ira de un hombre amable.\"\r\n\r\nEl hombre había desaparecido. El mito no. Músico, mendigo, ladrón, estudiante, mago, trotamundos, heroe y asesino, Kvothe había borrado su rastro. Y ni siquiera ahora que le han encontrado, ni siquiera ahora que las tinieblas invaden los rincones del mundo, está dispuesto a regresar. Pero su historia prosigue, la aventura continúa, y Kvothe seguirá contándola para revelar la verdad tras la leyenda.', 'eltemordeunhombresabio.jpg', 2015, '5.00'),
('9788466657662', 'BRANDON SANDERSON', 'EL CAMINO DE LOS REYES', 'FANTASIA', 'Anhelo los días previos a la Última Desolación. Los días en que los Heraldos nos abandonaron y los Caballeros Radiantes se giraron en nuestra contra. Un tiempo en que aún había magia en el mundo y honor en el corazón de los hombres. El mundo fue nuestro, pero lo perdimos. Probablemente no hay nada más estimulante para las almas de los hombres que la victoria.', 'elcaminodelosreyes.jpg', 2012, '5.00'),
('9788416401925', 'AKIRA TORIYAMA', 'DRAGON BALL 1', 'COMIC&MANGA', 'La historia de Dragon Ball sigue la vida de Son Goku , un mono - cola niño vagamente basada en el tradicional cuento popular china Viaje al Oeste , de su vida y aventuras como un niño todo el camino hasta ser abuelo. Durante su vida, pelea muchas batallas y eventualmente se convierte (posiblemente) en el artista marcial más fuerte del universo . Sin embargo, no está exento de ayuda: el cómic cuenta con un gran elenco de héroes y villanos de artistas marciales que proporcionan el conflicto que impulsa la historia.', 'dragonball1.jpg', 1984, '5.00'),
('9788467930887', 'KAIU SHIRAI', 'THE PROMISED NEVERLAND 1', 'COMIC&MANGA', 'Emma, Norman y Ray son tres huérfanos que viven felices en el idílico orfanato Grace Field House, esperando el momento en el que se les asignará una familia adoptiva. Todo cambia cuando descubren accidentalmente la horrorosa realidad de su existencia,', 'thepromisedneverland.jpg', 2014, '5.00'),
('9788467940657', 'GEGE AKUTAMI', 'JUJUTSU KAISEN 1', 'COMIC&MANGA', 'Yûji Itadori es un estudiante con unas habilidades físicas excepcionales. Todos los días, como rutina, va al hospital a visitar a su abuelo enfermo y decide apuntarse al club de ocultismo del instituto para no dar un palo al agua... Sin embargo, un buen día el sello del talismán que se hallaba escondido en su instituto se rompe, y comienzan a aparecer unos monstruos. Ante este giro de los acontecimientos, Itadori decide adentrarse en el instituto para salvar a sus compañeros. ¿Qué le deparará el destino?', 'jujutsukaisen1.jpg', 2019, '5.00'),
('9788468480114', 'EIICHIRO ODA', 'ONE PIECE Nº1', 'COMIC&MANGA', 'One Piece es un manga escrito e ilustrado por Eiichirō Oda y actualmente es el manga más comprado en el mundo. Comenzó a publicarse en la revista japonesa Weekly Shōnen Jump el 22 de julio de 1997 y a la fecha se han publicado 98 volúmenes, por otra parte Toei Animation realiza el anime que se transmite en Fuji TV desde el 20 de octubre de 1999 el cual está en emisión actualmente. ', 'onepiece1.jpg', 1997, '5.00'),
('9788491670155', 'KENTARO MIURA', 'BERSERK MAXIMUM 1', 'COMIC&MANGA', 'Edición de lujo de una de las más aclamadas series manga de todos los tiempos. Un viaje épico y salvaje a un reino de fantasía. Guts es un guerrero vestido de negro de los pies a la cabeza que porta una gigantesca espada más larga que su propia estatura y un robusto brazo ortopédico de hierro', 'berserkmaximum.jpg', 1987, '5.00');


/*INSERTS USERS*/

INSERT INTO `Users` (`mail`, `nombre`, `multaId`, `contrasena`, `administrator`) VALUES ('admin@admin.com', 'admin', NULL, 'admin', '1');
INSERT INTO `Users` (`mail`, `nombre`, `multaId`, `contrasena`, `administrator`) VALUES ('user@user.com', 'user', NULL, 'user', '1');


/*INSERTS ALQUILER*/

INSERT INTO `Alquiler` (`idalquiler`, `mail`, `isbn`, `fechainicio`, `fechafinal`) VALUES (NULL, 'user@user.com', '9788466657662', '2021-03-03', '2021-03-17');

/*INSERTS COMENTARIOS*/

INSERT INTO `Comentarios` (`idcomentario`, `isbn`, `comentario`, `puntuacion`, `mail`) VALUES (NULL, '9788466657662', 'me ha gustao un monton ta chulo el libro nene', '4.2', 'user@user.com');
/*INSERTS MULTAS*/

INSERT INTO `Multas` (`multaid`, `isbn`, `fechainicio`) VALUES (NULL, '9788466657662', '2021-03-02');
