# LM ShowManager

![Logo](Screenshots/logo.png)

## Oversikt
LM ShowManager er en moderne, webbasert applikasjon for å planlegge, redigere og administrere festivalshow, med fokus på enkle produksjoner som skolefestivaler, barnefestivaler, talentshow og lignende. Det gjøres en total revamp fra det gamle GitHub-prosjektet: grensesnittet skal være *fluid*, responsivt og moderne, med støtte for både **light** og **dark mode**, automatisk tilpasset brukerens systempreferanse.

Systemet er laget for å kjøre på en delt hosting (shared host) med **PHP** og **MySQL** (eller kompatibel), men arkitektur og teknologi er fleksibel så lenge kravene nedenfor oppfylles.

## Viktigste funksjoner (versjon 1.x)

### Bruker, roller og autentisering
- Innlogging med e-post og passord (session-basert).  
- To roller: **admin** og **regissør**.  
  - Admin: full kontroll; kan opprette, redigere og slette brukere, overstyre låser på innslag.  
  - Regissør: kan opprette og redigere shows og innslag, men ikke administrere andre brukere.  
- Default admin-bruker opprettes via migrasjon:  
  - E-post: `admin@dittdomene.no`  
  - Passord: `admin123` *(må endres umiddelbart etter installasjon)*

### Show- og innslagshåndtering
- Opprett, rediger og list show med dato og session (f.eks. morgen / ettermiddag).  
- Opprett, rediger og sorter innslag per show. Hvert innslag inneholder:
  - Nummer (rekkefølge)
  - Tittel
  - Script (tekst konferansierene skal si)
  - Generell informasjon
  - Teknisk informasjon (f.eks. fade-out etter X sekunder)
  - Valgfri YouTube-link med “kopier til clipboard”-knapp  
- Drag & drop for å endre rekkefølge på innslag.  
- Lås / opplås innslag for å unngå kolliderende redigeringer. Admin kan overstyre låser.  
- Visning av hvem som sist oppdaterte et innslag og når.  
- Audit-logg: loggfører create/update/lock/unlock med bruker og tidspunkt.

### Brukeradministrasjon (kun admin)
- Liste over alle brukere med e-post og rolle.  
- Opprett, rediger (inkludert passordendring) og slett brukere.  
- Sikker sletting med bekreftelse.  

### UI/UX og frontend
- **Moderne, fluid og oversiktlig grensesnitt** bygget med Bootstrap 5.  
- **Dark mode + light mode**, automatisk basert på systempreferanse (`prefers-color-scheme`).  
- **Responsivt design** for desktop, nettbrett og mobil.  
- **Bootstrap Icons** for visuelle elementer.  
- **Fancy alerts** og bekreftelser med SweetAlert2.  
- **Kort-lister**: Shows og innslag vises som vertikale kort (kort i listeform, ikke flerkolonne-grid) for god lesbarhet.  
- **Navbar** med logo (firkantrute), favicon og navigasjon.  
- Lokal lagring (for senere utvidelse): mulighet til å lagre visningspreferanser per bruker via localStorage.

### Offline og versjonsdeteksjon
- **Service Worker** for caching av UI og statiske ressurser.  
- Melding til bruker når ny versjon er tilgjengelig (oppdatering via `skipWaiting` / `clients.claim`).  
- Redigeringsfunksjoner deaktiveres offline med tydelig indikasjon; bruker må være online for å lagre endringer.

### YouTube-link
- Input for YouTube-link med knapp som kopierer URL til clipboard (Clipboard API).

## Fremtidige (planlagte) hovedfunksjoner – Live-visninger
*(Implementeres i en senere fase, men spesifikasjon ligger her som referanse.)*  
- Tre faste visninger som kan bokmerkes på en Raspberry Pi uten ekstra konfig:
  - `/live/script`: svart bakgrunn og stor hvit tekst for konferansier-tekst. Oppdateres “push” når showet går videre.  
  - `/live/next`: viser hva som kommer neste.  
  - `/live/overview`: full oversikt over alle innslag med aktivt innslag fremhevet.  
- **Live session**-modell med `current_position` og “start show”-logikk.  
- **Push-oppdateringer** via Server-Sent Events (SSE) for MC-script.  
- Prev/Next-kontroller som endrer aktivt innslag i live session.

## Teknologistack (anbefalt / fleksibel)
- Backend: PHP (ren eller med et lett rammeverk senere).  
- Database: MySQL / MariaDB.  
- Frontend: Bootstrap 5, SweetAlert2, SortableJS, Bootstrap Icons.  
- Offline: Service Worker (vanilla JS).  
- Push (live): SSE i PHP (senere ev. WebSocket hvis toveis behov oppstår).

## Database-schema (MySQL)

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('admin','regissor') NOT NULL
);

CREATE TABLE shows (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date DATE NOT NULL,
  session ENUM('morgen','ettermiddag') NOT NULL
);

CREATE TABLE entries (
  id INT AUTO_INCREMENT PRIMARY KEY,
  show_id INT NOT NULL,
  number INT NOT NULL,
  title VARCHAR(255) NOT NULL,
  script TEXT,
  info TEXT,
  tech TEXT,
  yt_link VARCHAR(255),
  updated_by INT,
  updated_at DATETIME,
  locked_by INT,
  locked_at DATETIME,
  FOREIGN KEY (show_id) REFERENCES shows(id),
  FOREIGN KEY (updated_by) REFERENCES users(id),
  FOREIGN KEY (locked_by) REFERENCES users(id)
);

CREATE TABLE audit_log (
  id INT AUTO_INCREMENT PRIMARY KEY,
  entry_id INT,
  user_id INT,
  action ENUM('create','update','lock','unlock'),
  timestamp DATETIME,
  details TEXT,
  FOREIGN KEY (entry_id) REFERENCES entries(id),
  FOREIGN KEY (user_id) REFERENCES users(id)
);
```

Default admin (i migrasjon):

```sql
INSERT INTO users (email,password_hash,role)
VALUES ('admin@dittdomene.no',
        '$2y$10$zQFh5XK9xYjvRZc1b0QxeOv1W9pQ/3Y6n/U3h6uIZpQjQ7gE6Rsm',
        'admin');
-- passord: admin123 (hash generert med PHP password_hash)
```

## Installasjon på shared host

1. **Pakk ut prosjektet** i public webroot (f.eks. `public_html/lmshow`).  
2. **Opprett MySQL-database og bruker**.  
3. **Importer migrasjon** (fil `db.sql`) via phpMyAdmin eller CLI:
   ```bash
   mysql -u DB_USER -p DB_NAME < db.sql
   ```  
4. **Konfigurer DB-tilkobling** i `db.php`: sett host, database, bruker og passord.  
5. **Bytt ut logo & favicon**: erstatte `assets/img/logo-square.png` og `favicon.png` med dine egne.  
6. **Gi riktige filrettigheter** slik at webserver kan lese PHP/asset-filer.  
7. **Naviger til** `/login.php` og logg inn med default admin.  
8. **Endre admin-epost og passord** via brukeradministrasjon.  
9. **(Valgfritt)** Sikre med HTTPS.

## Oppgradering fra eksisterende repo
- Det gamle GitHub-prosjektet er utdatert og bør retenkes best practise.  
- Slett eller arkiver gamle UI-filer; nyt moderne struktur med partials, komponenter og modulære PHP-sider.  
- Oppdater README og legg til dokumentasjon i repo.

## Deployment-tips
- Bruk `.htaccess` hvis tilgjengelig for å:
  - Sette fallback-route eller pen URL (valgfritt).  
  - Tvinge HTTPS (dersom sertifikat finnes).  
- Vurder å legge inn en cron-jobb for å rydde gamle låser som har stått låst for lenge (kan være en fremtidig utvidelse).

## Bidra
- Opprett issues for bugs eller funksjonsønsker.  
- Send pull requests med tydelig beskrivelse.  
- Følg kodestruktur og hold UI/UX konsistent (Bootstrap + SweetAlert).  


## Kontakt / Vedlikehold
Prosjektet eies og utvikles av LegendMotion og teknisk av teamet. For videre utvikling, integrasjon med live-visninger, eller forbedringer, se spesifikasjonen i `README` og eventuelle tilknyttede issue templates.
