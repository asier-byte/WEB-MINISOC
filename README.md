Mini SOC Local

Mini SOC Local es un sitio web diseñado como una SPA (Single Page Application) para presentar los servicios de un SOC (Security Operations Center) local, destacando su equipo, servicios y contacto.

📂 Estructura del sitio web

El sitio web se organiza en varias secciones para mejorar la experiencia del usuario y facilitar la navegación.

Sección	Contenido	Objetivo
Inicio	Presentación de Mini SOC, misión, valores (Seguridad, Confianza, Educativo, Innovación) y botón para conocer más sobre la empresa	Introducir la empresa y captar interés
La empresa	Historia, misión, visión y valores, banner motivador, organigrama y localización	Explicar filosofía, antecedentes y objetivos
Servicios	Planes de suscripción: Básica, Profesional y Premium. Cada plan abre un modal con detalle completo	Informar sobre opciones de servicio y captar clientes
El equipo	Tarjetas de cada miembro del equipo, modales con resumen profesional, funciones y contacto	Mostrar experiencia y generar confianza
Clientes	Testimonios y logos de clientes	Mostrar referencias y casos de éxito
Contacto	Formulario de contacto, email, redes sociales y ubicación en Google Maps	Facilitar la comunicación con usuarios
Login	Formulario de inicio de sesión para administradores	Acceso seguro al panel de administración

🎨 Estética y estilos
Colores principales

Azul oscuro: #004080 → headers y navbar

Azul claro: #0077ff → botones primarios

Blanco: #ffffff → texto sobre fondos oscuros

Gris claro: #e6ebf1 y #cfd8e5 → fondos y degradados

Gris oscuro: #1c1c1c → texto principal

Tipografía

Fuente principal: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif

Jerarquía tipográfica con Bootstrap (display-4, h2, h3, lead) y estilos personalizados para títulos y párrafos

Componentes y estilos clave

Navbar: fija, con sombras suaves y enlaces interactivos (hover y active)

Hero/Header: altura mínima, centrado vertical y horizontal, overlay semitransparente, texto con text-shadow para mejorar contraste

Cards: esquinas redondeadas, transición hover-scale, sombra y animación ligera

Botones: btn-primary azul con transición de color y efecto hover

Secciones: títulos y subtítulos con color azul oscuro y opcional text-shadow para relieve

Redes sociales: botones circulares con colores de cada red y efecto hover

Responsivo: ajuste de tipografía y espaciado para móviles (@media max-width: 768px)

🗂️ Estructura de archivos
/mini-soc-web
│
├── index.html              # Página principal (SPA)
├── README.md               # Documentación del proyecto
├── assets/
│   ├── img/                # Imágenes (logo, equipo, banners)
│   └── styles/             
│       └── styles.css      # Estilos personalizados
└── js/
    └── scripts.js          # Scripts de navegación y modales
