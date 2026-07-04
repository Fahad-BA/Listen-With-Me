# 🎧 Listen With Me

![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white)
![Status](https://img.shields.io/badge/status-archived-orange?style=flat-square)
![License](https://img.shields.io/badge/license-MIT-blue?style=flat-square)

A social music sharing platform where the owner publishes a "song of the day" with YouTube and SoundCloud links, and visitors can browse the collection and submit their own song recommendations. Features an Arabic RTL interface.

## ✨ Features

- **Song of the Day** — daily curated song with YouTube & SoundCloud embeds
- **Visitor Submissions** — guests can submit songs via a form
- **Admin Panel** — add, edit, and delete songs from a closed management area
- **Song Management** — MySQL-backed song table with dates
- **Arabic RTL** — fully right-to-left layout
- **Social Sharing** — built-in sharing buttons

## 🛠️ Tech Stack

- **PHP** — server-side logic (vanilla, no framework)
- **MySQL** — song database
- **Bootstrap 3** — responsive grid & components
- **jQuery** — frontend interactivity
- **Font Awesome** — social & music icons

## 📦 Installation

```bash
git clone https://github.com/Fahad-BA/Listen-With-Me.git
cd Listen-With-Me
# Import the SQL schema from closed/editsongsfahad/users.sql
# Update database credentials in config.php
php -S localhost:8000
```

Visit `http://localhost:8000`.
