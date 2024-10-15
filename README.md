## Requisitos de instalación

- PHP 5.6^
- Apache 2.4

## Instalación

Para instalar este script en su equipo, es necesario clonar el repositorio:

```
sudo git clone https://github.com/erickpulido/privalia.git
```

o si no tienes Git en tu computadora, puedes descargar el .zip

```
https://github.com/erickpulido/privalia/archive/refs/heads/main.zip
```

## Ejecución

El script está diseñado para ejecutarse en la línea de comandos y puede recibir dos argumentos:

1. El número de la secuencia (default = 5)
2. El número de líneas que se imprimirán (default = 10)

Sin argumentos:

```
php Pyramid.php
```
Con argumentos:
```
php Pyramid.php 5 10
```

Si el usuario no ingresa argumentos, el script se ejecutará con los valores por defecto.