<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Garuda Survival Roleplay</title>
    <meta name="description" content="Garuda Survival Roleplay - FiveM GTA V Roleplay bertema zombie survival, post-apocalyptic, hardcore, dan cinematic experience." />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;800;900&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #050505;
            --bg-2: #0c0907;
            --panel: rgba(18, 12, 9, 0.78);
            --panel-strong: rgba(14, 10, 8, 0.92);
            --gold: #f5c34b;
            --gold-2: #ffde84;
            --orange: #ff8a1c;
            --red: #c61a12;
            --red-2: #ff4f1f;
            --white: #f5f2eb;
            --muted: #cbbb9f;
            --line: rgba(245, 195, 75, 0.16);
            --shadow: 0 25px 60px rgba(0, 0, 0, 0.45);
            --radius: 26px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Inter", sans-serif;
            color: var(--white);
            background:
                radial-gradient(circle at top, rgba(255, 123, 28, 0.15), transparent 25%),
                radial-gradient(circle at 80% 20%, rgba(198, 26, 18, 0.12), transparent 22%),
                linear-gradient(180deg, #140906 0%, #070707 45%, #040404 100%);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            background:
                linear-gradient(to bottom, rgba(0,0,0,0.15), rgba(0,0,0,0.75)),
                repeating-linear-gradient(
                    to bottom,
                    rgba(255,255,255,0.012) 0px,
                    rgba(255,255,255,0.012) 1px,
                    transparent 2px,
                    transparent 4px
                );
            z-index: -3;
        }

        .smoke,
        .smoke::before,
        .smoke::after {
            content: "";
            position: fixed;
            inset: auto;
            border-radius: 50%;
            filter: blur(60px);
            pointer-events: none;
            z-index: -2;
        }

        .smoke {
            width: 320px;
            height: 320px;
            left: -80px;
            top: 180px;
            background: rgba(255, 105, 30, 0.08);
            animation: floatSmoke 14s ease-in-out infinite;
        }

        .smoke::before {
            width: 260px;
            height: 260px;
            left: 70vw;
            top: 120px;
            background: rgba(198, 26, 18, 0.08);
            animation: floatSmoke 18s ease-in-out infinite reverse;
        }

        .smoke::after {
            width: 280px;
            height: 280px;
            left: 58vw;
            top: 70vh;
            background: rgba(245, 195, 75, 0.05);
            animation: floatSmoke 16s ease-in-out infinite;
        }

        @keyframes floatSmoke {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(18px, -20px) scale(1.08); }
        }

        .container {
            width: min(1200px, calc(100% - 32px));
            margin: 0 auto;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(14px);
            background: rgba(8, 8, 8, 0.78);
            border-bottom: 1px solid rgba(245, 195, 75, 0.08);
        }

        .topbar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 16px 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            color: var(--white);
        }

        .brand img {
            width: 54px;
            height: 54px;
            object-fit: contain;
            filter: drop-shadow(0 10px 22px rgba(255, 136, 0, 0.25));
        }

        .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }

        .brand-text small {
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: 0.24em;
            font-size: 11px;
            margin-bottom: 5px;
            font-weight: 700;
        }

        .brand-text strong {
            font-family: "Orbitron", sans-serif;
            font-size: 18px;
            font-weight: 800;
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .nav a,
        .btn {
            text-decoration: none;
            color: var(--white);
            font-weight: 700;
            padding: 12px 18px;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,0.08);
            transition: .25s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
        }

        .nav a:hover,
        .btn:hover {
            transform: translateY(-2px);
            border-color: rgba(245, 195, 75, 0.35);
            box-shadow: 0 12px 28px rgba(0,0,0,0.28);
        }

        .btn-primary {
            color: #160a00;
            border: none;
            background: linear-gradient(135deg, var(--gold), var(--gold-2) 45%, var(--orange));
            box-shadow: 0 14px 34px rgba(245, 195, 75, 0.18);
        }

        .btn-discord {
            color: white;
            border: none;
            background: linear-gradient(135deg, #b31217, #e52d27 45%, #ff7b1c);
            box-shadow: 0 14px 34px rgba(198, 26, 18, 0.22);
        }

        .btn-outline {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(245, 195, 75, 0.16);
        }

        .hero {
            position: relative;
            padding: 82px 0 56px;
            overflow: hidden;
        }

        .hero-fire {
            position: absolute;
            inset: auto 0 -120px 0;
            height: 240px;
            background:
                radial-gradient(circle at 20% 50%, rgba(255, 112, 20, 0.22), transparent 22%),
                radial-gradient(circle at 45% 60%, rgba(198, 26, 18, 0.2), transparent 20%),
                radial-gradient(circle at 70% 60%, rgba(255, 145, 30, 0.18), transparent 20%);
            filter: blur(45px);
            pointer-events: none;
            animation: flicker 5s ease-in-out infinite;
        }

        @keyframes flicker {
            0%, 100% { opacity: 0.75; transform: translateY(0); }
            50% { opacity: 1; transform: translateY(-8px); }
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.12fr 0.88fr;
            gap: 28px;
            align-items: center;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px;
            border-radius: 999px;
            border: 1px solid rgba(245, 195, 75, 0.16);
            background: rgba(245, 195, 75, 0.08);
            color: #ffe19a;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        h1 {
            font-family: "Orbitron", sans-serif;
            font-size: clamp(2.6rem, 5vw, 5.2rem);
            line-height: 1.02;
            margin-bottom: 20px;
            text-transform: uppercase;
            text-shadow: 0 12px 30px rgba(0,0,0,0.4);
        }

        .hero p {
            color: var(--muted);
            font-size: 1.05rem;
            line-height: 1.85;
            max-width: 720px;
            margin-bottom: 28px;
        }

        .hero-actions,
        .cta-actions {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .hero-actions {
            margin-bottom: 20px;
        }

        .hero-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .hero-pill {
            padding: 12px 16px;
            border-radius: 999px;
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.06);
            color: var(--muted);
            font-weight: 600;
            font-size: 0.95rem;
        }

        .glow-text {
            color: var(--gold);
            text-shadow: 0 0 14px rgba(245, 195, 75, 0.35);
        }

        .panel {
            background: linear-gradient(180deg, rgba(22, 13, 9, 0.9), rgba(10, 10, 10, 0.95));
            border: 1px solid var(--line);
            border-radius: 32px;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .hero-card {
            padding: 28px;
        }

        .hero-card::before,
        .card::before,
        .faction-card::before,
        .gallery-card::before,
        .cta-box::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(245,195,75,0.08), transparent 24%),
                radial-gradient(circle at bottom left, rgba(198,26,18,0.1), transparent 24%);
            pointer-events: none;
        }

        .hero-logo-wrap {
            display: flex;
            justify-content: center;
            margin-bottom: 18px;
        }

        .hero-logo-wrap img {
            width: min(100%, 330px);
            object-fit: contain;
            filter: drop-shadow(0 18px 36px rgba(255, 126, 20, 0.2));
            animation: logoPulse 4s ease-in-out infinite;
        }

        @keyframes logoPulse {
            0%, 100% { transform: scale(1); filter: drop-shadow(0 18px 36px rgba(255, 126, 20, 0.2)); }
            50% { transform: scale(1.02); filter: drop-shadow(0 18px 44px rgba(255, 170, 20, 0.28)); }
        }

        .status-box {
            display: grid;
            gap: 12px;
        }

        .status-item {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 18px;
            padding: 15px 16px;
        }

        .status-item small {
            display: block;
            color: #dfc79d;
            margin-bottom: 6px;
            font-size: .82rem;
        }

        .status-item strong {
            font-size: 1rem;
            color: white;
        }

        .online {
            color: var(--gold);
        }

        .section {
            padding: 26px 0 74px;
        }

        .section-head {
            margin-bottom: 24px;
        }

        .section-head h2 {
            font-family: "Orbitron", sans-serif;
            font-size: clamp(1.6rem, 3vw, 2.5rem);
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .section-head p {
            color: var(--muted);
            max-width: 760px;
            line-height: 1.85;
        }

        .grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .card,
        .faction-card,
        .gallery-card,
        .rules-card,
        .cta-box {
            position: relative;
            overflow: hidden;
        }

        .card,
        .faction-card,
        .gallery-card,
        .rules-card {
            background: linear-gradient(180deg, rgba(20, 13, 10, 0.88), rgba(10, 10, 10, 0.94));
            border: 1px solid var(--line);
            border-radius: var(--radius);
            padding: 24px;
            box-shadow: var(--shadow);
        }

        .card-icon {
            width: 56px;
            height: 56px;
            display: grid;
            place-items: center;
            border-radius: 18px;
            margin-bottom: 16px;
            font-size: 24px;
            background: linear-gradient(135deg, rgba(245,195,75,0.14), rgba(198,26,18,0.12));
            border: 1px solid rgba(245, 195, 75, 0.14);
            box-shadow: 0 0 18px rgba(245,195,75,0.08);
        }

        .card h3,
        .faction-card h3,
        .gallery-card h3,
        .rules-card h3 {
            margin-bottom: 10px;
            font-size: 1.14rem;
        }

        .card p,
        .faction-card p,
        .gallery-card p,
        .rules-card p {
            color: var(--muted);
            line-height: 1.75;
            font-size: .96rem;
        }

        .rules-list {
            display: grid;
            gap: 12px;
            margin-top: 8px;
        }

        .rule-item {
            padding: 14px 16px;
            border-radius: 16px;
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.05);
            color: var(--white);
            font-weight: 600;
        }

        .faction-tag,
        .gallery-tag {
            display: inline-flex;
            padding: 8px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .08em;
            margin-bottom: 14px;
            background: rgba(245, 195, 75, 0.08);
            border: 1px solid rgba(245, 195, 75, 0.16);
            color: #ffe09c;
        }

        .gallery-preview {
            height: 220px;
            border-radius: 20px;
            margin-bottom: 16px;
            background:
                linear-gradient(180deg, rgba(0,0,0,0.12), rgba(0,0,0,0.72)),
                radial-gradient(circle at top, rgba(255, 134, 30, 0.25), transparent 30%),
                linear-gradient(135deg, #2a0f08, #150f0b, #090909);
            border: 1px solid rgba(245, 195, 75, 0.08);
            position: relative;
            overflow: hidden;
        }

        .gallery-preview::before {
            content: "";
            position: absolute;
            inset: auto -20px -30px -20px;
            height: 90px;
            background:
                radial-gradient(circle at 20% 60%, rgba(255, 98, 30, 0.35), transparent 20%),
                radial-gradient(circle at 50% 50%, rgba(198, 26, 18, 0.28), transparent 20%),
                radial-gradient(circle at 80% 65%, rgba(255, 160, 30, 0.26), transparent 20%);
            filter: blur(22px);
        }

        .gallery-preview::after {
            content: "GARUDA SURVIVAL";
            position: absolute;
            left: 18px;
            bottom: 16px;
            font-family: "Orbitron", sans-serif;
            font-weight: 800;
            letter-spacing: .08em;
            color: rgba(255,255,255,0.88);
            font-size: 1rem;
        }

        .cta-box {
            padding: 34px 30px;
            border-radius: 30px;
            background:
                radial-gradient(circle at top left, rgba(245, 195, 75, 0.12), transparent 26%),
                radial-gradient(circle at bottom right, rgba(198, 26, 18, 0.16), transparent 28%),
                linear-gradient(135deg, rgba(22, 12, 8, 0.96), rgba(10, 10, 10, 0.96));
            border: 1px solid var(--line);
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .cta-box h3 {
            font-family: "Orbitron", sans-serif;
            font-size: clamp(1.4rem, 3vw, 2rem);
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .cta-box p {
            color: var(--muted);
            line-height: 1.8;
            max-width: 720px;
        }

        .footer {
            border-top: 1px solid rgba(245, 195, 75, 0.08);
            padding: 24px 0 34px;
            background: rgba(0,0,0,0.18);
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            color: #ccb58e;
        }

        .copy-feedback {
            font-size: .92rem;
            color: var(--gold);
            margin-top: 10px;
            min-height: 20px;
        }

        @media (max-width: 980px) {
            .hero-grid,
            .grid-3,
            .grid-2 {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            .topbar-inner {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav {
                width: 100%;
            }

            .nav a,
            .btn {
                width: 100%;
            }

            .hero-actions,
            .cta-actions {
                flex-direction: column;
            }

            .hero-actions .btn,
            .cta-actions .btn {
                width: 100%;
            }

            .hero {
                padding-top: 62px;
            }
        }
    </style>
</head>
<body>

    <div class="smoke"></div>

    <header class="topbar">
        <div class="container topbar-inner">
            <a href="#" class="brand">
                <img src="https://media.discordapp.net/attachments/1471039068090531861/1474728188725952614/garuda.png?ex=69b34ae7&is=69b1f967&hm=9b6941641b22d69a662db270df14477c221321af14c79cbe7c3812a891392ea8&=&format=webp&quality=lossless&width=640&height=640" alt="Garuda Survival Roleplay Logo">
                <div class="brand-text">
                    <small>FiveM GTA V Roleplay</small>
                    <strong>Garuda Survival Roleplay</strong>
                </div>
            </a>

            <nav class="nav">
                <a href="#tentang">Tentang</a>
                <a href="#rules">Rules</a>
                <a href="#faction">Faction</a>
                <a href="#gallery">Gallery</a>
                <a href="#join">Join</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="hero-fire"></div>

            <div class="container hero-grid">
                <div>
                    <div class="eyebrow">☣ Zombie Survival • Hardcore RP • Post Apocalypse</div>
                    <h1>Bertahan Hidup di Akhir Peradaban.</h1>
                    <p>
                        <strong>Garuda Survival Roleplay</strong> adalah server FiveM GTA V Roleplay bertema
                        <strong>zombie apocalypse</strong>, <strong>survival</strong>, dan
                        <strong>post-apocalyptic world</strong>. Cari resource, hadapi wabah, bangun aliansi,
                        rebut wilayah, dan ukir kisah karaktermu di dunia yang brutal, panas, dan penuh ancaman.
                    </p>

                    <div class="hero-actions">
                        <a href="fivem://connect/YOUR_SERVER_IP:30120" class="btn btn-primary">🎮 Join Game</a>
                        <a href="https://discord.gg/uabbUg83Dd" target="_blank" class="btn btn-discord">💬 Join Discord</a>
                        <button class="btn btn-outline" onclick="copyServerIP()">📋 Copy IP Server</button>
                    </div>

                    <div class="hero-meta">
                        <div class="hero-pill">Zombie Outbreak</div>
                        <div class="hero-pill">Loot & Crafting</div>
                        <div class="hero-pill">Faction Conflict</div>
                        <div class="hero-pill">Indonesian Community</div>
                    </div>

                    <div class="copy-feedback" id="copyFeedback"></div>
                </div>

                <div class="panel hero-card">
                    <div class="hero-logo-wrap">
                        <img src="https://media.discordapp.net/attachments/1471039068090531861/1474728188725952614/garuda.png?ex=69b34ae7&is=69b1f967&hm=9b6941641b22d69a662db270df14477c221321af14c79cbe7c3812a891392ea8&=&format=webp&quality=lossless&width=640&height=640" alt="Garuda Survival Roleplay">
                    </div>

                    <div class="status-box">
                        <div class="status-item">
                            <small>Status Server</small>
                            <strong class="online">SURVIVAL SECTOR ONLINE</strong>
                        </div>

                        <div class="status-item">
                            <small>Player Online</small>
                            <strong id="playerCount">Memuat...</strong>
                        </div>

                        <div class="status-item">
                            <small>Tema Gameplay</small>
                            <strong>Zombie Survival Roleplay</strong>
                        </div>

                        <div class="status-item">
                            <small>Atmosfer</small>
                            <strong>Dark, Brutal, Cinematic, Immersive</strong>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="tentang">
            <div class="container">
                <div class="section-head">
                    <h2>Dunia Garuda Sudah Runtuh</h2>
                    <p>
                        Kota yang dulu hidup kini menjadi puing, api, dan mayat hidup. Logistik menipis,
                        wilayah menjadi rebutan, dan manusia yang tersisa tidak selalu lebih baik dari zombie.
                        Di sini, setiap keputusan adalah pertaruhan hidup dan mati.
                    </p>
                </div>

                <div class="grid-3">
                    <div class="card">
                        <div class="card-icon">☣</div>
                        <h3>Zombie Apocalypse</h3>
                        <p>
                            Jalanan penuh ancaman. Gerombolan zombie dapat muncul kapan saja, memaksamu
                            terus waspada di setiap perjalanan.
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-icon">🥫</div>
                        <h3>Hardcore Survival</h3>
                        <p>
                            Makanan, air, obat, dan perlengkapan sangat penting. Resource terbatas dan
                            kesalahan kecil bisa menjadi akhir dari karaktermu.
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-icon">🔫</div>
                        <h3>Conflict Roleplay</h3>
                        <p>
                            Tidak semua survivor adalah teman. Bangun kepercayaan, ciptakan konflik,
                            atau jadi ancaman terbesar di dunia Garuda.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="rules">
            <div class="container">
                <div class="section-head">
                    <h2>Server Rules</h2>
                    <p>
                        Roleplay yang kuat lahir dari komunitas yang tertib. Berikut gambaran dasar aturan
                        yang bisa kamu tampilkan di landing page server.
                    </p>
                </div>

                <div class="grid-2">
                    <div class="rules-card">
                        <h3>Aturan Umum</h3>
                        <div class="rules-list">
                            <div class="rule-item">Hormati sesama pemain dan staff.</div>
                            <div class="rule-item">Dilarang toxic, SARA, exploit, cheat, dan bug abuse.</div>
                            <div class="rule-item">Utamakan kualitas roleplay dibanding menang-menangan.</div>
                            <div class="rule-item">Ikuti seluruh kebijakan dan pengumuman resmi dari Discord server.</div>
                        </div>
                    </div>

                    <div class="rules-card">
                        <h3>Aturan Roleplay</h3>
                        <div class="rules-list">
                            <div class="rule-item">No random kill, no fail RP, no power gaming, no meta gaming.</div>
                            <div class="rule-item">Semua aksi harus memiliki alasan dan konteks roleplay.</div>
                            <div class="rule-item">Gunakan Discord untuk info, report, dan panduan resmi server.</div>
                            <div class="rule-item">Dalam dunia survival, konsekuensi karakter harus dihormati.</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="faction">
            <div class="container">
                <div class="section-head">
                    <h2>Faction & Kelompok</h2>
                    <p>
                        Bentuk kelompokmu sendiri, kuasai zona, cari resource, dan tentukan siapa yang bertahan
                        paling lama di tengah kehancuran.
                    </p>
                </div>

                <div class="grid-3">
                    <div class="faction-card">
                        <div class="faction-tag">Survivor</div>
                        <h3>Survivor Camp</h3>
                        <p>
                            Kelompok yang fokus pada bertahan hidup, berbagi logistik, dan menjaga area aman
                            dari ancaman zombie maupun raider.
                        </p>
                    </div>

                    <div class="faction-card">
                        <div class="faction-tag">Scavenger</div>
                        <h3>Scavenger Crew</h3>
                        <p>
                            Pemburu loot yang hidup dari reruntuhan kota. Cepat, oportunis, dan sering menjadi
                            pihak pertama yang menemukan resource langka.
                        </p>
                    </div>

                    <div class="faction-card">
                        <div class="faction-tag">Raider</div>
                        <h3>Raider / Bandit</h3>
                        <p>
                            Kelompok brutal yang hidup dari penjarahan, intimidasi, dan kekacauan. Ancaman besar
                            bagi siapa pun yang lemah atau lengah.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="gallery">
            <div class="container">
                <div class="section-head">
                    <h2>Gallery Preview</h2>
                    <p>
                        Section ini bisa kamu isi screenshot server nantinya. Untuk sekarang saya buatkan
                        layout preview bergaya cinematic sesuai tema Garuda Survival.
                    </p>
                </div>

                <div class="grid-3">
                    <div class="gallery-card">
                        <div class="gallery-preview"></div>
                        <div class="gallery-tag">Burning City</div>
                        <h3>Kota yang Terbakar</h3>
                        <p>
                            Jalanan penuh puing, langit merah, dan suasana mencekam yang menggambarkan dunia
                            pasca kehancuran.
                        </p>
                    </div>

                    <div class="gallery-card">
                        <div class="gallery-preview"></div>
                        <div class="gallery-tag">Survival Zone</div>
                        <h3>Zona Bertahan Hidup</h3>
                        <p>
                            Setiap wilayah punya risiko. Cari supply, bentuk pertahanan, dan pastikan kelompokmu
                            tetap hidup.
                        </p>
                    </div>

                    <div class="gallery-card">
                        <div class="gallery-preview"></div>
                        <div class="gallery-tag">Faction War</div>
                        <h3>Konflik Antar Kelompok</h3>
                        <p>
                            Saat resource menipis, konflik menjadi tak terhindarkan. Siapa yang kuat akan menguasai
                            sektor Garuda.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="join">
            <div class="container">
                <div class="cta-box">
                    <div>
                        <h3>Siap Menjadi <span class="glow-text">Survivor Sejati</span>?</h3>
                        <p>
                            Masuk ke <strong>Garuda Survival Roleplay</strong>, hadapi wabah, bangun cerita,
                            rebut resource, dan buktikan bahwa kamu mampu bertahan di dunia yang telah hancur.
                        </p>
                    </div>

                    <div class="cta-actions">
                        <a href="fivem://connect/YOUR_SERVER_IP:30120" class="btn btn-primary">Join Game</a>
                        <a href="https://discord.gg/uabbUg83Dd" target="_blank" class="btn btn-discord">Join Discord</a>
                        <button class="btn btn-outline" onclick="copyServerIP()">Copy IP</button>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container footer-inner">
            <div>© 2026 Garuda Survival Roleplay. All rights reserved.</div>
            <div>FiveM GTA V Roleplay • Zombie Survival • Post Apocalypse</div>
        </div>
    </footer>

    <script>
        const SERVER_IP = "YOUR_SERVER_IP:30120";

        function copyServerIP() {
            navigator.clipboard.writeText(SERVER_IP).then(() => {
                document.getElementById("copyFeedback").textContent = "IP server berhasil disalin: " + SERVER_IP;
            }).catch(() => {
                document.getElementById("copyFeedback").textContent = "Gagal menyalin IP. Silakan copy manual: " + SERVER_IP;
            });
        }

        async function loadPlayerCount() {
            const playerCountEl = document.getElementById("playerCount");

            try {
                // GANTI endpoint ini dengan API milikmu
                // contoh: https://domainmu.com/api/playercount
                const response = await fetch("https://your-domain.com/api/playercount");

                if (!response.ok) {
                    throw new Error("Gagal mengambil data player.");
                }

                const data = await response.json();

                // fleksibel: bisa { count: 120 } atau { players: 120 }
                const count = data.count ?? data.players ?? 0;
                playerCountEl.textContent = count + " Player Online";
            } catch (error) {
                playerCountEl.textContent = "Online counter belum tersedia";
            }
        }

        loadPlayerCount();
        setInterval(loadPlayerCount, 30000);
    </script>
</body>
</html>