<?php
/* ═══════════════════════════════════════════════════════════
   HAMMAD ALI — PORTFOLIO  |  Single-File PHP Application
   Stack: PHP · HTML5 · CSS3 · Vanilla JS  |  No frameworks
   ═══════════════════════════════════════════════════════════ */
session_start();

// Adaptive: local XAMPP uses ./data/, Vercel uses /tmp/
$baseDir = __DIR__;
$dataDir = is_writable($baseDir) ? $baseDir . '/data/' : '/tmp/hph-data/';
define('DATA_DIR', $dataDir);
define('PF',  DATA_DIR . 'portfolio.json');
define('ADM', DATA_DIR . 'admin.json');
define('LDS', DATA_DIR . 'leads.json');

if (!is_dir(DATA_DIR)) mkdir(DATA_DIR, 0755, true);

/* ── Default Admin Credentials ─────────────────────────── */
if (!file_exists(ADM)) {
    file_put_contents(ADM, json_encode([
        'username'          => 'admin@hammad.dev',
        'password'          => password_hash('Admin@123!', PASSWORD_BCRYPT, ['cost'=>10]),
        'recovery_key_hash' => hash('sha256', 'HAMMAD-RESET-2024'),
    ], JSON_PRETTY_PRINT));
}

/* ── Default Portfolio Data ─────────────────────────────── */
if (!file_exists(PF)) {
    $def = [
        'personal' => [
            'name'        => 'Hammad Ali',
            'title'       => 'SDO/SDR Specialist & Front-End Developer',
            'subtitle'    => 'Ecommerce Executive · Amazon PPC · Digital Marketing · Lead Generation · Web Development',
            'tagline'     => 'Building scalable digital solutions with a sales-driven mindset.',
            'location'    => 'Multan, Pakistan',
            'email'       => 'Hammadalikhan6455@gmail.com',
            'phone'       => '+92 303 0503776',
            'linkedin'    => 'https://www.linkedin.com/in/hammad-ali-khan-b313692bb',
            'bio'         => 'Sales-driven SDO/SDR professional with hands-on experience in lead generation, outbound prospecting, and pipeline management. Proven ability to qualify opportunities, book high-quality meetings, and support revenue growth. Strong background in Amazon PPC, TikTok Shop operations, and digital marketing, with a data-driven approach to campaign optimization. Holds a BS in Computer Science with technical knowledge in Flutter/Dart front-end development.',
            'stats'       => [
                ['label'=>'Ad Budget Managed','value'=>'$50K+/mo'],
                ['label'=>'ACoS Reduction','value'=>'40%'],
                ['label'=>'PPC Accounts Managed','value'=>'15+'],
                ['label'=>'Years Experience','value'=>'6+'],
            ],
        ],
        'experience' => [
            ['id'=>'e1','company'=>'WarpMill Technologies','role'=>'Sales Development Officer (SDO/SDR)','period'=>'Sep 2025 – Present','location'=>'Multan, Pakistan (US Remote)','description'=>'Generated and qualified inbound/outbound leads via cold calling, email outreach, and LinkedIn. Conducted discovery calls using BANT framework and scheduled meetings. Managed CRM pipelines (HubSpot, GHL, Apollo, AirTable) and supported deal progression in US Business Campaigns.','tags'=>['Cold Calling','HubSpot','BANT','Apollo','Lead Generation']],
            ['id'=>'e2','company'=>'LoadEdge Dispatch & Logistics','role'=>'Social Media Manager','period'=>'Jan 2026 – Present','location'=>'Remote','description'=>'Managing and growing the digital presence of LoadEdge. Developing social media strategies across LinkedIn, Facebook, and Instagram to build brand awareness and attract new carrier and shipper partnerships within the trucking and freight community.','tags'=>['LinkedIn','Facebook Ads','Instagram','Content Strategy','Analytics']],
            ['id'=>'e3','company'=>'Skillsrator','role'=>'Amazon PPC Specialist','period'=>'Nov 2024 – Jul 2025','location'=>'Punjab, Pakistan','description'=>'Reduced ACoS by 40% for beauty niche clients. Launched private label products generating £10K+ in first month. Managed 15+ PPC accounts across US & UK marketplaces. Tools: Helium 10, Jungle Scout, Amazon Seller Central.','tags'=>['Amazon PPC','SP/SB/SD','ACoS Optimization','Helium 10','Jungle Scout']],
            ['id'=>'e4','company'=>'Farosh (6 Figure Agency)','role'=>'Local E-Commerce Executive','period'=>'Jul 2025 – Sep 2025','location'=>'Multan, Pakistan','description'=>'Conducted product hunting and sourcing. Managed Meta Ads campaigns and creative testing. Handled order processing and confirmations.','tags'=>['Meta Ads','Product Sourcing','E-Commerce']],
            ['id'=>'e5','company'=>'Network Home Institute of IT (NHIIT)','role'=>'Front-End Android Developer','period'=>'Aug 2023 – Apr 2024','location'=>'Multan, Pakistan','description'=>'Designed responsive front-end software using Flutter/Dart. Built Android applications with clean UI/UX principles.','tags'=>['Flutter','Dart','Android','UI/UX']],
            ['id'=>'e6','company'=>'TikTok Shop','role'=>'Virtual Assistant','period'=>'Oct 2024 – Jan 2025','location'=>'Multan, Pakistan','description'=>'Managed product listings, inventory, and customer support. Ran TikTok Ads campaigns and optimized product visibility.','tags'=>['TikTok Ads','Product Listings','E-Commerce']],
            ['id'=>'e7','company'=>'JKSM – Pepsi Cola Bottlers Multan','role'=>'Production Supervisor','period'=>'Apr 2019 – May 2024','location'=>'Multan, Pakistan','description'=>'Supervised production branch employees at one of Pakistan\'s largest beverage bottling operations. Built operational discipline and team management skills.','tags'=>['Operations','Team Leadership','Quality Control']],
        ],
        'projects' => [
            ['id'=>'p1','title'=>'Deenhub','description'=>'A comprehensive Islamic content platform featuring articles, resources, and community-driven knowledge. Built for the Muslim community worldwide with a focus on authentic content and clean user experience.','url'=>'https://www.deenhub.info','tags'=>['Web Dev','Content Platform','SEO'],'status'=>'Live','emoji'=>'🌙','image'=>'/deenhub.png'],
            ['id'=>'p2','title'=>'Aqualift Store','description'=>'Professional e-commerce storefront with custom product catalog, streamlined checkout, and conversion-optimized design. Integrated Meta Ads for performance marketing and measurable ROI.','url'=>'https://www.aqualift.store','tags'=>['E-Commerce','Shopify','Meta Ads','CRO'],'status'=>'Live','emoji'=>'💧','image'=>'/Aqualift.png'],
            ['id'=>'p3','title'=>'Sulaiman Enterprises','description'=>'Premium construction and interior design company website with navy/copper brand identity, scroll-triggered animations, lead capture forms, project galleries, and animated testimonials. Delivered as a full business website.','url'=>'#','tags'=>['HTML/CSS','JavaScript','Lead Gen','Branding'],'status'=>'Delivered','emoji'=>'🏗️','image'=>'/Sulaiman.png'],
        ],
        'skills' => [
            ['category'=>'Sales & SDR','color'=>'#6366F1','items'=>['Cold Calling','Email Outreach','Lead Qualification','BANT Framework','HubSpot','GHL','Apollo','AirTable','B2B Prospecting','Pipeline Management','Salesforce','CRM Management']],
            ['category'=>'Amazon & E-Commerce','color'=>'#F59E0B','items'=>['Amazon PPC','SP/SB/SD Campaigns','ACoS/TACoS Optimization','Keyword Research','Helium 10','Jungle Scout','TikTok Shop','Meta Ads','Shopify','Product Sourcing']],
            ['category'=>'Development','color'=>'#22D3EE','items'=>['Flutter & Dart','Android Development','HTML5 & CSS3','JavaScript','PHP','MySQL','Responsive UI/UX','State Management','Android Studio','Git']],
            ['category'=>'Digital Marketing','color'=>'#22C55E','items'=>['Social Media Strategy','Content Creation','SEO','LinkedIn Marketing','Facebook Ads','Analytics & Reporting','Brand Building','Copywriting']],
        ],
        'certifications' => [
            ['name'=>'IT Service Management Level 4 (ITIL)','year'=>'2025'],
            ['name'=>'Amazon Virtual Assistant','year'=>'2025'],
            ['name'=>'Android Development','year'=>'2023'],
            ['name'=>'MS Office Professional','year'=>'2020'],
        ],
        'education' => [
            ['degree'=>'BS Computer Science','institution'=>'GC University Faisalabad','period'=>'2020 – 2024','grade'=>'3.5 GPA','note'=>'Thesis: Attendroid'],
        ],
        'publication' => 'Impact of Macroeconomic Indicators on Stock Market Predictions: A Cross Country Analysis — Journal of Computing & Biomedical Informatics Vol. 8 No. 01 (2024)',
    ];
    file_put_contents(PF, json_encode($def, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

if (!file_exists(LDS)) file_put_contents(LDS, '[]');

$adm = json_decode(file_get_contents(ADM), true);
$pf  = json_decode(file_get_contents(PF), true);

/* ══════════════════════════════════════════════════════════
   API HANDLER
   ══════════════════════════════════════════════════════════ */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    header('Content-Type: application/json');
    $act = $_POST['action'];

    /* LOGIN */
    if ($act === 'login') {
        if ($_POST['username'] === $adm['username'] && password_verify($_POST['password'] ?? '', $adm['password'])) {
            $_SESSION['admin'] = true; $_SESSION['at'] = time();
            echo json_encode(['ok'=>true]);
        } else {
            echo json_encode(['ok'=>false,'msg'=>'Invalid username or password.']);
        }
        exit();
    }

    /* LOGOUT */
    if ($act === 'logout') { session_destroy(); echo json_encode(['ok'=>true]); exit(); }

    /* RESET PASSWORD */
    if ($act === 'reset') {
        if (hash('sha256', trim($_POST['key']??'')) !== $adm['recovery_key_hash']) {
            echo json_encode(['ok'=>false,'msg'=>'Invalid recovery key.']); exit();
        }
        $np = trim($_POST['np']??'');
        if (strlen($np) < 6) { echo json_encode(['ok'=>false,'msg'=>'Password too short (min 6).']); exit(); }
        $adm['password'] = password_hash($np, PASSWORD_BCRYPT, ['cost'=>10]);
        if (!empty($_POST['nu'])) $adm['username'] = trim($_POST['nu']);
        file_put_contents(ADM, json_encode($adm, JSON_PRETTY_PRINT));
        echo json_encode(['ok'=>true,'msg'=>'Credentials reset! Please log in.']);
        exit();
    }

    /* CONTACT FORM */
    if ($act === 'contact') {
        $n = htmlspecialchars(trim($_POST['n']??''), ENT_QUOTES);
        $e = htmlspecialchars(trim($_POST['e']??''), ENT_QUOTES);
        $m = htmlspecialchars(trim($_POST['m']??''), ENT_QUOTES);
        if (!$n || !$e || !$m) { echo json_encode(['ok'=>false,'msg'=>'All fields required.']); exit(); }
        if (!filter_var($e, FILTER_VALIDATE_EMAIL)) { echo json_encode(['ok'=>false,'msg'=>'Invalid email.']); exit(); }
        $lds = json_decode(file_get_contents(LDS), true);
        $lds[] = ['id'=>'ld_'.uniqid(),'status'=>'Pending','name'=>$n,'email'=>$e,'message'=>$m,'date'=>date('Y-m-d H:i:s'),'ip'=>$_SERVER['REMOTE_ADDR']??''];
        file_put_contents(LDS, json_encode($lds, JSON_PRETTY_PRINT));
        echo json_encode(['ok'=>true,'msg'=>"Thanks $n! I'll get back to you within 24 hours."]);
        exit();
    }

    /* ── ADMIN-ONLY BELOW ─────────────────────────────── */
    if (!isset($_SESSION['admin'])) { echo json_encode(['ok'=>false,'msg'=>'Unauthorized']); exit(); }

    /* SAVE PERSONAL */
    if ($act === 'save_personal') {
        foreach (['name','title','subtitle','tagline','location','email','phone','linkedin','bio'] as $f)
            $pf['personal'][$f] = htmlspecialchars(trim($_POST[$f]??''), ENT_QUOTES);
        file_put_contents(PF, json_encode($pf, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo json_encode(['ok'=>true]); exit();
    }

    /* SAVE PROJECT */
    if ($act === 'save_project') {
        $id = trim($_POST['id']??'');
        $proj = [
            'id'          => $id ?: 'p'.uniqid(),
            'title'       => htmlspecialchars(trim($_POST['title']??''), ENT_QUOTES),
            'description' => htmlspecialchars(trim($_POST['description']??''), ENT_QUOTES),
            'url'         => htmlspecialchars(trim($_POST['url']??''), ENT_QUOTES),
            'tags'        => array_values(array_filter(array_map('trim', explode(',', $_POST['tags']??'')))),
            'status'      => htmlspecialchars(trim($_POST['status']??'Live'), ENT_QUOTES),
            'emoji'       => htmlspecialchars(trim($_POST['emoji']??'💼'), ENT_QUOTES),
        ];
        if ($id) { foreach ($pf['projects'] as &$p) { if ($p['id']===$id){$p=$proj;break;} } }
        else      { $pf['projects'][] = $proj; }
        file_put_contents(PF, json_encode($pf, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo json_encode(['ok'=>true,'proj'=>$proj]); exit();
    }

    /* DELETE PROJECT */
    if ($act === 'del_project') {
        $pf['projects'] = array_values(array_filter($pf['projects'], fn($p)=>$p['id']!==trim($_POST['id']??'')));
        file_put_contents(PF, json_encode($pf, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo json_encode(['ok'=>true]); exit();
    }

    /* SAVE EXPERIENCE */
    if ($act === 'save_exp') {
        $id = trim($_POST['id']??'');
        $exp = [
            'id'          => $id ?: 'e'.uniqid(),
            'company'     => htmlspecialchars(trim($_POST['company']??''), ENT_QUOTES),
            'role'        => htmlspecialchars(trim($_POST['role']??''), ENT_QUOTES),
            'period'      => htmlspecialchars(trim($_POST['period']??''), ENT_QUOTES),
            'location'    => htmlspecialchars(trim($_POST['location']??''), ENT_QUOTES),
            'description' => htmlspecialchars(trim($_POST['description']??''), ENT_QUOTES),
            'tags'        => array_values(array_filter(array_map('trim', explode(',', $_POST['tags']??'')))),
        ];
        if ($id) { foreach ($pf['experience'] as &$e) { if ($e['id']===$id){$e=$exp;break;} } }
        else      { array_unshift($pf['experience'], $exp); }
        file_put_contents(PF, json_encode($pf, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo json_encode(['ok'=>true]); exit();
    }

    /* DELETE EXPERIENCE */
    if ($act === 'del_exp') {
        $pf['experience'] = array_values(array_filter($pf['experience'], fn($e)=>$e['id']!==trim($_POST['id']??'')));
        file_put_contents(PF, json_encode($pf, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo json_encode(['ok'=>true]); exit();
    }

    /* SAVE SKILLS JSON */
    if ($act === 'save_skills') {
        $sk = json_decode($_POST['json']??'[]', true);
        if (is_array($sk)) { $pf['skills']=$sk; file_put_contents(PF, json_encode($pf, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)); echo json_encode(['ok'=>true]); }
        else echo json_encode(['ok'=>false,'msg'=>'Bad data']);
        exit();
    }

    /* CHANGE CREDENTIALS */
    if ($act === 'change_creds') {
        if (!password_verify($_POST['cp']??'', $adm['password'])) {
            echo json_encode(['ok'=>false,'msg'=>'Current password incorrect.']); exit();
        }
        if (!empty($_POST['nu'])) $adm['username'] = trim($_POST['nu']);
        if (!empty($_POST['np'])) {
            if (strlen(trim($_POST['np'])) < 6) { echo json_encode(['ok'=>false,'msg'=>'New password too short.']); exit(); }
            $adm['password'] = password_hash(trim($_POST['np']), PASSWORD_BCRYPT, ['cost'=>10]);
        }
        if (!empty($_POST['nk'])) $adm['recovery_key_hash'] = hash('sha256', trim($_POST['nk']));
        file_put_contents(ADM, json_encode($adm, JSON_PRETTY_PRINT));
        echo json_encode(['ok'=>true,'msg'=>'Security settings updated.']); exit();
    }

    /* GET LEADS */
    if ($act === 'get_leads') {
        $lds = json_decode(file_get_contents(LDS), true) ?: [];
        $changed = false;
        foreach ($lds as $idx => &$ld) {
            if (empty($ld['id'])) { $ld['id'] = 'ld_' . substr(md5(($ld['date']??'').($ld['email']??'').$idx), 0, 10); $changed = true; }
            if (empty($ld['status'])) { $ld['status'] = 'Pending'; $changed = true; }
        }
        if ($changed) file_put_contents(LDS, json_encode($lds, JSON_PRETTY_PRINT));
        echo json_encode(['ok'=>true,'leads'=>array_reverse($lds)]); exit();
    }

    /* UPDATE LEAD STATUS */
    if ($act === 'update_lead_status') {
        $id = trim($_POST['id']??'');
        $st = trim($_POST['status']??'Pending');
        if (!in_array($st, ['Pending','Viewed','Contacted'])) { echo json_encode(['ok'=>false,'msg'=>'Invalid status']); exit(); }
        $lds = json_decode(file_get_contents(LDS), true) ?: [];
        $found = false;
        foreach ($lds as &$ld) {
            if (($ld['id'] ?? '') === $id) { $ld['status'] = $st; $found = true; break; }
        }
        if ($found) {
            file_put_contents(LDS, json_encode($lds, JSON_PRETTY_PRINT));
            echo json_encode(['ok'=>true]);
        } else {
            echo json_encode(['ok'=>false,'msg'=>'Lead not found']);
        }
        exit();
    }

    /* DELETE LEAD */
    if ($act === 'del_lead') {
        $id = trim($_POST['id']??'');
        $lds = json_decode(file_get_contents(LDS), true) ?: [];
        $lds = array_values(array_filter($lds, fn($l)=>($l['id']??'') !== $id));
        file_put_contents(LDS, json_encode($lds, JSON_PRETTY_PRINT));
        echo json_encode(['ok'=>true]); exit();
    }

    echo json_encode(['ok'=>false,'msg'=>'Unknown action']); exit();
}

$p   = $pf['personal'];
$exp = $pf['experience'];
$prj = $pf['projects'];
$sk  = $pf['skills'];
$cer = $pf['certifications'];
$edu = $pf['education'];
$pub = $pf['publication'] ?? '';
$logged = isset($_SESSION['admin']);
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($p['name']) ?> — World-Class Portfolio</title>
<meta name="description" content="<?= htmlspecialchars($p['title']) ?> based in <?= htmlspecialchars($p['location']) ?>">
<?php
  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
  $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
  $pageUrl = $protocol . '://' . $host . ($_SERVER['REQUEST_URI'] ?? '/');
  $previewImage = $protocol . '://' . $host . '/person.png';
  $siteTitle = htmlspecialchars($p['name']) . ' — World-Class Portfolio';
  $siteDescription = htmlspecialchars($p['title']) . ' based in ' . htmlspecialchars($p['location']);
  $avatarDataUri = '';
  $avatarPath = __DIR__ . '/public/person.png';
  if (file_exists($avatarPath)) {
      $avatarDataUri = 'data:image/png;base64,' . base64_encode(file_get_contents($avatarPath));
  }
  $avatarDataUri = '';
  $avatarPath = __DIR__ . '/public/person.png';
  if (file_exists($avatarPath)) {
      $avatarDataUri = 'data:image/png;base64,' . base64_encode(file_get_contents($avatarPath));
  }
?>
<meta property="og:type" content="website">
<meta property="og:title" content="<?= $siteTitle ?>">
<meta property="og:description" content="<?= $siteDescription ?>">
<meta property="og:url" content="<?= htmlspecialchars($pageUrl) ?>">
<meta property="og:image" content="<?= htmlspecialchars($previewImage) ?>">
<meta property="og:image:alt" content="<?= htmlspecialchars($p['name']) ?> profile picture">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= $siteTitle ?>">
<meta name="twitter:description" content="<?= $siteDescription ?>">
<meta name="twitter:image" content="<?= htmlspecialchars($previewImage) ?>">
<meta name="twitter:image:alt" content="<?= htmlspecialchars($p['name']) ?> profile picture">
<link rel="icon" href="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIj4NCiAgPGRlZnM+DQogICAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiB4MT0iMCUiIHkxPSIwJSIgeDI9IjEwMCUiIHkyPSIxMDAlIj4NCiAgICAgIDxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiM2MzY2RjEiIC8+DQogICAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMyMkQzRUUiIC8+DQogICAgPC9saW5lYXJHcmFkaWVudD4NCiAgPC9kZWZzPg0KICA8cmVjdCB4PSIxNSIgeT0iMTUiIHdpZHRoPSI0ODIiIGhlaWdodD0iNDgyIiByeD0iMTEwIiBmaWxsPSJ1cmwoI2dyYWQpIiAvPg0KICA8cmVjdCB4PSIxNDAiIHk9IjEzMCIgd2lkdGg9IjYwIiBoZWlnaHQ9IjI1MiIgcng9IjE1IiBmaWxsPSIjRkZGRkZGIiAvPg0KICA8cmVjdCB4PSIzMTIiIHk9IjEzMCIgd2lkdGg9IjYwIiBoZWlnaHQ9IjI1MiIgcng9IjE1IiBmaWxsPSIjRkZGRkZGIiAvPg0KICA8cmVjdCB4PSIxOTAiIHk9IjIyNiIgd2lkdGg9IjEzMiIgaGVpZ2h0PSI2MCIgcng9IjEwIiBmaWxsPSIjRkZGRkZGIiAvPg0KPC9zdmc+DQo=">

<!-- Google Fonts: Plus Jakarta Sans & Outfit -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>
/* ═══════════════════════════════════════════════════
   WORLD-CLASS DESIGN SYSTEM & THEMING
   ═══════════════════════════════════════════════════ */
:root {
  --font-body: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
  --font-heading: 'Outfit', sans-serif;

  /* Light Theme (Crisp Executive Slate) */
  --bg:          #F8FAFC;
  --bg2:         #F1F5F9;
  --bg3:         #E2E8F0;
  --surface:     rgba(255, 255, 255, 0.75);
  --surf-b:      rgba(226, 232, 240, 0.8);
  --surf-h:      rgba(255, 255, 255, 0.95);
  --text:        #0F172A;
  --heading:     #020617;
  --muted:       #475569;
  --subtle:      #64748B;
  --accent:      #4F46E5;
  --accent-light:#818CF8;
  --accent2:     #7C3AED;
  --cyan:        #0284C7;
  --green:       #16A34A;
  --amber:       #D97706;
  --red:         #DC2626;
  --border:      rgba(79, 70, 229, 0.15);
  --border-glow: rgba(79, 70, 229, 0.4);
  --glow:        rgba(79, 70, 229, 0.2);
  --radius:      20px;
  --radius-sm:   10px;
  --blur:        blur(24px);
  --transition:  all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
  --shadow:      0 10px 30px -10px rgba(0, 0, 0, 0.05), 0 2px 8px rgba(0,0,0,0.03);
  --shadow-h:    0 24px 60px -12px rgba(79, 70, 229, 0.18), 0 8px 24px -4px rgba(0, 0, 0, 0.06);
}

[data-theme="dark"] {
  /* Dark Theme (Deep Obsidian Mesh) */
  --bg:          #070A14;
  --bg2:         #0D1224;
  --bg3:         #131B36;
  --surface:     rgba(18, 24, 43, 0.65);
  --surf-b:      rgba(255, 255, 255, 0.08);
  --surf-h:      rgba(26, 35, 62, 0.85);
  --text:        #F8FAFC;
  --heading:     #FFFFFF;
  --muted:       #94A3B8;
  --subtle:      #64748B;
  --accent:      #6366F1;
  --accent-light:#A5B4FC;
  --accent2:     #8B5CF6;
  --cyan:        #06B6D4;
  --green:       #22C55E;
  --amber:       #F59E0B;
  --border:      rgba(255, 255, 255, 0.09);
  --border-glow: rgba(99, 102, 241, 0.5);
  --glow:        rgba(99, 102, 241, 0.35);
  --shadow:      0 12px 40px -10px rgba(0, 0, 0, 0.5), 0 2px 10px rgba(0, 0, 0, 0.3);
  --shadow-h:    0 30px 70px -12px rgba(99, 102, 241, 0.3), 0 10px 30px rgba(0, 0, 0, 0.4);
}

/* ── Reset & Global ──────────────────────────────────── */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; font-size: 16px; text-rendering: optimizeLegibility; -webkit-font-smoothing: antialiased; }
body {
  font-family: var(--font-body);
  background: var(--bg);
  color: var(--text);
  line-height: 1.65;
  overflow-x: hidden;
  transition: background 0.4s ease, color 0.4s ease;
  position: relative;
}

/* Custom Scrollbar */
::-webkit-scrollbar { width: 8px; }
::-webkit-scrollbar-track { background: var(--bg); }
::-webkit-scrollbar-thumb {
  background: linear-gradient(180deg, var(--accent), var(--cyan));
  border-radius: 10px;
}

/* Typography Headings */
h1, h2, h3, h4, .nav-logo, .section-title { font-family: var(--font-heading); color: var(--heading); }
a { color: var(--accent); text-decoration: none; transition: var(--transition); }
a:hover { opacity: 0.9; }
img { max-width: 100%; display: block; }
button { cursor: pointer; font-family: inherit; border: none; background: none; transition: var(--transition); }
input, textarea, select { font-family: inherit; outline: none; }

/* ── Scroll Progress Line ────────────────────────────── */
#scroll-progress {
  position: fixed;
  top: 0; left: 0;
  height: 3px;
  width: 0%;
  background: linear-gradient(90deg, var(--accent), var(--cyan), var(--accent2));
  z-index: 1001;
  box-shadow: 0 0 12px var(--accent);
  transition: width 0.1s ease-out;
}

/* ── Floating Action: Back To Top ────────────────────── */
#scroll-to-top {
  position: fixed;
  bottom: 30px;
  right: 30px;
  width: 48px;
  height: 48px;
  border-radius: 50%;
  background: var(--surface);
  border: 1px solid var(--border);
  backdrop-filter: var(--blur);
  -webkit-backdrop-filter: var(--blur);
  color: var(--text);
  font-size: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 90;
  box-shadow: var(--shadow);
  opacity: 0;
  visibility: hidden;
  transform: translateY(20px) scale(0.8);
  transition: var(--transition);
}
#scroll-to-top.show {
  opacity: 1;
  visibility: visible;
  transform: translateY(0) scale(1);
}
#scroll-to-top:hover {
  background: var(--accent);
  color: #fff;
  border-color: var(--accent);
  box-shadow: 0 10px 25px var(--glow);
  transform: translateY(-4px) scale(1.08);
}

/* ── Glassmorphism 2.0 ────────────────────────────────── */
.glass-card {
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  backdrop-filter: var(--blur);
  -webkit-backdrop-filter: var(--blur);
  box-shadow: var(--shadow);
  transition: var(--transition);
  position: relative;
  overflow: hidden;
}
.glass-card::after {
  content: '';
  position: absolute;
  inset: 0;
  border-radius: var(--radius);
  background: radial-gradient(600px circle at var(--mouse-x, 50%) var(--mouse-y, 50%), rgba(255,255,255,0.06), transparent 40%);
  pointer-events: none;
  opacity: 0;
  transition: opacity 0.3s ease;
}
.glass-card:hover::after { opacity: 1; }
.glass-card:hover {
  border-color: var(--border-glow);
  box-shadow: var(--shadow-h);
}

.glass-header {
  background: var(--surface);
  border-bottom: 1px solid var(--border);
  backdrop-filter: var(--blur);
  -webkit-backdrop-filter: var(--blur);
}

.glass-modal {
  background: var(--surface);
  border: 1px solid var(--border);
  backdrop-filter: blur(35px);
  -webkit-backdrop-filter: blur(35px);
}

/* ── Buttons & Micro-Interactions ────────────────────── */
.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  padding: 12px 26px;
  border-radius: 100px;
  font-size: 14px;
  font-weight: 700;
  letter-spacing: 0.3px;
  transition: var(--transition);
  position: relative;
  overflow: hidden;
  z-index: 1;
}
.btn::before {
  content: '';
  position: absolute;
  top: 50%; left: 50%;
  width: 0; height: 0;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.25);
  transform: translate(-50%, -50%);
  transition: width 0.6s ease, height 0.6s ease;
  z-index: -1;
}
.btn:active::before {
  width: 300px;
  height: 300px;
}
.btn-primary {
  background: linear-gradient(135deg, var(--accent), var(--accent2));
  color: #FFFFFF !important;
  box-shadow: 0 8px 24px var(--glow);
}
.btn-primary:hover {
  box-shadow: 0 14px 35px var(--glow), 0 0 20px rgba(99, 102, 241, 0.4);
  transform: translateY(-3px) scale(1.02);
}
.btn-outline {
  background: transparent;
  color: var(--text);
  border: 1.5px solid var(--border);
}
.btn-outline:hover {
  background: var(--surface);
  border-color: var(--accent);
  color: var(--accent);
  box-shadow: 0 8px 24px rgba(99, 102, 241, 0.15);
  transform: translateY(-3px);
}
.btn-ghost {
  background: var(--surface);
  color: var(--text);
  border: 1px solid var(--border);
}
.btn-ghost:hover {
  background: var(--surf-h);
  border-color: var(--accent);
  color: var(--accent);
  transform: translateY(-2px);
}
.btn-danger {
  background: rgba(220, 38, 38, 0.12);
  color: var(--red);
  border: 1px solid rgba(220, 38, 38, 0.3);
}
.btn-danger:hover {
  background: var(--red);
  color: #fff;
  box-shadow: 0 6px 20px rgba(220, 38, 38, 0.3);
}
.btn-sm { padding: 8px 18px; font-size: 13px; }
.btn-full { width: 100%; justify-content: center; }

/* Dynamic Contact Button Pulse */
#cf-btn {
  position: relative;
  overflow: hidden;
  z-index: 1;
  min-width: 250px;
  min-height: 54px;
  background: linear-gradient(135deg, var(--accent), var(--accent2));
  color: #ffffff;
  border-radius: 1000px;
  border: none;
  font-weight: 700;
  box-shadow: 0 14px 35px var(--glow);
  transition: var(--transition);
}
#cf-btn:hover {
  transform: translateY(-4px) scale(1.02);
  box-shadow: 0 20px 45px var(--glow), 0 0 30px rgba(99, 102, 241, 0.5);
}

/* ── Form Controls ─────────────────────────────────── */
.form-group { margin-bottom: 20px; }
.form-label {
  display: block;
  font-size: 11px;
  font-weight: 700;
  color: var(--muted);
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-bottom: 8px;
}
.form-input {
  width: 100%;
  background: var(--surface);
  border: 1.5px solid var(--border);
  border-radius: var(--radius-sm);
  padding: 12px 16px;
  color: var(--text);
  font-size: 14px;
  transition: var(--transition);
}
.form-input:focus {
  border-color: var(--accent);
  box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.18);
  background: var(--surf-h);
}
.form-input::placeholder { color: var(--subtle); }
select.form-input { cursor: pointer; }
select.form-input option { background: var(--bg2); color: var(--text); }
textarea.form-input { resize: vertical; min-height: 100px; }

/* ── Layout & Containers ───────────────────────────── */
.container { max-width: 1160px; margin: 0 auto; padding: 0 28px; }
.section { padding: 100px 0; position: relative; scroll-margin-top: 90px; }
.section-label {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 12px;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 2px;
  color: var(--accent);
  margin-bottom: 12px;
  background: rgba(99, 102, 241, 0.1);
  padding: 4px 14px;
  border-radius: 100px;
  border: 1px solid rgba(99, 102, 241, 0.2);
}
.section-title {
  font-size: clamp(30px, 4.5vw, 46px);
  font-weight: 800;
  line-height: 1.15;
  margin-bottom: 16px;
  letter-spacing: -1px;
}
.section-sub {
  font-size: 16px;
  color: var(--muted);
  max-width: 580px;
  line-height: 1.7;
  margin-bottom: 48px;
}
.grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; }
.grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.divider {
  height: 1px;
  background: linear-gradient(90deg, transparent, var(--border), transparent);
  margin: 0;
}

/* ── Keyframe Animations ────────────────────────────── */
@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}
@keyframes floatY {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-12px); }
}
@keyframes glowPulse {
  0%, 100% { box-shadow: 0 0 15px var(--glow); }
  50% { box-shadow: 0 0 35px var(--glow), 0 0 60px rgba(99, 102, 241, 0.2); }
}
@keyframes textShimmer {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}
@keyframes badgePulse {
  0%, 100% { transform: scale(1); opacity: 1; }
  50% { transform: scale(1.3); opacity: 0.6; }
}
@keyframes scaleIn {
  from { transform: scale(0.93); opacity: 0; }
  to { transform: scale(1); opacity: 1; }
}
@keyframes rotateSpin {
  to { transform: rotate(360deg); }
}

.reveal {
  opacity: 0;
  transform: translateY(35px) scale(0.98);
  filter: blur(4px);
  transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1), filter 0.7s ease;
}
.reveal.visible {
  opacity: 1;
  transform: translateY(0) scale(1);
  filter: blur(0);
}

/* ── Navbar ────────────────────────────────────────── */
#navbar {
  position: fixed;
  top: 0; left: 0; right: 0;
  z-index: 1000;
  padding: 20px 0;
  transition: var(--transition);
}
#navbar.scrolled {
  padding: 12px 0;
  box-shadow: var(--shadow);
}
.nav-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
}
.nav-logo {
  font-weight: 900;
  font-size: 22px;
  letter-spacing: -0.5px;
  display: flex;
  align-items: center;
  gap: 6px;
  color: var(--heading);
}
.nav-logo span {
  background: linear-gradient(135deg, var(--accent), var(--cyan));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.nav-links {
  display: flex;
  align-items: center;
  gap: 6px;
  background: var(--surface);
  padding: 6px 12px;
  border-radius: 100px;
  border: 1px solid var(--border);
  backdrop-filter: var(--blur);
}
.nav-link {
  padding: 8px 18px;
  border-radius: 100px;
  font-size: 13px;
  font-weight: 600;
  color: var(--muted);
  transition: var(--transition);
}
.nav-link:hover, .nav-link.active {
  color: #ffffff !important;
  background: var(--accent);
  box-shadow: 0 4px 15px var(--glow);
}
.nav-actions { display: flex; align-items: center; gap: 12px; }

/* Theme Button with Icon Spin */
.theme-btn {
  width: 42px;
  height: 42px;
  border-radius: 50%;
  background: var(--surface);
  border: 1px solid var(--border);
  color: var(--text);
  font-size: 18px;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: var(--shadow);
  transition: var(--transition);
}
.theme-btn:hover {
  background: var(--surf-h);
  transform: rotate(30deg) scale(1.1);
  border-color: var(--accent);
}

.mobile-toggle {
  display: none;
  width: 42px;
  height: 42px;
  border-radius: var(--radius-sm);
  background: var(--surface);
  border: 1px solid var(--border);
  color: var(--text);
  font-size: 20px;
  align-items: center;
  justify-content: center;
}
.mobile-menu {
  display: none;
  position: fixed;
  top: 75px; left: 20px; right: 20px;
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  padding: 20px;
  flex-direction: column;
  gap: 8px;
  z-index: 999;
  box-shadow: var(--shadow-h);
  backdrop-filter: blur(30px);
  -webkit-backdrop-filter: blur(30px);
  animation: fadeInUp 0.3s ease;
}
.mobile-menu.open { display: flex; }
.mobile-link {
  padding: 12px 18px;
  border-radius: var(--radius-sm);
  font-size: 15px;
  color: var(--text);
  font-weight: 600;
}
.mobile-link:hover { background: var(--accent); color: #fff; }

/* ── Hero Section ──────────────────────────────────── */
#hero {
  min-height: 100vh;
  display: flex;
  align-items: center;
  padding-top: 110px;
  padding-bottom: 60px;
  position: relative;
  overflow: hidden;
}
#hero-canvas {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: 0;
}
.hero-bg-glow {
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse 65% 50% at 20% 35%, rgba(99, 102, 241, 0.15) 0%, transparent 70%),
    radial-gradient(ellipse 50% 45% at 80% 25%, rgba(6, 182, 212, 0.12) 0%, transparent 65%),
    radial-gradient(ellipse 55% 40% at 50% 85%, rgba(139, 92, 246, 0.1) 0%, transparent 60%);
  pointer-events: none;
}
.hero-grid {
  display: grid;
  grid-template-columns: 1.2fr 0.9fr;
  gap: 60px;
  align-items: center;
  position: relative;
  z-index: 1;
}

/* Badge with Pulse */
.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: rgba(99, 102, 241, 0.12);
  border: 1px solid rgba(99, 102, 241, 0.3);
  border-radius: 100px;
  padding: 8px 20px;
  font-size: 13px;
  font-weight: 700;
  color: var(--accent);
  margin-bottom: 24px;
  backdrop-filter: blur(10px);
}
.badge-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: var(--green);
  box-shadow: 0 0 10px var(--green);
  animation: badgePulse 2s infinite ease-in-out;
}

/* Hero Typography */
.hero-name {
  font-size: clamp(42px, 6.5vw, 76px);
  font-weight: 900;
  line-height: 1.05;
  letter-spacing: -2px;
  margin-bottom: 14px;
}
.hero-name .accent-text {
  background: linear-gradient(135deg, var(--accent), var(--cyan), var(--accent2));
  background-size: 200% 200%;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: textShimmer 8s infinite ease-in-out;
}
.hero-title {
  font-size: clamp(18px, 2.8vw, 24px);
  color: var(--muted);
  font-weight: 600;
  margin-bottom: 12px;
  display: flex;
  align-items: center;
  gap: 8px;
}
#typing-text {
  color: var(--accent);
  border-right: 2px solid var(--accent);
  white-space: nowrap;
  padding-right: 4px;
  animation: blink 0.8s infinite;
}
@keyframes blink { 0%, 100% { border-color: transparent; } 50% { border-color: var(--accent); } }

.hero-tagline {
  font-size: 16px;
  color: var(--subtle);
  max-width: 520px;
  line-height: 1.8;
  margin-bottom: 36px;
}

.hero-btns { display: flex; gap: 16px; flex-wrap: wrap; margin-bottom: 40px; }

/* Stats Grid */
.hero-stats {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 16px;
}
.hero-stat {
  padding: 20px;
  text-align: center;
  border-radius: var(--radius-sm);
  background: var(--surface);
  border: 1px solid var(--border);
  transition: var(--transition);
}
.hero-stat:hover {
  transform: translateY(-6px);
  border-color: var(--border-glow);
  box-shadow: var(--shadow-h);
}
.stat-val {
  font-size: 26px;
  font-weight: 800;
  font-family: var(--font-heading);
  background: linear-gradient(135deg, var(--accent), var(--cyan));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  display: block;
}
.stat-lbl {
  font-size: 11px;
  color: var(--muted);
  text-transform: uppercase;
  letter-spacing: 0.8px;
  font-weight: 700;
  margin-top: 4px;
}

/* Hero Cards Column */
.hero-visual {
  display: flex;
  flex-direction: column;
  gap: 18px;
}
.hero-card {
  padding: 22px 24px;
  border-radius: var(--radius);
  transition: var(--transition);
}
.hero-card:nth-child(1) { animation: floatY 6s ease-in-out infinite; }
.hero-card:nth-child(2) { animation: floatY 7s ease-in-out infinite 1s; }
.hero-card:nth-child(3) { animation: floatY 6.5s ease-in-out infinite 2s; }
.hc-icon { font-size: 32px; margin-bottom: 10px; }
.hc-title { font-size: 15px; font-weight: 800; margin-bottom: 4px; }
.hc-sub { font-size: 13px; color: var(--muted); line-height: 1.5; }

/* ── About Section ─────────────────────────────────── */
#about { background: var(--bg2); }
.about-grid {
  display: grid;
  grid-template-columns: 1fr 1.6fr;
  gap: 40px;
  align-items: start;
}
.about-avatar-wrap {
  position: relative;
  width: 110px;
  height: 110px;
  margin: 0 auto 20px;
}
.about-avatar-wrap::before {
  content: '';
  position: absolute;
  inset: -6px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--accent), var(--cyan), var(--accent2));
  animation: rotateSpin 8s linear infinite;
  opacity: 0.8;
}
.about-avatar {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  object-fit: cover;
  position: relative;
  z-index: 1;
  border: 4px solid var(--bg2);
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-weight: 800;
  font-size: 14px;
  background-color: #0f172a;
}

.avatar-initials { position: relative; z-index: 2; }
.about-name { font-size: 22px; font-weight: 800; margin-bottom: 4px; }
.about-role { font-size: 14px; color: var(--accent); font-weight: 700; margin-bottom: 16px; }
.avail-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(34, 197, 94, 0.12);
  border: 1px solid rgba(34, 197, 94, 0.3);
  border-radius: 100px;
  padding: 6px 16px;
  font-size: 12px;
  color: var(--green);
  font-weight: 700;
  margin-bottom: 24px;
}
.info-item { display: flex; align-items: flex-start; gap: 14px; margin-bottom: 14px; text-align: left; }
.info-icon { font-size: 18px; color: var(--accent); flex-shrink: 0; margin-top: 2px; }
.info-label { font-size: 10px; text-transform: uppercase; letter-spacing: 1px; color: var(--subtle); font-weight: 700; }
.info-val { font-size: 14px; color: var(--muted); font-weight: 500; }
.about-bio { font-size: 15px; color: var(--muted); line-height: 1.85; margin-bottom: 24px; }
.pub-box {
  background: rgba(99, 102, 241, 0.08);
  border: 1px solid rgba(99, 102, 241, 0.2);
  border-radius: var(--radius-sm);
  padding: 18px;
  margin-top: 20px;
  font-size: 14px;
  color: var(--muted);
  line-height: 1.7;
}
.pub-box strong { color: var(--accent); }

/* ── Experience Timeline ───────────────────────────── */
.exp-timeline { display: flex; flex-direction: column; gap: 24px; }
.exp-card {
  padding: 28px;
  border-radius: var(--radius);
  position: relative;
}
.exp-card::before {
  content: '';
  position: absolute;
  left: 0; top: 0; bottom: 0;
  width: 4px;
  background: linear-gradient(180deg, var(--accent), var(--cyan));
  border-radius: 4px 0 0 4px;
}
.exp-header {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  gap: 16px;
  margin-bottom: 12px;
}
.exp-company { font-weight: 800; font-size: 17px; margin-bottom: 2px; }
.exp-role { font-size: 14px; color: var(--accent); font-weight: 700; }
.exp-period {
  font-size: 12px;
  color: var(--muted);
  font-family: monospace;
  background: var(--bg2);
  padding: 4px 12px;
  border-radius: 6px;
  border: 1px solid var(--border);
  display: inline-block;
}
.exp-location { font-size: 12px; color: var(--subtle); margin-top: 4px; text-align: right; }
.exp-desc { font-size: 14px; color: var(--muted); line-height: 1.75; margin-bottom: 16px; }
.exp-tags { display: flex; flex-wrap: wrap; gap: 8px; }
.tag {
  display: inline-block;
  padding: 4px 12px;
  border-radius: 100px;
  font-size: 12px;
  font-weight: 600;
  background: rgba(99, 102, 241, 0.1);
  border: 1px solid rgba(99, 102, 241, 0.2);
  color: var(--accent);
}

/* ── Projects Section ──────────────────────────────── */
#projects { background: var(--bg2); }
.proj-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.proj-card { display: flex; flex-direction: column; height: 100%; }
.proj-thumb {
  height: 180px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 50px;
  position: relative;
  background: linear-gradient(135deg, rgba(99, 102, 241, 0.08), rgba(6, 182, 212, 0.08));
  border-bottom: 1px solid var(--border);
  overflow: hidden;
}
.proj-thumb-img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: top center;
  opacity: 0.65;
  transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.6s ease;
  z-index: 0;
}
.proj-card:hover .proj-thumb-img {
  transform: scale(1.1);
  opacity: 0.9;
}
.proj-thumb-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, rgba(7, 10, 20, 0.25) 0%, rgba(7, 10, 20, 0.75) 100%);
  z-index: 1;
}
.proj-thumb-icon {
  position: relative;
  z-index: 2;
  font-size: 40px;
  filter: drop-shadow(0 4px 14px rgba(0,0,0,0.6));
  transition: transform 0.4s ease;
}
.proj-card:hover .proj-thumb-icon {
  transform: scale(1.15) rotate(5deg);
}
.proj-status {
  position: absolute;
  top: 14px; right: 14px;
  font-size: 11px;
  font-weight: 800;
  padding: 4px 12px;
  border-radius: 100px;
  background: rgba(34, 197, 94, 0.2);
  border: 1px solid rgba(34, 197, 94, 0.4);
  color: var(--green);
  z-index: 3;
}
.proj-status.delivered {
  background: rgba(99, 102, 241, 0.15);
  border-color: rgba(99, 102, 241, 0.35);
  color: var(--accent);
}
.proj-body { padding: 24px; display: flex; flex-direction: column; flex: 1; }
.proj-title { font-size: 19px; font-weight: 800; margin-bottom: 10px; }
.proj-desc { font-size: 14px; color: var(--muted); line-height: 1.7; margin-bottom: 18px; flex: 1; }
.proj-tech { display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 20px; }
.proj-footer { display: flex; align-items: center; justify-content: space-between; margin-top: auto; }

/* ── Skills Section ────────────────────────────────── */
.skills-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; }
.skill-group { padding: 28px; }
.skill-cat {
  font-size: 14px;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 1.5px;
  margin-bottom: 18px;
  display: flex;
  align-items: center;
  gap: 10px;
}
.skill-cat::before {
  content: '';
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: currentColor;
  box-shadow: 0 0 10px currentColor;
}
.skill-chips { display: flex; flex-wrap: wrap; gap: 10px; }
.skill-chip {
  padding: 8px 16px;
  border-radius: 12px;
  font-size: 13px;
  font-weight: 600;
  transition: var(--transition);
  cursor: default;
}
.skill-chip:hover {
  transform: translateY(-3px) scale(1.05);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

/* ── Education & Certifications ────────────────────── */
#edu-certs { background: var(--bg2); }
.edu-certs-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 28px; }
.edu-card { padding: 32px; }
.edu-icon { font-size: 38px; margin-bottom: 16px; }
.edu-degree { font-size: 20px; font-weight: 800; margin-bottom: 6px; }
.edu-inst { font-size: 14px; color: var(--accent); font-weight: 700; margin-bottom: 8px; }
.edu-meta { font-size: 13px; color: var(--muted); }
.cert-list { display: flex; flex-direction: column; gap: 12px; }
.cert-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 14px 18px;
  border-radius: var(--radius-sm);
  background: rgba(99, 102, 241, 0.06);
  border: 1px solid rgba(99, 102, 241, 0.15);
  transition: var(--transition);
}
.cert-item:hover {
  background: rgba(99, 102, 241, 0.12);
  border-color: var(--accent);
  transform: translateX(4px);
}
.cert-name { font-size: 14px; font-weight: 600; }
.cert-year { font-size: 12px; color: var(--accent); font-family: monospace; font-weight: 700; }

/* ── Contact Section ───────────────────────────────── */
.contact-grid { display: grid; grid-template-columns: 1fr 1.2fr; gap: 32px; }
.contact-info { padding: 32px; }
.contact-item { display: flex; align-items: center; gap: 16px; margin-bottom: 24px; }
.c-icon {
  width: 48px;
  height: 48px;
  border-radius: 14px;
  background: rgba(99, 102, 241, 0.12);
  border: 1px solid rgba(99, 102, 241, 0.25);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 22px;
  flex-shrink: 0;
}
.c-label { font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: var(--subtle); font-weight: 700; }
.c-val { font-size: 15px; font-weight: 600; }
.contact-form-card { padding: 36px; }

.form-success, .form-error {
  display: none;
  padding: 14px;
  border-radius: var(--radius-sm);
  font-size: 14px;
  margin-top: 16px;
  text-align: center;
  font-weight: 600;
  animation: fadeIn 0.3s ease;
}
.form-success { background: rgba(34, 197, 94, 0.12); border: 1px solid rgba(34, 197, 94, 0.3); color: var(--green); }
.form-error { background: rgba(220, 38, 38, 0.12); border: 1px solid rgba(220, 38, 38, 0.3); color: var(--red); }

/* ── Footer ────────────────────────────────────────── */
footer { padding: 40px 0; border-top: 1px solid var(--border); background: var(--bg); }
.footer-inner { display: flex; align-items: center; justify-content: space-between; gap: 20px; flex-wrap: wrap; }
.footer-copy { font-size: 13px; color: var(--subtle); margin-top: 4px; }
.footer-links { display: flex; gap: 20px; flex-wrap: wrap; align-items: center; justify-content: flex-start; }
.footer-nav { display: flex; gap: 20px; flex-wrap: wrap; align-items: center; }
.footer-social { display: flex; gap: 10px; flex-wrap: wrap; align-items: center; }
.footer-link { font-size: 13px; color: var(--muted); font-weight: 600; text-decoration: none; }
.footer-link:hover { color: var(--accent); }
.social-btn { display: inline-flex; align-items: center; gap: 8px; padding: 10px 16px; border-radius: 999px; font-size: 13px; font-weight: 700; color: #ffffff; text-decoration: none; transition: transform 0.2s ease, box-shadow 0.2s ease, opacity 0.2s ease; }
.social-btn:hover { transform: translateY(-1px); box-shadow: 0 10px 20px rgba(0,0,0,0.12); opacity: 0.95; }
.social-icon { display: inline-flex; align-items: center; justify-content: center; width: 18px; height: 18px; }
.social-icon svg { width: 18px; height: 18px; }
.social-btn.whatsapp { background: #25d366; border: 1px solid #1ebe5b; }
.social-btn.instagram { background: linear-gradient(135deg, #feda75 0%, #fa7e1e 30%, #d62976 60%, #962fbf 100%); border: 1px solid rgba(0,0,0,0.08); }
.social-btn.facebook { background: #1877f2; border: 1px solid #166fe5; }
.admin-trigger-btn {
  background: rgba(99, 102, 241, 0.1);
  border: 1px solid rgba(99, 102, 241, 0.25);
  color: var(--text);
  padding: 8px 20px;
  border-radius: 100px;
  font-size: 13px;
  font-weight: 600;
}
.admin-trigger-btn:hover {
  background: var(--accent);
  color: #ffffff;
  border-color: var(--accent);
  box-shadow: 0 4px 15px var(--glow);
}

/* ═══════════════════════════════════════════════════
   MODERN ADMIN PANEL STYLING
   ═══════════════════════════════════════════════════ */
#admin-overlay {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0, 0, 0, 0.75);
  backdrop-filter: blur(16px);
  z-index: 9999;
  align-items: center;
  justify-content: center;
}
#admin-overlay.open { display: flex; animation: fadeIn 0.25s ease; }
.admin-modal {
  width: min(920px, 95vw);
  max-height: 90vh;
  border-radius: 28px;
  display: flex;
  flex-direction: column;
  overflow: hidden;
  animation: scaleIn 0.3s cubic-bezier(0.16, 1, 0.3, 1);
  background: var(--bg2);
  border: 1px solid var(--border-glow);
  box-shadow: 0 40px 100px rgba(0,0,0,0.6);
}
.admin-modal-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 24px 30px;
  border-bottom: 1px solid var(--border);
  background: var(--surface);
}
.admin-modal-title { font-size: 18px; font-weight: 800; display: flex; align-items: center; gap: 10px; color: var(--heading); }
.admin-modal-body { flex: 1; overflow-y: auto; padding: 28px; }
.close-btn {
  width: 40px; height: 40px;
  border-radius: 12px;
  background: var(--surface);
  border: 1px solid var(--border);
  color: var(--text);
  font-size: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.close-btn:hover { background: var(--red); color: #fff; border-color: var(--red); }

.admin-login { max-width: 420px; margin: 20px auto; }
.admin-login-title { font-size: 26px; font-weight: 800; text-align: center; margin-bottom: 8px; }
.admin-login-sub { font-size: 14px; color: var(--muted); text-align: center; margin-bottom: 28px; }
.forgot-link { font-size: 13px; color: var(--accent); cursor: pointer; text-align: right; margin-top: -10px; margin-bottom: 20px; display: block; font-weight: 600; }
.forgot-link:hover { text-decoration: underline; }

.admin-msg { padding: 12px 16px; border-radius: var(--radius-sm); font-size: 14px; font-weight: 600; margin-bottom: 16px; display: none; }
.admin-msg.error { background: rgba(220, 38, 38, 0.15); border: 1px solid rgba(220, 38, 38, 0.3); color: var(--red); }
.admin-msg.success { background: rgba(34, 197, 94, 0.15); border: 1px solid rgba(34, 197, 94, 0.3); color: var(--green); }

.admin-dashboard { display: none; }
.admin-tabs {
  display: flex;
  gap: 8px;
  background: var(--surface);
  border-radius: 16px;
  padding: 6px;
  margin-bottom: 24px;
  border: 1px solid var(--border);
  flex-wrap: wrap;
}
.admin-tab {
  padding: 10px 20px;
  border-radius: 12px;
  font-size: 13px;
  font-weight: 700;
  color: var(--muted);
  background: transparent;
  border: none;
  cursor: pointer;
  transition: var(--transition);
}
.admin-tab:hover { color: var(--accent); }
.admin-tab.active {
  background: var(--accent);
  color: #ffffff;
  box-shadow: 0 4px 15px var(--glow);
}
.tab-panel { display: none; }
.tab-panel.active { display: block; animation: fadeIn 0.25s ease; }

.admin-list { display: flex; flex-direction: column; gap: 14px; }
.admin-list-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  padding: 18px 22px;
  border-radius: var(--radius-sm);
  background: var(--surface);
  border: 1px solid var(--border);
  transition: var(--transition);
}
.admin-list-row:hover { border-color: var(--accent); transform: translateX(4px); }
.alr-title { font-size: 14px; font-weight: 700; }
.alr-sub { font-size: 12px; color: var(--muted); margin-top: 2px; }
.alr-actions { display: flex; gap: 10px; flex-shrink: 0; }

.admin-form-box {
  background: var(--surface);
  border: 1px solid var(--border-glow);
  border-radius: var(--radius);
  padding: 24px;
  margin-bottom: 20px;
  display: none;
}
.admin-form-box.open { display: block; animation: fadeInUp 0.25s ease; }
.admin-form-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px; }
.admin-form-title { font-size: 16px; font-weight: 800; }

.leads-list { display: flex; flex-direction: column; gap: 14px; }
.lead-item {
  padding: 20px;
  border-radius: var(--radius-sm);
  background: var(--surface);
  border: 1px solid var(--border);
}
.lead-name { font-size: 15px; font-weight: 700; }
.lead-email { font-size: 13px; color: var(--accent); margin-bottom: 8px; font-weight: 600; }
.lead-msg { font-size: 13px; color: var(--muted); line-height: 1.6; }
.lead-date { font-size: 11px; color: var(--subtle); margin-top: 8px; font-family: monospace; }
.section-action-row { display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px; }
.empty-state { text-align: center; padding: 40px; color: var(--subtle); font-size: 14px; }

/* Responsive Breakpoints & Fluid Scaling (Mobile, Tablet, Laptop, LED/4K) */
@media (min-width: 1440px) {
  .container { max-width: 1280px; }
  .proj-thumb { height: 210px; }
}
@media (max-width: 1024px) {
  .container { max-width: 100%; padding: 0 24px; }
  .hero-grid { grid-template-columns: 1fr; gap: 40px; }
  .hero-visual { display: flex; flex-direction: row; gap: 16px; }
  .hero-card { flex: 1; }
  .proj-grid { grid-template-columns: 1fr 1fr; }
  .about-grid, .contact-grid, .edu-certs-grid { grid-template-columns: 1fr; }
}
@media (max-width: 768px) {
  .section { padding: 70px 0; }
  .nav-links { display: none; }
  .mobile-toggle { display: flex; }
  .hero-visual { flex-direction: column; }
  .proj-grid { grid-template-columns: 1fr; }
  .skills-grid { grid-template-columns: 1fr; }
  .grid-2, .grid-3 { grid-template-columns: 1fr; }
  .hero-stats { grid-template-columns: 1fr 1fr; gap: 12px; }
  .proj-thumb { height: clamp(180px, 30vw, 220px); }
}
@media (max-width: 480px) {
  .container { padding: 0 18px; }
  .hero-name { font-size: clamp(34px, 10vw, 44px); }
  .hero-btns { flex-direction: column; }
  .hero-btns .btn { width: 100%; }
  .hero-stats { grid-template-columns: 1fr; }
  .admin-modal { width: 95vw; max-height: 94vh; border-radius: 20px; }
}
</style>
</head>
<body>

<!-- ── Scroll Progress Line ───────────────────────────── -->
<div id="scroll-progress"></div>

<!-- ── Scroll To Top Button ────────────────────────────── -->
<button id="scroll-to-top" title="Back to top">↑</button>

<!-- ═══════════════════════════════════════════════════
     NAVBAR
     ═══════════════════════════════════════════════════ -->
<nav id="navbar" class="glass-header">
  <div class="container nav-inner">
    <a href="#hero" class="nav-logo">
      H<span>A</span>
    </a>
    <div class="nav-links">
      <a href="#about"      class="nav-link">About</a>
      <a href="#experience" class="nav-link">Experience</a>
      <a href="#projects"   class="nav-link">Projects</a>
      <a href="#skills"     class="nav-link">Skills</a>
      <a href="#contact"    class="nav-link">Contact</a>
    </div>
    <div class="nav-actions">
      <button class="theme-btn" id="theme-btn" title="Toggle theme">🌙</button>
      <a href="#contact" class="btn btn-primary btn-sm">Hire Me</a>
      <button class="mobile-toggle" id="mobile-toggle" aria-label="Menu">☰</button>
    </div>
  </div>
</nav>

<div class="mobile-menu" id="mobile-menu">
  <a href="#about"      class="mobile-link">About</a>
  <a href="#experience" class="mobile-link">Experience</a>
  <a href="#projects"   class="mobile-link">Projects</a>
  <a href="#skills"     class="mobile-link">Skills</a>
  <a href="#contact"    class="mobile-link">Contact</a>
</div>

<!-- ═══════════════════════════════════════════════════
     HERO SECTION WITH INTERACTIVE CANVAS
     ═══════════════════════════════════════════════════ -->
<section id="hero">
  <canvas id="hero-canvas"></canvas>
  <div class="hero-bg-glow"></div>
  <div class="container">
    <div class="hero-grid">
      <div>
        <div class="hero-badge">
          <span class="badge-dot"></span>
          Available for High-Impact Roles
        </div>
        <h1 class="hero-name" id="hero-name">
          <?= htmlspecialchars($p['name']) ?><br>
          <span class="accent-text"><?= htmlspecialchars(explode(' ', $p['title'])[0]) ?></span>
        </h1>
        <div class="hero-title" id="hero-title">
          <span>Specialist in</span>
          <span id="typing-text">SDO/SDR & Front-End</span>
        </div>
        <div class="hero-tagline" id="hero-tagline"><?= htmlspecialchars($p['tagline']) ?></div>
        <div class="hero-btns">
          <a href="#projects" class="btn btn-primary">Explore My Work →</a>
          <a href="#contact" class="btn btn-outline">Get In Touch</a>
          <a href="/resume.pdf" class="btn btn-ghost" download>Resume 📄</a>
        </div>
        <div class="hero-stats">
          <?php foreach ($p['stats'] as $s): ?>
          <div class="hero-stat glass-card">
            <span class="stat-val"><?= htmlspecialchars($s['value']) ?></span>
            <span class="stat-lbl"><?= htmlspecialchars($s['label']) ?></span>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="hero-visual">
        <div class="glass-card hero-card">
          <div class="hc-icon">🎯</div>
          <div class="hc-title">Sales Development & SDR</div>
          <div class="hc-sub">Lead Qualification · Cold Calling · BANT Framework · CRM Pipelines (HubSpot, Apollo, GHL)</div>
        </div>
        <div class="glass-card hero-card">
          <div class="hc-icon">📈</div>
          <div class="hc-title">Amazon PPC & E-Commerce</div>
          <div class="hc-sub">SP/SB/SD Campaigns · ACoS Optimization · Meta Ads · TikTok Shop Management</div>
        </div>
        <div class="glass-card hero-card">
          <div class="hc-icon">💻</div>
          <div class="hc-title">Front-End Software Dev</div>
          <div class="hc-sub">Flutter & Dart · HTML5/CSS3 · Modern JavaScript · Responsive Web Architecture</div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="divider"></div>

<!-- ═══════════════════════════════════════════════════
     ABOUT SECTION
     ═══════════════════════════════════════════════════ -->
<section id="about" class="section">
  <div class="container">
    <div class="about-grid">
      <div class="reveal">
        <div class="glass-card" style="padding:32px;text-align:center">
          <div class="about-avatar-wrap">
            <div class="about-avatar" style="background-image: url('<?= htmlspecialchars($avatarDataUri ?: '/person.png', ENT_QUOTES) ?>'), radial-gradient(circle at 30% 20%, rgba(99,102,241,0.9), rgba(34,211,238,0.85));">
              <span class="avatar-initials">HA</span>
            </div>
          </div>
          <div class="about-name" id="about-name"><?= htmlspecialchars($p['name']) ?></div>
          <div class="about-role"><?= htmlspecialchars($p['subtitle']) ?></div>
          <div class="avail-badge"><span class="badge-dot"></span>Open to Work & Remote Roles</div>
          <div style="margin-top:20px">
            <div class="info-item"><span class="info-icon">📍</span><div><div class="info-label">Location</div><div class="info-val"><?= htmlspecialchars($p['location']) ?></div></div></div>
            <div class="info-item"><span class="info-icon">✉️</span><div><div class="info-label">Email</div><div class="info-val"><a href="mailto:<?= htmlspecialchars($p['email']) ?>"><?= htmlspecialchars($p['email']) ?></a></div></div></div>
            <div class="info-item"><span class="info-icon">📱</span><div><div class="info-label">Phone / WhatsApp</div><div class="info-val"><?= htmlspecialchars($p['phone']) ?></div></div></div>
            <div class="info-item"><span class="info-icon">🔗</span><div><div class="info-label">LinkedIn</div><div class="info-val"><a href="<?= htmlspecialchars($p['linkedin']) ?>" target="_blank">LinkedIn Profile ↗</a></div></div></div>
            <?php if (!empty($edu)): ?>
            <div class="info-item"><span class="info-icon">🎓</span><div><div class="info-label">Education</div><div class="info-val"><?= htmlspecialchars($edu[0]['degree']) ?>, <?= htmlspecialchars($edu[0]['institution']) ?></div></div></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="reveal">
        <p class="section-label">// About Me</p>
        <h2 class="section-title">Driven by strategy, data & flawless execution.</h2>
        <div class="about-bio" id="about-bio"><?= nl2br(htmlspecialchars($p['bio'])) ?></div>
        <?php if ($pub): ?>
        <div class="pub-box">
          <strong>📄 Research Publication:</strong><br><?= htmlspecialchars($pub) ?>
        </div>
        <?php endif; ?>
        <div style="display:flex;gap:14px;flex-wrap:wrap;margin-top:28px">
          <a href="<?= htmlspecialchars($p['linkedin']) ?>" target="_blank" class="btn btn-primary btn-sm">Connect on LinkedIn ↗</a>
          <a href="mailto:<?= htmlspecialchars($p['email']) ?>" class="btn btn-outline btn-sm">Send Direct Email</a>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="divider"></div>

<!-- ═══════════════════════════════════════════════════
     EXPERIENCE SECTION
     ═══════════════════════════════════════════════════ -->
<section id="experience" class="section">
  <div class="container">
    <div class="reveal">
      <p class="section-label">// Career Journey</p>
      <h2 class="section-title">Where I've delivered exceptional results.</h2>
      <p class="section-sub">Proven track record across Sales Development, Amazon PPC, Digital Marketing, and Software Engineering.</p>
    </div>
    <div class="exp-timeline" id="exp-list">
      <?php foreach ($exp as $i => $e): ?>
      <div class="glass-card exp-card reveal" data-id="<?= htmlspecialchars($e['id']) ?>">
        <div class="exp-header">
          <div>
            <div class="exp-company"><?= htmlspecialchars($e['company']) ?></div>
            <div class="exp-role"><?= htmlspecialchars($e['role']) ?></div>
          </div>
          <div>
            <div class="exp-period"><?= htmlspecialchars($e['period']) ?></div>
            <div class="exp-location"><?= htmlspecialchars($e['location']) ?></div>
          </div>
        </div>
        <div class="exp-desc"><?= htmlspecialchars($e['description']) ?></div>
        <div class="exp-tags">
          <?php foreach ((array)($e['tags']??[]) as $t): ?>
          <span class="tag"><?= htmlspecialchars($t) ?></span>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div class="divider"></div>

<!-- ═══════════════════════════════════════════════════
     PROJECTS SECTION
     ═══════════════════════════════════════════════════ -->
<section id="projects" class="section">
  <div class="container">
    <div class="reveal">
      <p class="section-label">// Portfolio Highlights</p>
      <h2 class="section-title">Featured platforms & digital builds.</h2>
      <p class="section-sub">A showcase of commercial products, e-commerce stores, and high-conversion web platforms.</p>
    </div>
    <div class="proj-grid" id="proj-list">
      <?php foreach ($prj as $i => $pj):
        $img = $pj['image'] ?? '';
        if (!$img && strtolower($pj['title']) === 'deenhub') $img = '/deenhub.png';
        if (!$img && (strtolower($pj['title']) === 'aqualift store' || strtolower($pj['title']) === 'aqualift')) $img = '/Aqualift.png';
        if (!$img && (strtolower(explode(' ', $pj['title'])[0]) === 'sulaiman')) $img = '/Sulaiman.png';
      ?>
      <div class="glass-card proj-card reveal">
        <div class="proj-thumb">
          <div class="proj-thumb-bg"><?= $pj['emoji'] ?></div>
          <div class="proj-thumb-overlay"></div>
          <span class="proj-thumb-icon"><?= $pj['emoji'] ?></span>
          <span class="proj-status <?= strtolower($pj['status'])==='delivered'?'delivered':'' ?>"><?= htmlspecialchars($pj['status']) ?></span>
        </div>
        <div class="proj-body">
          <div class="proj-title"><?= htmlspecialchars($pj['title']) ?></div>
          <div class="proj-desc"><?= htmlspecialchars($pj['description']) ?></div>
          <div class="proj-tech">
            <?php foreach ((array)($pj['tags']??[]) as $t): ?>
            <span class="tag"><?= htmlspecialchars($t) ?></span>
            <?php endforeach; ?>
          </div>
          <div class="proj-footer">
            <?php if (!empty($pj['url']) && $pj['url'] !== '#'): ?>
            <a href="<?= htmlspecialchars($pj['url']) ?>" target="_blank" class="btn btn-primary btn-sm">Visit Platform ↗</a>
            <?php else: ?>
            <span class="btn btn-ghost btn-sm" style="cursor:default">Delivered Client Site</span>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div class="divider"></div>

<!-- ═══════════════════════════════════════════════════
     SKILLS SECTION
     ═══════════════════════════════════════════════════ -->
<section id="skills" class="section">
  <div class="container">
    <div class="reveal">
      <p class="section-label">// Skills Matrix</p>
      <h2 class="section-title">Comprehensive domain expertise.</h2>
      <p class="section-sub">Combining technical proficiency with sales outreach and growth marketing mastery.</p>
    </div>
    <div class="skills-grid" id="skills-list">
      <?php foreach ($sk as $i => $sg):
        $c = $sg['color']??'#6366F1';
        [$r,$g,$b] = sscanf($c, '#%02x%02x%02x');
      ?>
      <div class="glass-card skill-group reveal">
        <div class="skill-cat" style="color:<?= $c ?>"><?= htmlspecialchars($sg['category']) ?></div>
        <div class="skill-chips">
          <?php foreach ((array)($sg['items']??[]) as $item): ?>
          <span class="skill-chip" style="background:rgba(<?=$r?>,<?=$g?>,<?=$b?>,.12);border:1px solid rgba(<?=$r?>,<?=$g?>,<?=$b?>,.25);color:<?=$c?>"><?= htmlspecialchars($item) ?></span>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div class="divider"></div>

<!-- ═══════════════════════════════════════════════════
     EDUCATION & CERTIFICATIONS
     ═══════════════════════════════════════════════════ -->
<section id="edu-certs" class="section">
  <div class="container">
    <div class="reveal">
      <p class="section-label">// Qualifications</p>
      <h2 class="section-title">Education & Certifications.</h2>
    </div>
    <div class="edu-certs-grid">
      <div class="glass-card edu-card reveal">
        <div class="edu-icon">🎓</div>
        <?php foreach ($edu as $e): ?>
        <div class="edu-degree"><?= htmlspecialchars($e['degree']) ?></div>
        <div class="edu-inst"><?= htmlspecialchars($e['institution']) ?></div>
        <div class="edu-meta"><?= htmlspecialchars($e['period']) ?> · <?= htmlspecialchars($e['grade']) ?></div>
        <?php if (!empty($e['note'])): ?>
        <div class="edu-meta" style="margin-top:6px;color:var(--accent);font-weight:600"><?= htmlspecialchars($e['note']) ?></div>
        <?php endif; ?>
        <?php endforeach; ?>
      </div>
      <div class="glass-card edu-card reveal">
        <div class="edu-icon">🏆</div>
        <div style="font-size:18px;font-weight:800;margin-bottom:18px">Verified Certifications</div>
        <div class="cert-list">
          <?php foreach ($cer as $c): ?>
          <div class="cert-item">
            <div class="cert-name">✓ <?= htmlspecialchars($c['name']) ?></div>
            <div class="cert-year"><?= htmlspecialchars($c['year']) ?></div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="divider"></div>

<!-- ═══════════════════════════════════════════════════
     CONTACT SECTION
     ═══════════════════════════════════════════════════ -->
<section id="contact" class="section">
  <div class="container">
    <div class="reveal">
      <p class="section-label">// Get In Touch</p>
      <h2 class="section-title">Let's build something extraordinary.</h2>
      <p class="section-sub">Whether you need a high-performing SDR, Amazon PPC management, or front-end development — I'm ready to connect.</p>
    </div>
    <div class="contact-grid">
      <div class="glass-card contact-info reveal">
        <div class="contact-item"><div class="c-icon">✉️</div><div><div class="c-label">Email</div><div class="c-val"><a href="mailto:<?= htmlspecialchars($p['email']) ?>"><?= htmlspecialchars($p['email']) ?></a></div></div></div>
        <div class="contact-item"><div class="c-icon">📱</div><div><div class="c-label">Phone / WhatsApp</div><div class="c-val"><a href="tel:<?= htmlspecialchars($p['phone']) ?>"><?= htmlspecialchars($p['phone']) ?></a></div></div></div>
        <div class="contact-item"><div class="c-icon">🔗</div><div><div class="c-label">LinkedIn</div><div class="c-val"><a href="<?= htmlspecialchars($p['linkedin']) ?>" target="_blank">LinkedIn Connect ↗</a></div></div></div>
        <div class="contact-item"><div class="c-icon">📍</div><div><div class="c-label">Location</div><div class="c-val"><?= htmlspecialchars($p['location']) ?></div></div></div>
        <div style="margin-top:24px;padding:18px;border-radius:var(--radius-sm);background:rgba(99,102,241,.08);border:1px solid rgba(99,102,241,.2)">
          <div class="avail-badge"><span class="badge-dot"></span>Open to Full-Time & Freelance</div>
          <div style="font-size:13px;color:var(--muted);margin-top:10px;line-height:1.6">Fast response guaranteed within 24 hours. Open for SDR US/UK campaigns, Amazon PPC, and front-end builds.</div>
        </div>
      </div>
      <div class="glass-card contact-form-card reveal">
        <h3 style="font-size:20px;font-weight:800;margin-bottom:24px">Send a Direct Message</h3>
        <form id="contact-form" onsubmit="submitContact(event)">
          <div class="form-group"><label class="form-label">Your Name</label><input type="text" class="form-input" id="cf-name" name="n" placeholder="John Smith" required></div>
          <div class="form-group"><label class="form-label">Email Address</label><input type="email" class="form-input" id="cf-email" name="e" placeholder="john@company.com" required></div>
          <div class="form-group"><label class="form-label">Subject</label>
            <select class="form-input" id="cf-subject" name="s">
              <option>SDR / Sales Lead Generation</option>
              <option>Amazon PPC Campaign Management</option>
              <option>Front-End Software Development</option>
              <option>Social Media Marketing & Ads</option>
              <option>Other Collaboration</option>
            </select>
          </div>
          <div class="form-group"><label class="form-label">Message</label><textarea class="form-input" id="cf-msg" name="m" rows="4" placeholder="Tell me about your business goals..." required></textarea></div>
          <button type="submit" class="btn btn-primary btn-full" id="cf-btn">Send Message →</button>
          <div class="form-success" id="cf-success"></div>
          <div class="form-error" id="cf-error"></div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════
     FOOTER
     ═══════════════════════════════════════════════════ -->
<footer>
  <div class="container footer-inner">
    <div>
      <div style="font-weight:900;font-size:18px;color:var(--heading)"><?= htmlspecialchars($p['name']) ?></div>
      <div class="footer-copy">© <?= date('Y') ?> <?= htmlspecialchars($p['name']) ?> · Built with PHP, HTML, CSS & JS.</div>
    </div>
    <div class="footer-links">
      <div class="footer-nav">
        <a href="#about"      class="footer-link">About</a>
        <a href="#projects"   class="footer-link">Projects</a>
        <a href="#contact"    class="footer-link">Contact</a>
        <a href="<?= htmlspecialchars($p['linkedin']) ?>" target="_blank" class="footer-link">LinkedIn</a>
      </div>
      <div class="footer-social">
        <a href="https://wa.me/923030503776" target="_blank" rel="noopener noreferrer" class="social-btn whatsapp">
          <span class="social-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16v12H8l-4 4V4z" />
              <path d="M8.5 11.5c.75 1.5 2.2 2.55 3.8 2.55 1.05 0 1.45-.4 1.45-1.05 0-.4-.05-.7-.15-1.05-.1-.35-.45-1.05-1.1-1.2-.6-.1-1.05.35-1.2.5-.15.15-.45.45-.7.3-.25-.15-.9-.35-1.35-.9-.5-.6-.45-1-.4-1.1.05-.1.25-.15.45-.25.15-.05.35-.05.45-.05.15 0 .3 0 .45.05.15.05.35.05.5.05.15 0 .35-.05.5-.05.2 0 .5-.05.75.15.25.2.85.8.85 1.95 0 1.15-.9 2.6-2.05 2.6-.9 0-1.5-.5-1.8-.9-.25-.35-.35-1.05-.2-1.4.15-.35.35-.5.6-.5.25 0 .5.05.75.2.2.15.45.35.7.35.25 0 .4-.1.5-.2.1-.1.2-.25.25-.35.1-.15.05-.3-.05-.4-.15-.15-.45-.3-.7-.25-.25.05-.5.2-.7.35-.3.25-.65.4-1 .35-.35-.05-.6-.25-.8-.5-.2-.25-.25-.55-.2-.85.05-.25.1-.4.2-.55.55-1.15 2-1.7 3.4-1.55 1.4.15 2.6 1 3.05 2.25.45 1.2.15 2.5-.75 3.35-.9.85-2.2 1.25-3.4 1.05-1.25-.2-2.5-.95-3.1-2.1" />
            </svg>
          </span>
          <span>WhatsApp</span>
        </a>
        <a href="https://www.instagram.com/hamadkhan123456789?igsh=MXc5dTA1eTJjaGQ0dw==" target="_blank" rel="noopener noreferrer" class="social-btn instagram">
          <span class="social-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <rect x="4" y="4" width="16" height="16" rx="5" />
              <circle cx="12" cy="12" r="3.5" />
              <path d="M17.5 6.5h.01" />
            </svg>
          </span>
          <span>Instagram</span>
        </a>
        <a href="https://www.facebook.com/share/1HFEYrn7Cc/" target="_blank" rel="noopener noreferrer" class="social-btn facebook">
          <span class="social-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M15 5h2.5a2 2 0 0 1 2 2v2.5" />
              <path d="M17 7h-3v3h3" />
              <path d="M8 9h3v10H8z" />
              <path d="M11 9.5V5h3" />
            </svg>
          </span>
          <span>Facebook</span>
        </a>
      </div>
    </div>
    <button class="admin-trigger-btn" onclick="openAdmin()">⚙ Admin Panel</button>
  </div>
</footer>

<!-- ═══════════════════════════════════════════════════
     ADMIN MODAL PANEL
     ═══════════════════════════════════════════════════ -->
<div id="admin-overlay" onclick="overlayClick(event)">
  <div class="admin-modal glass-modal">
    <div class="admin-modal-header">
      <div class="admin-modal-title">⚙️ Portfolio Admin Console</div>
      <button class="close-btn" onclick="closeAdmin()">✕</button>
    </div>
    <div class="admin-modal-body">

      <!-- Login View -->
      <div id="admin-login" class="admin-login">
        <div class="admin-login-title">🔐 Administrator Sign In</div>
        <div class="admin-login-sub">Manage your portfolio data and inbound lead messages</div>
        <div class="admin-msg" id="login-msg"></div>
        <div class="form-group"><label class="form-label">Username</label><input type="text" class="form-input" id="adm-user" placeholder="admin" autocomplete="username"></div>
        <div class="form-group"><label class="form-label">Password</label><input type="password" class="form-input" id="adm-pass" placeholder="••••••••" autocomplete="current-password" onkeydown="if(event.key==='Enter')doLogin()"></div>
        <span class="forgot-link" onclick="showReset()">Forgot password? Reset using recovery key</span>
        <button class="btn btn-primary btn-full" onclick="doLogin()" id="login-btn">Sign In to Dashboard →</button>
      </div>

      <!-- Reset View -->
      <div id="admin-reset" style="display:none;max-width:400px;margin:0 auto">
        <div class="admin-login-title">🔑 Reset Admin Credentials</div>
        <div class="admin-login-sub">Enter master recovery key to recover access</div>
        <div class="admin-msg" id="reset-msg"></div>
        <div class="form-group"><label class="form-label">Recovery Key</label><input type="text" class="form-input" id="rst-key" placeholder="HAMMAD-RESET-2024"></div>
        <div class="form-group"><label class="form-label">New Username (optional)</label><input type="text" class="form-input" id="rst-user" placeholder="Leave blank to keep current"></div>
        <div class="form-group"><label class="form-label">New Password</label><input type="password" class="form-input" id="rst-pass" placeholder="Min 6 characters"></div>
        <div style="display:flex;gap:12px;margin-top:10px">
          <button class="btn btn-ghost btn-sm" onclick="showLogin()">← Back</button>
          <button class="btn btn-primary" style="flex:1" onclick="doReset()">Save New Credentials</button>
        </div>
      </div>

      <!-- Dashboard View -->
      <div id="admin-dashboard" class="admin-dashboard">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px">
          <div style="font-size:16px;font-weight:800">Logged in as <?= htmlspecialchars($adm['username']) ?> 👋</div>
          <button class="btn btn-danger btn-sm" onclick="doLogout()">Sign Out</button>
        </div>
        <div class="admin-tabs">
          <button class="admin-tab active" onclick="showTab('personal', event)">👤 Personal</button>
          <button class="admin-tab" onclick="showTab('projects', event)">📁 Projects</button>
          <button class="admin-tab" onclick="showTab('experience', event)">💼 Experience</button>
          <button class="admin-tab" onclick="showTab('skills', event)">⚡ Skills</button>
          <button class="admin-tab" onclick="showTab('security', event)">🔒 Security</button>
          <button class="admin-tab" onclick="showTab('leads', event)">📬 Leads</button>
        </div>

        <!-- Personal Tab -->
        <div id="tab-personal" class="tab-panel active">
          <div class="form-group"><label class="form-label">Full Name</label><input type="text" class="form-input" id="p-name" value="<?= htmlspecialchars($p['name']) ?>"></div>
          <div class="form-group"><label class="form-label">Title / Role</label><input type="text" class="form-input" id="p-title" value="<?= htmlspecialchars($p['title']) ?>"></div>
          <div class="form-group"><label class="form-label">Subtitle</label><input type="text" class="form-input" id="p-subtitle" value="<?= htmlspecialchars($p['subtitle']) ?>"></div>
          <div class="form-group"><label class="form-label">Hero Tagline</label><input type="text" class="form-input" id="p-tagline" value="<?= htmlspecialchars($p['tagline']) ?>"></div>
          <div class="grid-2">
            <div class="form-group"><label class="form-label">Email</label><input type="email" class="form-input" id="p-email" value="<?= htmlspecialchars($p['email']) ?>"></div>
            <div class="form-group"><label class="form-label">Phone</label><input type="text" class="form-input" id="p-phone" value="<?= htmlspecialchars($p['phone']) ?>"></div>
          </div>
          <div class="grid-2">
            <div class="form-group"><label class="form-label">Location</label><input type="text" class="form-input" id="p-location" value="<?= htmlspecialchars($p['location']) ?>"></div>
            <div class="form-group"><label class="form-label">LinkedIn URL</label><input type="url" class="form-input" id="p-linkedin" value="<?= htmlspecialchars($p['linkedin']) ?>"></div>
          </div>
          <div class="form-group"><label class="form-label">Bio Description</label><textarea class="form-input" id="p-bio" rows="5"><?= htmlspecialchars($p['bio']) ?></textarea></div>
          <div class="admin-msg" id="personal-msg"></div>
          <button class="btn btn-primary" onclick="savePersonal()">💾 Save Personal Details</button>
        </div>

        <!-- Projects Tab -->
        <div id="tab-projects" class="tab-panel">
          <div class="section-action-row">
            <div style="font-size:16px;font-weight:800">Managed Projects (<?= count($prj) ?>)</div>
            <button class="btn btn-primary btn-sm" onclick="openProjForm()">+ Add Project</button>
          </div>
          <div id="proj-form-box" class="admin-form-box">
            <div class="admin-form-header">
              <div class="admin-form-title" id="proj-form-title">New Project</div>
              <button class="btn btn-ghost btn-sm" onclick="closeProjForm()">✕</button>
            </div>
            <input type="hidden" id="pf-id">
            <div class="grid-2">
              <div class="form-group"><label class="form-label">Title</label><input type="text" class="form-input" id="pf-title" placeholder="Project Name"></div>
              <div class="form-group"><label class="form-label">Emoji Icon</label><input type="text" class="form-input" id="pf-emoji" placeholder="💼"></div>
            </div>
            <div class="form-group"><label class="form-label">Description</label><textarea class="form-input" id="pf-desc" rows="3" placeholder="Description..."></textarea></div>
            <div class="grid-2">
              <div class="form-group"><label class="form-label">URL</label><input type="text" class="form-input" id="pf-url" placeholder="https://..."></div>
              <div class="form-group"><label class="form-label">Status</label><select class="form-input" id="pf-status"><option>Live</option><option>Delivered</option><option>In Progress</option></select></div>
            </div>
            <div class="form-group"><label class="form-label">Tags (comma-separated)</label><input type="text" class="form-input" id="pf-tags" placeholder="HTML, CSS, JS"></div>
            <div class="admin-msg" id="proj-msg"></div>
            <button class="btn btn-primary" onclick="saveProject()">💾 Save Project</button>
          </div>
          <div class="admin-list" id="admin-proj-list">
            <?php foreach ($prj as $pj): ?>
            <div class="admin-list-row" id="apr-<?= htmlspecialchars($pj['id']) ?>">
              <div class="alr-info">
                <div class="alr-title"><?= $pj['emoji'] ?> <?= htmlspecialchars($pj['title']) ?></div>
                <div class="alr-sub"><?= htmlspecialchars($pj['status']) ?> · <?= htmlspecialchars(implode(', ', array_slice((array)($pj['tags']??[]),0,3))) ?></div>
              </div>
              <div class="alr-actions">
                <button class="btn btn-ghost btn-sm" onclick='editProject(<?= json_encode($pj) ?>)'>✏️ Edit</button>
                <button class="btn btn-danger btn-sm" onclick="delProject('<?= htmlspecialchars($pj['id']) ?>')">🗑️ Delete</button>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Experience Tab -->
        <div id="tab-experience" class="tab-panel">
          <div class="section-action-row">
            <div style="font-size:16px;font-weight:800">Experience Entries (<?= count($exp) ?>)</div>
            <button class="btn btn-primary btn-sm" onclick="openExpForm()">+ Add Entry</button>
          </div>
          <div id="exp-form-box" class="admin-form-box">
            <div class="admin-form-header">
              <div class="admin-form-title" id="exp-form-title">New Experience</div>
              <button class="btn btn-ghost btn-sm" onclick="closeExpForm()">✕</button>
            </div>
            <input type="hidden" id="ef-id">
            <div class="grid-2">
              <div class="form-group"><label class="form-label">Company</label><input type="text" class="form-input" id="ef-company" placeholder="Company"></div>
              <div class="form-group"><label class="form-label">Role</label><input type="text" class="form-input" id="ef-role" placeholder="Role"></div>
            </div>
            <div class="grid-2">
              <div class="form-group"><label class="form-label">Period</label><input type="text" class="form-input" id="ef-period" placeholder="Jan 2024 – Present"></div>
              <div class="form-group"><label class="form-label">Location</label><input type="text" class="form-input" id="ef-location" placeholder="Location"></div>
            </div>
            <div class="form-group"><label class="form-label">Description</label><textarea class="form-input" id="ef-desc" rows="3"></textarea></div>
            <div class="form-group"><label class="form-label">Tags (comma-separated)</label><input type="text" class="form-input" id="ef-tags" placeholder="Skill 1, Skill 2"></div>
            <div class="admin-msg" id="exp-msg"></div>
            <button class="btn btn-primary" onclick="saveExp()">💾 Save Entry</button>
          </div>
          <div class="admin-list" id="admin-exp-list">
            <?php foreach ($exp as $e): ?>
            <div class="admin-list-row" id="aer-<?= htmlspecialchars($e['id']) ?>">
              <div class="alr-info">
                <div class="alr-title"><?= htmlspecialchars($e['company']) ?></div>
                <div class="alr-sub"><?= htmlspecialchars($e['role']) ?> · <?= htmlspecialchars($e['period']) ?></div>
              </div>
              <div class="alr-actions">
                <button class="btn btn-ghost btn-sm" onclick='editExp(<?= json_encode($e) ?>)'>✏️ Edit</button>
                <button class="btn btn-danger btn-sm" onclick="delExp('<?= htmlspecialchars($e['id']) ?>')">🗑️ Delete</button>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Skills Tab -->
        <div id="tab-skills" class="tab-panel">
          <div class="section-action-row">
            <div style="font-size:16px;font-weight:800">Skill Groups Editor</div>
            <button class="btn btn-primary btn-sm" onclick="addSkillGroup()">+ Add Category</button>
          </div>
          <div id="skills-editor"></div>
          <div class="admin-msg" id="skills-msg"></div>
          <button class="btn btn-primary" style="margin-top:16px" onclick="saveSkills()">💾 Save All Skill Groups</button>
        </div>

        <!-- Security Tab -->
        <div id="tab-security" class="tab-panel">
          <div style="max-width:440px">
            <h3 style="font-size:16px;font-weight:800;margin-bottom:20px">🔒 Update Security Credentials</h3>
            <div class="admin-msg" id="sec-msg"></div>
            <div class="form-group"><label class="form-label">Current Password</label><input type="password" class="form-input" id="sec-cp" placeholder="Current password"></div>
            <div class="form-group"><label class="form-label">New Username (optional)</label><input type="text" class="form-input" id="sec-nu" placeholder="Leave blank to keep current"></div>
            <div class="form-group"><label class="form-label">New Password (optional)</label><input type="password" class="form-input" id="sec-np" placeholder="Min 6 characters"></div>
            <div class="form-group"><label class="form-label">New Master Recovery Key (optional)</label><input type="text" class="form-input" id="sec-nk" placeholder="Custom secret key"></div>
            <button class="btn btn-primary" onclick="changeCredentials()">Update Security Credentials</button>
          </div>
        </div>

        <!-- Leads Tab -->
        <div id="tab-leads" class="tab-panel">
          <div class="section-action-row">
            <div style="font-size:16px;font-weight:800">Inbound Contact Submissions</div>
            <button class="btn btn-ghost btn-sm" onclick="loadLeads()">↻ Refresh Leads</button>
          </div>
          <div class="leads-list" id="leads-list"><div class="empty-state">Click Refresh to fetch contact leads.</div></div>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════
     WORLD-CLASS JAVASCRIPT & ANIMATION SYSTEM
     ═══════════════════════════════════════════════════ -->
<script>
/* ── State ───────────────────────────────────────────── */
let isLoggedIn = <?= $logged ? 'true' : 'false' ?>;
let portfolioData = <?= json_encode($pf, JSON_UNESCAPED_UNICODE) ?>;
let skillsData = <?= json_encode($sk, JSON_UNESCAPED_UNICODE) ?>;

/* ── Theme Switcher ──────────────────────────────────── */
const html       = document.documentElement;
const themeBtn   = document.getElementById('theme-btn');
const savedTheme = localStorage.getItem('theme') || 'dark';
html.setAttribute('data-theme', savedTheme);
if (themeBtn) {
  themeBtn.textContent = savedTheme === 'dark' ? '☀️' : '🌙';
}

function toggleTheme() {
  const t = html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
  html.setAttribute('data-theme', t);
  localStorage.setItem('theme', t);
  if (themeBtn) {
    themeBtn.textContent = t === 'dark' ? '☀️' : '🌙';
    themeBtn.style.transform = 'rotate(360deg)';
    setTimeout(() => themeBtn.style.transform = '', 400);
  }
}
if (themeBtn) themeBtn.addEventListener('click', toggleTheme);

/* ── Scroll Progress Line & Back to Top ──────────────── */
const progressBar = document.getElementById('scroll-progress');
const scrollTopBtn = document.getElementById('scroll-to-top');

window.addEventListener('scroll', () => {
  const totalHeight = document.body.scrollHeight - window.innerHeight;
  const progress = totalHeight > 0 ? (window.scrollY / totalHeight) * 100 : 0;
  progressBar.style.width = progress + '%';

  if (window.scrollY > 400) scrollTopBtn.classList.add('show');
  else scrollTopBtn.classList.remove('show');
}, { passive: true });

scrollTopBtn.addEventListener('click', () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});

/* ── Interactive Particle Canvas (Hero) ──────────────── */
(function initHeroCanvas() {
  const canvas = document.getElementById('hero-canvas');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');
  let width, height;
  let particles = [];
  let mouse = { x: null, y: null, radius: 150 };

  function resize() {
    width = canvas.width = canvas.parentElement.offsetWidth;
    height = canvas.height = canvas.parentElement.offsetHeight;
  }
  window.addEventListener('resize', resize);
  resize();

  window.addEventListener('mousemove', (e) => {
    const rect = canvas.getBoundingClientRect();
    mouse.x = e.clientX - rect.left;
    mouse.y = e.clientY - rect.top;
  });
  window.addEventListener('mouseleave', () => {
    mouse.x = null; mouse.y = null;
  });

  class Particle {
    constructor() {
      this.x = Math.random() * width;
      this.y = Math.random() * height;
      this.size = Math.random() * 2 + 1;
      this.baseX = this.x;
      this.baseY = this.y;
      this.vx = (Math.random() - 0.5) * 0.8;
      this.vy = (Math.random() - 0.5) * 0.8;
      this.color = Math.random() > 0.5 ? 'rgba(99, 102, 241,' : 'rgba(6, 182, 212,';
      this.alpha = Math.random() * 0.5 + 0.2;
    }
    update() {
      this.x += this.vx;
      this.y += this.vy;

      if (this.x < 0 || this.x > width) this.vx *= -1;
      if (this.y < 0 || this.y > height) this.vy *= -1;

      // Mouse interactivity
      if (mouse.x !== null && mouse.y !== null) {
        let dx = mouse.x - this.x;
        let dy = mouse.y - this.y;
        let dist = Math.sqrt(dx * dx + dy * dy);
        if (dist < mouse.radius) {
          let force = (mouse.radius - dist) / mouse.radius;
          this.x -= (dx / dist) * force * 3;
          this.y -= (dy / dist) * force * 3;
        }
      }
    }
    draw() {
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
      ctx.fillStyle = this.color + this.alpha + ')';
      ctx.fill();
    }
  }

  const particleCount = Math.min(Math.floor((window.innerWidth * window.innerHeight) / 12000), 70);
  for (let i = 0; i < particleCount; i++) {
    particles.push(new Particle());
  }

  function animate() {
    ctx.clearRect(0, 0, width, height);

    for (let i = 0; i < particles.length; i++) {
      particles[i].update();
      particles[i].draw();

      for (let j = i + 1; j < particles.length; j++) {
        let dx = particles[i].x - particles[j].x;
        let dy = particles[i].y - particles[j].y;
        let dist = Math.sqrt(dx * dx + dy * dy);
        if (dist < 110) {
          ctx.beginPath();
          ctx.moveTo(particles[i].x, particles[i].y);
          ctx.lineTo(particles[j].x, particles[j].y);
          ctx.strokeStyle = `rgba(99, 102, 241, ${0.18 * (1 - dist / 110)})`;
          ctx.lineWidth = 0.8;
          ctx.stroke();
        }
      }
    }
    requestAnimationFrame(animate);
  }
  animate();
})();

/* ── Typewriter Role Rotator ─────────────────────────── */
(function initTypewriter() {
  const target = document.getElementById('typing-text');
  if (!target) return;
  const roles = [
    "SDO/SDR Specialist",
    "Front-End Developer",
    "Amazon PPC Strategist",
    "Digital Marketer",
    "Lead Generaltion",
    "Web Development",
  ];
  let rIdx = 0, charIdx = 0, isDeleting = false;

  function type() {
    const current = roles[rIdx];
    if (isDeleting) {
      target.textContent = current.substring(0, charIdx - 1);
      charIdx--;
    } else {
      target.textContent = current.substring(0, charIdx + 1);
      charIdx++;
    }

    let speed = isDeleting ? 40 : 80;
    if (!isDeleting && charIdx === current.length) {
      speed = 2200;
      isDeleting = true;
    } else if (isDeleting && charIdx === 0) {
      isDeleting = false;
      rIdx = (rIdx + 1) % roles.length;
      speed = 400;
    }
    setTimeout(type, speed);
  }
  type();
})();

/* ── 3D Card Perspective Tilt & Spotlight ─────────────── */
function apply3DTilt() {
  const cards = document.querySelectorAll('.glass-card, .proj-card, .exp-card');
  cards.forEach(card => {
    card.addEventListener('mousemove', (e) => {
      const rect = card.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      const centerX = rect.width / 2;
      const centerY = rect.height / 2;
      const rotateX = ((y - centerY) / centerY) * -5;
      const rotateY = ((x - centerX) / centerX) * 5;

      card.style.transform = `perspective(1000px) rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg) translateY(-4px)`;
      card.style.setProperty('--mouse-x', `${x}px`);
      card.style.setProperty('--mouse-y', `${y}px`);
    });

    card.addEventListener('mouseleave', () => {
      card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0px)';
    });
  });
}
apply3DTilt();

/* ── Navbar Sticky & Active Section Link ────────────── */
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
  navbar.classList.toggle('scrolled', window.scrollY > 40);

  const sections = document.querySelectorAll('section');
  const scrollPos = window.scrollY + 120;
  sections.forEach(sec => {
    if (scrollPos >= sec.offsetTop && scrollPos < sec.offsetTop + sec.offsetHeight) {
      const id = sec.getAttribute('id');
      document.querySelectorAll('.nav-link').forEach(l => {
        l.classList.toggle('active', l.getAttribute('href') === '#' + id);
      });
    }
  });
}, { passive: true });

/* ── Mobile Menu Toggle ──────────────────────────────── */
const mobileMenu   = document.getElementById('mobile-menu');
const mobileToggle = document.getElementById('mobile-toggle');
mobileToggle.addEventListener('click', () => mobileMenu.classList.toggle('open'));
document.querySelectorAll('.mobile-link').forEach(l => {
  l.addEventListener('click', () => mobileMenu.classList.remove('open'));
});

/* ── Scroll Reveal IntersectionObserver ───────────────── */
const revealObs = new IntersectionObserver(entries => {
  entries.forEach((e, index) => {
    if (e.isIntersecting) {
      setTimeout(() => {
        e.target.classList.add('visible');
      }, index * 80);
      revealObs.unobserve(e.target);
    }
  });
}, { threshold: 0.1, rootMargin: '-30px' });

document.querySelectorAll('.reveal').forEach(el => revealObs.observe(el));

/* ── Contact Form Submission (AJAX) ───────────────────── */
async function submitContact(e) {
  e.preventDefault();
  const btn = document.getElementById('cf-btn');
  const suc = document.getElementById('cf-success');
  const err = document.getElementById('cf-error');
  const origText = btn.textContent;

  btn.textContent = 'Sending Message...'; btn.disabled = true;
  suc.style.display = err.style.display = 'none';

  const fd = new FormData();
  fd.append('action', 'contact');
  fd.append('n', document.getElementById('cf-name').value);
  fd.append('e', document.getElementById('cf-email').value);
  fd.append('m', document.getElementById('cf-msg').value + ' [Subject: ' + document.getElementById('cf-subject').value + ']');

  try {
    const r = await fetch('', { method: 'POST', body: fd });
    const j = await r.json();
    if (j.ok) {
      suc.textContent = j.msg;
      suc.style.display = 'block';
      document.getElementById('contact-form').reset();
    } else {
      err.textContent = j.msg || 'Submission error. Please try again.';
      err.style.display = 'block';
    }
  } catch {
    err.textContent = 'Network connection error. Try again.';
    err.style.display = 'block';
  } finally {
    btn.textContent = origText;
    btn.disabled = false;
  }
}

/* ── Admin Modal Controller ────────────────────────── */
function openAdmin() {
  document.getElementById('admin-overlay').classList.add('open');
  if (isLoggedIn) showDashboard();
  else showLogin();
}
function closeAdmin() { document.getElementById('admin-overlay').classList.remove('open'); }
function overlayClick(e) { if (e.target === document.getElementById('admin-overlay')) closeAdmin(); }

function showLogin() {
  document.getElementById('admin-login').style.display = 'block';
  document.getElementById('admin-reset').style.display = 'none';
  document.getElementById('admin-dashboard').style.display = 'none';
}
function showReset() {
  document.getElementById('admin-login').style.display = 'none';
  document.getElementById('admin-reset').style.display = 'block';
  document.getElementById('admin-dashboard').style.display = 'none';
}
function showDashboard() {
  document.getElementById('admin-login').style.display = 'none';
  document.getElementById('admin-reset').style.display = 'none';
  document.getElementById('admin-dashboard').style.display = 'block';
  initSkillsEditor();
}

function showMsg(id, msg, type = 'error') {
  const el = document.getElementById(id);
  el.textContent = msg;
  el.className = 'admin-msg ' + type;
  el.style.display = 'block';
  if (type === 'success') setTimeout(() => el.style.display = 'none', 3500);
}

function adminSaved(id, msg) {
  showMsg(id, msg, 'success');
  setTimeout(() => location.reload(), 900);
}

/* ── Login Logic ─────────────────────────────────────── */
async function doLogin() {
  const btn = document.getElementById('login-btn');
  const fd = new FormData();
  fd.append('action', 'login');
  fd.append('username', document.getElementById('adm-user').value);
  fd.append('password', document.getElementById('adm-pass').value);

  btn.disabled = true; btn.textContent = 'Authenticating...';
  try {
    const r = await fetch('', { method: 'POST', body: fd });
    const j = await r.json();
    if (j.ok) { isLoggedIn = true; showDashboard(); }
    else showMsg('login-msg', j.msg || 'Authentication failed.');
  } catch { showMsg('login-msg', 'Network error.'); }
  finally { btn.disabled = false; btn.textContent = 'Sign In to Dashboard →'; }
}

async function doLogout() {
  const fd = new FormData(); fd.append('action', 'logout');
  await fetch('', { method: 'POST', body: fd });
  isLoggedIn = false; showLogin();
}

async function doReset() {
  const fd = new FormData();
  fd.append('action', 'reset');
  fd.append('key',  document.getElementById('rst-key').value);
  fd.append('nu',   document.getElementById('rst-user').value);
  fd.append('np',   document.getElementById('rst-pass').value);
  try {
    const r = await fetch('', { method: 'POST', body: fd });
    const j = await r.json();
    if (j.ok) { showMsg('reset-msg', j.msg, 'success'); setTimeout(showLogin, 2000); }
    else showMsg('reset-msg', j.msg);
  } catch { showMsg('reset-msg', 'Network error.'); }
}

/* ── Tab Switcher ────────────────────────────────────── */
function showTab(name, ev) {
  document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.admin-tab').forEach(t => t.classList.remove('active'));
  document.getElementById('tab-' + name).classList.add('active');
  if (ev && ev.currentTarget) ev.currentTarget.classList.add('active');
  if (name === 'leads') loadLeads();
}

/* ── Personal Tab ────────────────────────────────────── */
async function savePersonal() {
  const fd = new FormData();
  fd.append('action', 'save_personal');
  ['name','title','subtitle','tagline','email','phone','linkedin','location','bio'].forEach(f => {
    fd.append(f, document.getElementById('p-' + f).value);
  });
  try {
    const r = await fetch('', { method: 'POST', body: fd });
    const j = await r.json();
    if (j.ok) {
      const name = document.getElementById('p-name').value.trim();
      const title = document.getElementById('p-title').value.trim();
      const tagline = document.getElementById('p-tagline').value.trim();
      const bio = document.getElementById('p-bio').value.trim();
      const heroName = document.getElementById('hero-name');
      const heroTitle = document.getElementById('hero-title');
      const heroTagline = document.getElementById('hero-tagline');
      const aboutName = document.getElementById('about-name');
      const aboutBio = document.getElementById('about-bio');
      if (heroName) heroName.innerHTML = name + '<br><span class="accent-text">' + escHtml(title.split(' ')[0] || '') + '</span>';
      if (heroTitle) heroTitle.innerHTML = '<span>Specialist in</span><span id="typing-text">' + escHtml(title) + '</span>';
      if (heroTagline) heroTagline.textContent = tagline;
      if (aboutName) aboutName.textContent = name;
      if (aboutBio) aboutBio.innerHTML = escHtml(bio).replace(/\n/g, '<br>');
      adminSaved('personal-msg', '✅ Details saved successfully!');
    } else showMsg('personal-msg', j.msg || 'Error saving.');
  } catch { showMsg('personal-msg', 'Network error.'); }
}

/* ── Projects Tab ────────────────────────────────────── */
function openProjForm(data = null) {
  document.getElementById('proj-form-box').classList.add('open');
  document.getElementById('proj-form-title').textContent = data ? 'Edit Project' : 'New Project';
  document.getElementById('pf-id').value    = data?.id    || '';
  document.getElementById('pf-title').value = data?.title || '';
  document.getElementById('pf-emoji').value = data?.emoji || '💼';
  document.getElementById('pf-desc').value  = data?.description || '';
  document.getElementById('pf-url').value   = data?.url   || '';
  document.getElementById('pf-status').value= data?.status|| 'Live';
  document.getElementById('pf-tags').value  = (data?.tags||[]).join(', ');
  document.getElementById('proj-msg').style.display = 'none';
}
function closeProjForm() { document.getElementById('proj-form-box').classList.remove('open'); }
function editProject(d) { openProjForm(d); }

async function saveProject() {
  const fd = new FormData();
  fd.append('action', 'save_project');
  ['id','title','emoji','description','url','status','tags'].forEach(f => {
    fd.append(f, document.getElementById('pf-' + f).value);
  });
  try {
    const r = await fetch('', { method: 'POST', body: fd });
    const j = await r.json();
    if (j.ok) {
      closeProjForm();
      adminSaved('proj-msg', '✅ Project saved!');
    } else showMsg('proj-msg', j.msg || 'Error saving project.');
  } catch { showMsg('proj-msg', 'Network error.'); }
}

async function delProject(id) {
  if (!confirm('Delete this project entry?')) return;
  const fd = new FormData(); fd.append('action', 'del_project'); fd.append('id', id);
  const r = await fetch('', { method: 'POST', body: fd });
  const j = await r.json();
  if (j.ok) { document.getElementById('apr-' + id)?.remove(); adminSaved('proj-msg', '✅ Project deleted.'); }
  else alert(j.msg || 'Error deleting project.');
}

/* ── Experience Tab ──────────────────────────────────── */
function openExpForm(data = null) {
  document.getElementById('exp-form-box').classList.add('open');
  document.getElementById('exp-form-title').textContent = data ? 'Edit Experience' : 'New Experience';
  document.getElementById('ef-id').value       = data?.id       || '';
  document.getElementById('ef-company').value  = data?.company  || '';
  document.getElementById('ef-role').value     = data?.role     || '';
  document.getElementById('ef-period').value   = data?.period   || '';
  document.getElementById('ef-location').value = data?.location || '';
  document.getElementById('ef-desc').value     = data?.description || '';
  document.getElementById('ef-tags').value     = (data?.tags||[]).join(', ');
  document.getElementById('exp-msg').style.display = 'none';
}
function closeExpForm() { document.getElementById('exp-form-box').classList.remove('open'); }
function editExp(d) { openExpForm(d); }

async function saveExp() {
  const fd = new FormData(); fd.append('action', 'save_exp');
  ['id','company','role','period','location','description','tags'].forEach(f => fd.append(f, document.getElementById('ef-' + f).value));
  try {
    const r = await fetch('', { method: 'POST', body: fd });
    const j = await r.json();
    if (j.ok) { closeExpForm(); adminSaved('exp-msg', '✅ Experience entry saved!'); }
    else showMsg('exp-msg', j.msg || 'Error.');
  } catch { showMsg('exp-msg', 'Network error.'); }
}

async function delExp(id) {
  if (!confirm('Delete this experience record?')) return;
  const fd = new FormData(); fd.append('action', 'del_exp'); fd.append('id', id);
  const r = await fetch('', { method: 'POST', body: fd });
  const j = await r.json();
  if (j.ok) { document.getElementById('aer-' + id)?.remove(); adminSaved('exp-msg', '✅ Experience entry deleted.'); }
}

/* ── Skills Editor ───────────────────────────────────── */
function initSkillsEditor() { renderSkillsEditor(); }

function renderSkillsEditor() {
  const container = document.getElementById('skills-editor');
  if (!container) return;
  container.innerHTML = skillsData.map((g, gi) => `
    <div class="admin-form-box open" style="margin-bottom:14px">
      <div class="admin-form-header">
        <input type="text" class="form-input" value="${escHtml(g.category)}" oninput="skillsData[${gi}].category=this.value" style="font-weight:700;font-size:14px;flex:1;margin-right:12px">
        <input type="color" value="${g.color}" oninput="skillsData[${gi}].color=this.value" style="width:40px;height:40px;border-radius:8px;cursor:pointer;border:none">
        <button class="btn btn-danger btn-sm" style="margin-left:10px" onclick="removeSkillGroup(${gi})">🗑️ Delete</button>
      </div>
      <div style="display:flex;flex-wrap:wrap;gap:8px;margin-bottom:12px">
        ${(g.items||[]).map((item, ii) => `
          <span style="display:inline-flex;align-items:center;gap:6px;padding:6px 14px;border-radius:100px;background:rgba(99,102,241,.12);border:1px solid rgba(99,102,241,.3);font-size:13px;font-weight:600">
            ${escHtml(item)}
            <button onclick="removeSkill(${gi},${ii})" style="background:none;border:none;color:#ef4444;cursor:pointer;font-size:16px;line-height:1">×</button>
          </span>
        `).join('')}
      </div>
      <div style="display:flex;gap:10px">
        <input type="text" class="form-input" placeholder="Add skill item & press Enter" id="sk-input-${gi}" style="font-size:13px" onkeydown="if(event.key==='Enter'){addSkill(${gi});event.preventDefault()}">
        <button class="btn btn-ghost btn-sm" onclick="addSkill(${gi})">+ Add</button>
      </div>
    </div>
  `).join('');
}

function addSkillGroup() {
  skillsData.push({ category: 'New Skill Category', color: '#6366F1', items: [] });
  renderSkillsEditor();
}
function removeSkillGroup(gi) {
  if (confirm('Remove this category group?')) { skillsData.splice(gi, 1); renderSkillsEditor(); }
}
function addSkill(gi) {
  const inp = document.getElementById('sk-input-' + gi);
  const val = inp.value.trim();
  if (!val) return;
  skillsData[gi].items.push(val);
  inp.value = '';
  renderSkillsEditor();
}
function removeSkill(gi, ii) {
  skillsData[gi].items.splice(ii, 1);
  renderSkillsEditor();
}

async function saveSkills() {
  const fd = new FormData(); fd.append('action', 'save_skills'); fd.append('json', JSON.stringify(skillsData));
  try {
    const r = await fetch('', { method: 'POST', body: fd });
    const j = await r.json();
    if (j.ok) { adminSaved('skills-msg', '✅ Skills saved successfully!'); }
    else showMsg('skills-msg', j.msg || 'Error.');
  } catch { showMsg('skills-msg', 'Network error.'); }
}

/* ── Security Settings ───────────────────────────────── */
async function changeCredentials() {
  const fd = new FormData(); fd.append('action', 'change_creds');
  fd.append('cp', document.getElementById('sec-cp').value);
  fd.append('nu', document.getElementById('sec-nu').value);
  fd.append('np', document.getElementById('sec-np').value);
  fd.append('nk', document.getElementById('sec-nk').value);
  try {
    const r = await fetch('', { method: 'POST', body: fd });
    const j = await r.json();
    if (j.ok) { showMsg('sec-msg', '✅ ' + j.msg, 'success'); document.getElementById('sec-cp').value = ''; }
    else showMsg('sec-msg', j.msg);
  } catch { showMsg('sec-msg', 'Network error.'); }
}

/* ── Leads ───────────────────────────────────────────── */
async function loadLeads() {
  const container = document.getElementById('leads-list');
  container.innerHTML = '<div class="empty-state">Fetching submission leads...</div>';
  const fd = new FormData(); fd.append('action', 'get_leads');
  try {
    const r = await fetch('', { method: 'POST', body: fd });
    const j = await r.json();
    if (j.ok && j.leads.length > 0) {
      const statusStyles = {
        'Pending': 'background:rgba(245,158,11,0.15);border:1px solid rgba(245,158,11,0.4);color:#f59e0b',
        'Viewed': 'background:rgba(6,182,212,0.15);border:1px solid rgba(6,182,212,0.4);color:#06b6d4',
        'Contacted': 'background:rgba(34,197,94,0.15);border:1px solid rgba(34,197,94,0.4);color:#22c55e'
      };
      container.innerHTML = j.leads.map(l => {
        const status = l.status || 'Pending';
        return `
          <div class="lead-item" id="lead-${escHtml(l.id)}">
            <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:14px;margin-bottom:10px;flex-wrap:wrap">
              <div>
                <div class="lead-name">👤 ${escHtml(l.name)}</div>
                <div class="lead-email">${escHtml(l.email)}</div>
              </div>
              <div style="display:flex;align-items:center;gap:10px">
                <select class="form-input" style="padding:4px 12px;font-size:12px;border-radius:100px;font-weight:700;cursor:pointer;${statusStyles[status]||statusStyles['Pending']}" onchange="updateLeadStatus('${escHtml(l.id)}', this.value)">
                  <option value="Pending" ${status==='Pending'?'selected':''}>⏳ Pending</option>
                  <option value="Viewed" ${status==='Viewed'?'selected':''}>👁️ Viewed</option>
                  <option value="Contacted" ${status==='Contacted'?'selected':''}>✅ Contacted</option>
                </select>
                <button class="btn btn-danger btn-sm" style="padding:4px 12px;font-size:12px" onclick="deleteLead('${escHtml(l.id)}')">🗑️ Delete</button>
              </div>
            </div>
            <div class="lead-msg">${escHtml(l.message)}</div>
            <div class="lead-date">Received: ${escHtml(l.date)} ${l.ip ? '· IP: ' + escHtml(l.ip) : ''}</div>
          </div>
        `;
      }).join('');
    } else {
      container.innerHTML = '<div class="empty-state">No lead submissions found.</div>';
    }
  } catch { container.innerHTML = '<div class="empty-state">Error loading leads.</div>'; }
}

async function updateLeadStatus(id, newStatus) {
  const fd = new FormData();
  fd.append('action', 'update_lead_status');
  fd.append('id', id);
  fd.append('status', newStatus);
  try {
    const r = await fetch('', { method: 'POST', body: fd });
    const j = await r.json();
    if (j.ok) {
      loadLeads();
    } else alert(j.msg || 'Error updating lead status.');
  } catch { alert('Network error.'); }
}

async function deleteLead(id) {
  if (!confirm('Delete this contact lead entry?')) return;
  const fd = new FormData();
  fd.append('action', 'del_lead');
  fd.append('id', id);
  try {
    const r = await fetch('', { method: 'POST', body: fd });
    const j = await r.json();
    if (j.ok) {
      document.getElementById('lead-' + id)?.remove();
      if (document.querySelectorAll('.lead-item').length === 0) {
        document.getElementById('leads-list').innerHTML = '<div class="empty-state">No lead submissions found.</div>';
      }
    } else alert(j.msg || 'Error deleting lead.');
  } catch { alert('Network error.'); }
}

/* ── Utility ─────────────────────────────────────────── */
function escHtml(str) {
  return String(str||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#39;');
}

if (isLoggedIn) {
  const overlay = document.getElementById('admin-overlay');
  if (!overlay.classList.contains('open')) showDashboard();
}
</script>
</body>
</html>


