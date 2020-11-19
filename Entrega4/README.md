# README Entrega 4

La API esta hecha completa, tanto el GET, POST y el DELETE de de messages y usuarios funciona correctamente. Ahora respecto al text-search, solo a 1 de nuestros integrantes le tiraba error cuando se hacia con un body vacio, no sabiamos porque pero es algo a tener cuenta por si no les funciona. Ojala utilizen python 3.7 por que a veces fallaba si se utilizaba una versión, aunque pipenv deberia corregirlo igual.
Se necesita pymongo y Flask instalado, aunque el pipfile debiera solucionarlo por si solo.

Para correr el servidor con Flask que maneja la API, desde pymongo a nuestra base de datos mongodb:

En `Entrega4/`, desde la consola:
- `pipenv shell`
- `python main.py` 

En caso que el `pipfile` **NO** funciona correctamente, el _troubleshoot_ sería:

- tener `python 3.7.x` instalado
- tener Flask y Pymongo instalado
- correr `python main.py` en consola