<?php 

// Benutzer Existiert 
const BE_ROWNAME = "Email";
const BE_DATENNAME = 'register-email';

// Benötigte Felder: 
const BF_VORNAME = true;
const BF_NACHNAME = true;
const BF_STRASSE = true;
const BF_HAUSNUMMER = true;
const BF_STADT = true;
const BF_PLZ = true;
const BF_EMAIL = true;

// Registerieren -> Erforderliche Daten (ED steht für "Erforderliche Daten")
const ED_VORNAME = true;
const ED_NACHNAME = true;
const ED_STRASSE = true;
const ED_HAUSNUMMER = true;
const ED_STADT = true;
const ED_PLZ = true;
const ED_EMAIL = true;
// Maximale Länge von dem HTML-tag (ML steht für "Maximale Länge")
// Standard: Empfohlene Datenbanklängen
const ML_VORNAME = "50";
const ML_NACHNAME = "50";
const ML_STRASSE = "95";
const ML_HAUSNUMMER = "5";
const ML_STADT = "35";
const ML_PLZ = "5";
const ML_EMAIL = "62";
// Minimale Länge für Passwörter: 
const ml_PWD = "8";
// Zur Überprüfung von der länge durch handler.php
const FORM_LEN = array(
    ML_VORNAME, ML_NACHNAME, ML_STRASSE, ML_HAUSNUMMER,ML_STADT,
    ML_PLZ, ML_EMAIL
);
// Überprüft nur die Felder welche auch erforderlich sind 
const FORM_EDP = array(
    ED_VORNAME, ED_NACHNAME, ED_STRASSE, ED_HAUSNUMMER, ED_STADT,
    ED_PLZ, ED_EMAIL
);