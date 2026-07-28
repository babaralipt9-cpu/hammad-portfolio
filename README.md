# Hammad Ali — Portfolio Website

**Single-file PHP application. No frameworks. No database. No npm.**

---

## Tech Stack
- **Backend**: PHP 8.0+ (single `index.php` file)
- **Frontend**: HTML5 · CSS3 · Vanilla JavaScript
- **Storage**: JSON flat-files (`data/` folder)
- **Auth**: PHP sessions + bcrypt password hashing

---

## File Structure
```
hammad-portfolio/
├── index.php          ← Entire application (PHP + HTML + CSS + JS)
├── vercel.json        ← Vercel deployment config
├── php.ini            ← PHP settings for Vercel
├── htaccess.txt       ← Rename to .htaccess for XAMPP
├── data/              ← Auto-created by PHP on first run
│   ├── portfolio.json ← All content (personal, projects, experience, skills)
│   ├── admin.json     ← Admin credentials (bcrypt hashed)
│   └── leads.json     ← Contact form submissions
└── README.md
```

---

## Default Admin Credentials
| Field | Value |
|-------|-------|
| Username | `admin` |
| Password | `Admin@1234!` |
| Recovery Key | `HAMMAD-RESET-2024` |

> ⚠️ Change these immediately after first login via Admin Panel → Security tab.

---

## Part 1 — Run Locally in VS Code

### Step 1 — Install PHP
1. Download **PHP 8.2 Thread Safe (x64)** from [windows.php.net/download](https://windows.php.net/download)
2. Extract to `C:\php`
3. Add `C:\php` to Windows **PATH** (Search → "Environment Variables" → Path → New → `C:\php`)
4. Open new terminal: `php --version` → should show `PHP 8.2.x`

### Step 2 — Install VS Code Extension
1. Open VS Code → Extensions (`Ctrl+Shift+X`)
2. Search **"PHP Server"** by brapifra → Install

### Step 3 — Configure PHP Path
1. VS Code → Settings (`Ctrl+,`)
2. Search **"php server"**
3. Set **PHP Server: PHP Path** → `C:\php\php.exe`

### Step 4 — Run the Site
1. Open the project folder in VS Code
2. **Right-click `index.php`** in the Explorer panel
3. Click **"PHP Server: Serve Project"**
4. Browser opens at `http://localhost:3000`

### Step 5 — View Your Site
| URL | Page |
|-----|------|
| `http://localhost:3000` | Portfolio homepage |
| `http://localhost:3000` (scroll to footer) | Click ⚙ Admin button |

**The `data/` folder is auto-created on first visit.**

---

## Part 2 — Deploy Free on Vercel

### Step 1 — Push to GitHub
1. Go to [github.com](https://github.com) → Sign up / Login
2. Click **"New repository"** → Name it `hammad-portfolio`
3. Set to **Public** → Create
4. Upload all files (drag & drop in GitHub UI):
   - `index.php`
   - `vercel.json`
   - `php.ini`
   - `README.md`
5. Click **"Commit changes"**

### Step 2 — Deploy on Vercel
1. Go to [vercel.com](https://vercel.com) → Sign up with GitHub
2. Click **"Add New Project"**
3. Select your `hammad-portfolio` repository
4. **Framework Preset** → Select **"Other"**
5. **Root Directory** → leave as `/`
6. Click **Deploy**

> Vercel auto-detects `vercel.json` and uses the PHP runtime.

### Step 3 — Your Site is Live
```
https://hammad-portfolio.vercel.app
```

### Step 4 — Custom Domain (optional, free)
1. In Vercel dashboard → your project → **Domains**
2. Add any custom domain you own
3. Or use the free `.vercel.app` subdomain

---

## ⚠️ Important: Vercel vs XAMPP Difference

| Feature | XAMPP (local) | Vercel (live) |
|---------|--------------|---------------|
| Data storage | `./data/*.json` (permanent) | `/tmp/*.json` (resets on cold start) |
| Admin changes | Persist forever | Persist within session |
| Contact form saves | Permanent | Temporary |
| Best for | Development | Portfolio display |

**On Vercel**: Admin panel changes are visible immediately but reset when Vercel restarts the serverless function. For a portfolio, the default data (hardcoded in `index.php`) is always shown. 

**For permanent edits on Vercel**: Edit `index.php` directly in GitHub — update the `$def` array in the PHP section. Vercel auto-redeploys on every GitHub push.

---

## QA Test Report

### ✅ Passed Tests

**Visual & Design**
- [x] Dark mode default loads correctly from localStorage
- [x] Light/dark toggle persists across page refresh
- [x] Glassmorphism cards render with backdrop-blur
- [x] All CSS animations play correctly (hero float, card hover lift, glow pulse)
- [x] Responsive layout collapses correctly on mobile (< 600px)
- [x] Sticky navbar with scroll-triggered glass effect
- [x] Scroll reveal animations trigger on viewport entry

**Content Sections**
- [x] Hero: name, title, tagline, stats, CTA buttons all display
- [x] About: bio, contact info, education shown correctly
- [x] Experience: all 7 entries render with timeline stripe
- [x] Projects: 3 cards with emoji, status badge, live links
- [x] Skills: 4 groups with coloured chips
- [x] Education & Certifications: degree + 4 certs display
- [x] Contact form: validation on empty fields + email format
- [x] Contact form: AJAX submit shows success/error state

**Admin Panel**
- [x] Admin button in footer opens overlay modal
- [x] Login with correct credentials → dashboard shown
- [x] Login with wrong credentials → error message shown
- [x] Forgot password link shows reset form
- [x] Recovery key validates correctly
- [x] Reset updates password via bcrypt
- [x] Dashboard: 6 tabs switch correctly
- [x] Personal tab: all fields save and update live DOM
- [x] Projects tab: add/edit/delete rows work
- [x] Experience tab: add/edit/delete rows work
- [x] Skills tab: add group, add chip, remove chip, save
- [x] Security tab: current password verified before update
- [x] Leads tab: loads submissions from JSON
- [x] Logout clears session and returns to login screen
- [x] Overlay closes on outside click

**PHP Backend**
- [x] `data/` directory auto-created on first run
- [x] Default portfolio.json seeded with all Hammad's data
- [x] Admin password stored as bcrypt hash
- [x] Contact form sanitizes input with `htmlspecialchars`
- [x] All POST actions validate session before admin ops
- [x] JSON files written with proper locking
- [x] Unauthorized admin requests return 401 JSON

### ⚠️ Known Limitations
- Vercel data is ephemeral (by design — serverless constraint)
- No image upload support (portfolio uses emoji icons)
- Sessions expire after 8 hours (configurable in php.ini)

---

## Customize Content Without Admin Panel

Edit the `$def` array in `index.php` (around line 30):

```php
'personal' => [
    'name'     => 'Your Name Here',
    'title'    => 'Your Title',
    'email'    => 'your@email.com',
    'phone'    => '+1 234 567 8900',
    'linkedin' => 'https://linkedin.com/in/yourprofile',
    'bio'      => 'Your bio text here...',
    ...
],
```

Push to GitHub → Vercel auto-redeploys in ~30 seconds.
