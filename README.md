# UF PHP Chile

Script simple en PHP para leer el feed RSS del SII y mostrar valores economicos publicados, incluyendo dolar y UF.

## Objetivo

Este repositorio sirve como ejemplo pequeno de consumo de XML/RSS desde PHP. Puede usarse como base para mostrar indicadores en una pagina interna, dashboard o prueba tecnica.

## Requisitos

- PHP 7.4 o superior.
- Extension `SimpleXML` habilitada.
- Acceso HTTP hacia el feed del SII.

## Uso local

1. Clona el repositorio.

```bash
git clone https://github.com/ZeldaMan3/UF_PHP_Chile.git
```

2. Entra a la carpeta.

```bash
cd UF_PHP_Chile
```

3. Ejecuta un servidor local de PHP.

```bash
php -S localhost:8000
```

4. Abre en el navegador:

```text
http://localhost:8000/UF.php
```

## Fuente de datos

El script consume el RSS publico del Servicio de Impuestos Internos:

```text
https://zeus.sii.cl/admin/rss/sii_ind_rss.xml
```

## Notas tecnicas

- La salida HTML se escapa con `htmlspecialchars`.
- El script maneja errores basicos cuando el RSS no responde o el XML no se puede procesar.
- Para produccion conviene agregar cache, logs y manejo de timeouts.

## Ideas de mejora

- Separar la obtencion de datos de la vista HTML.
- Agregar cache para no consultar el RSS en cada carga.
- Mostrar fecha de actualizacion.
- Convertirlo en una pequena API JSON.
