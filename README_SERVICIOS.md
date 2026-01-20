# Mini-SOC Intranet + Servicios Docker

## 1) Intranet (Mini-SOC)
Ejecuta el proyecto Mini-SOC en tu máquina (Apache/PHP local o el método que uses).
Tras iniciar sesión, entra en `intranet.php` (o usa el enlace **Intranet** en el menú).

## 2) Levantar los 4 servicios con Docker Compose
En la carpeta `services/` están el `.env` y `docker-compose.yml`.

### Arrancar
```bash
cd services
docker compose --env-file .env up -d
docker compose ps
```

### Accesos
- Nextcloud: http://localhost:8081
- Peppermint: http://localhost:8082
- Let's Chat: http://localhost:8083
- Moodle: http://localhost:8084

> Puedes cambiar puertos en `services/.env` y la intranet los leerá automáticamente.
