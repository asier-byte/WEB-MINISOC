<img width="445" height="418" alt="image" src="https://github.com/user-attachments/assets/fa7c0c9b-ae6c-44ec-8c3f-710dc6f569e7" />


**_Mini SOC_** 



**Estructura del sitio web**

El sitio web de Mini SOC Local está diseñado como una SPA (Single Page Application) con navegación por secciones. La estructura principal se organiza de la siguiente manera:


| Sección                           | Contenido                                                                                                                         | Objetivo                                              |
| --------------------------------- | --------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------- |
| **Inicio**                        | Presentación de Mini SOC, misión, valores (Seguridad, Confianza, Educativo, Innovación) y botón para conocer más sobre la empresa | Introducir la empresa y captar interés                |
| **La empresa**                    | Historia, misión, visión y valores, banner motivador, organigrama y localización                                                  | Explicar filosofía, antecedentes y objetivos          |
| **Servicios**                     | Planes de suscripción: Básica, Profesional y Premium. Cada plan abre un modal con detalle completo                                | Informar sobre opciones de servicio y captar clientes |
| **El equipo**                     | Tarjetas de cada miembro del equipo, modales con resumen profesional, funciones y contacto                                        | Mostrar experiencia y generar confianza               |
| **Clientes**                      | Testimonios y logos de clientes                                                                                                   | Mostrar referencias y casos de éxito                  |
| **Contacto**                      | Formulario de contacto, email, redes sociales y ubicación en Google Maps                                                          | Facilitar la comunicación con usuarios                |
| **Login**                         | Formulario de inicio de sesión para administradores                                                                               | Acceso seguro al panel de administración              |

**Estética y estilos**
Para mantener homogeneidad en todas las secciones, se han definido los siguientes estilos:
Paleta de colores:

| Color                          | Uso                        |
| ------------------------------ | -------------------------- |
| Azul oscuro (#004080)          | Encabezados, navbar        |
| Azul claro (#0077ff)           | Botones primarios          |
| Blanco (#ffffff)               | Texto sobre fondos oscuros |
| Gris claro (#e6ebf1 / #cfd8e5) | Fondos y degradados        |
| Gris oscuro (#1c1c1c)          | Texto principal            |


**Tipografía**

| Elemento                   | Descripción                                                  |
| -------------------------- | ------------------------------------------------------------ |
| **Fuente principal**       | 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif              |
| **Jerarquía tipográfica**  | Basada en Bootstrap: display-4, h2, h3, lead                 |
| **Estilos personalizados** | Para títulos y párrafos, manteniendo legibilidad y contraste |


**Componentes y estilos clave**

| Componente / Estilo | Descripción                                                                                    |
| ------------------- | ---------------------------------------------------------------------------------------------- |
| **Navbar**          | Fija, con sombras suaves, enlaces interactivos (hover y active)                                |
| **Hero / Header**   | Altura mínima, centrado vertical y horizontal, overlay semitransparente, texto con text-shadow |
| **Cards**           | Esquinas redondeadas, animación hover-scale, sombra ligera y transición suave                  |
| **Botones**         | btn-primary azul con transición de color y efecto hover                                        |
| **Secciones**       | Títulos y subtítulos en azul oscuro con opción de text-shadow                                  |
| **Redes sociales**  | Botones circulares, colores representativos y efecto hover                                     |
| **Responsivo**      | Ajuste de tipografía y espaciado para móviles (@media max-width: 768px)                        |



**Estructura de archivos:**
<img width="383" height="187" alt="image" src="https://github.com/user-attachments/assets/42504f2c-df7e-4ccb-be34-d6365ca5ae2f" />


**Mini-SOC Intranet + Servicios Docker**
1) Intranet (Mini-SOC)

Ejecuta el proyecto Mini-SOC en tu máquina (Apache/PHP local o el método que uses).
Tras iniciar sesión, entra en intranet.php (o usa el enlace Intranet en el menú).

2) Levantar los 4 servicios con Docker Compose

En la carpeta services/ están el .env y docker-compose.yml

Arrancar servicios
<img width="164" height="45" alt="image" src="https://github.com/user-attachments/assets/bd53bc6c-de31-4803-8bed-533cbccfa749" />

## Despliegue

cd services
docker compose --env-file .env up -d --build

Accesos

Nextcloud: http://localhost:8081

Peppermint: http://localhost:8082

Let's Chat: http://localhost:8083

Moodle: http://localhost:8084

- Puedes cambiar puertos en services/.env y la intranet los leerá automáticamente.

**Nota**
- Debido a bastantes problemas de compatibilidad a la hora de levantar los servicios de la intranet, hemos tenido que apoyarnos en la IA, intentando entender en todo momento lo que nos proponía para no usarla de una manera que haga todo por nosotros, sino usándola con fines educativos para conseguir un correcto funcionamiento de la página.
