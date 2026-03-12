<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Garuda Survival Roleplay</title>
    <meta name="description" content="Garuda Survival Roleplay adalah server FiveM GTA V Roleplay bertema zombie survival, post-apocalyptic, hardcore survival, dan komunitas roleplay Indonesia." />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;800;900&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #050505;
            --bg-soft: #0d0d0d;
            --panel: rgba(16, 12, 10, 0.82);
            --panel-2: rgba(26, 17, 10, 0.9);
            --gold: #f6c547;
            --gold-dark: #a86d10;
            --gold-soft: rgba(246, 197, 71, 0.12);
            --red: #c81f12;
            --red-bright: #ff4b1f;
            --orange: #ff8a1d;
            --white: #f8f5ef;
            --muted: #c8bba8;
            --line: rgba(246, 197, 71, 0.18);
            --shadow: 0 24px 70px rgba(0, 0, 0, 0.55);
            --radius: 24px;
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
                radial-gradient(circle at top center, rgba(255, 110, 20, 0.15), transparent 28%),
                radial-gradient(circle at 80% 20%, rgba(200, 31, 18, 0.12), transparent 20%),
                linear-gradient(180deg, #130705 0%, #080808 45%, #050505 100%);
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
                linear-gradient(to bottom, rgba(0,0,0,0.25), rgba(0,0,0,0.75)),
                repeating-linear-gradient(
                    to bottom,
                    rgba(255,255,255,0.015) 0px,
                    rgba(255,255,255,0.015) 1px,
                    transparent 2px,
                    transparent 4px
                );
            z-index: -2;
        }

        body::after {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            background:
                radial-gradient(circle at 20% 80%, rgba(255, 90, 0, 0.06), transparent 20%),
                radial-gradient(circle at 80% 60%, rgba(246, 197, 71, 0.05), transparent 25%);
            filter: blur(20px);
            z-index: -1;
        }

        .container {
            width: min(1180px, calc(100% - 32px));
            margin: 0 auto;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(14px);
            background: rgba(8, 8, 8, 0.78);
            border-bottom: 1px solid rgba(246, 197, 71, 0.08);
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
            width: 52px;
            height: 52px;
            object-fit: contain;
            filter: drop-shadow(0 10px 20px rgba(255, 140, 0, 0.25));
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
            margin-bottom: 4px;
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
            transition: 0.25s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .nav a:hover,
        .btn:hover {
            transform: translateY(-2px);
            border-color: rgba(246, 197, 71, 0.35);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .btn-primary {
            color: #140900;
            border: none;
            background: linear-gradient(135deg, var(--gold), #ffde79 45%, var(--orange));
            box-shadow: 0 14px 34px rgba(246, 197, 71, 0.18);
        }

        .btn-discord {
            color: white;
            border: none;
            background: linear-gradient(135deg, #b31217, #e52d27 45%, #ff7b1c);
            box-shadow: 0 14px 34px rgba(200, 31, 18, 0.2);
        }

        .hero {
            padding: 76px 0 52px;
            position: relative;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 28px;
            align-items: center;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px;
            border-radius: 999px;
            border: 1px solid rgba(246, 197, 71, 0.18);
            background: rgba(246, 197, 71, 0.08);
            color: #ffe39a;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        h1 {
            font-family: "Orbitron", sans-serif;
            font-size: clamp(2.5rem, 5vw, 5rem);
            line-height: 1.02;
            margin-bottom: 20px;
            text-transform: uppercase;
            text-shadow: 0 10px 30px rgba(0,0,0,0.4);
        }

        .hero p {
            color: var(--muted);
            font-size: 1.05rem;
            line-height: 1.85;
            max-width: 720px;
            margin-bottom: 28px;
        }

        .hero-actions {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            margin-bottom: 24px;
        }

        .hero-notes {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .note-pill {
            padding: 12px 16px;
            border-radius: 999px;
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.07);
            color: var(--muted);
            font-weight: 600;
            font-size: 0.95rem;
        }

        .hero-card {
            background:
                linear-gradient(180deg, rgba(25, 13, 8, 0.95), rgba(11, 11, 11, 0.94));
            border: 1px solid var(--line);
            border-radius: 32px;
            padding: 28px;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .hero-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(246, 197, 71, 0.12), transparent 28%),
                radial-gradient(circle at bottom left, rgba(200, 31, 18, 0.14), transparent 24%);
            pointer-events: none;
        }

        .hero-logo-wrap {
            position: relative;
            display: flex;
            justify-content: center;
            margin-bottom: 18px;
        }

        .hero-logo-wrap img {
            width: min(100%, 320px);
            object-fit: contain;
            filter: drop-shadow(0 18px 38px rgba(255, 120, 0, 0.2));
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
            font-size: 0.82rem;
        }

        .status-item strong {
            font-size: 1rem;
            color: white;
        }

        .online {
            color: #ffd15d;
        }

        section {
            padding: 26px 0 70px;
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

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .card {
            background: linear-gradient(180deg, rgba(20, 13, 10, 0.88), rgba(10, 10, 10, 0.92));
            border: 1px solid var(--line);
            border-radius: var(--radius);
            padding: 24px;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(246,197,71,0.03), transparent 50%);
            pointer-events: none;
        }

        .card-icon {
            width: 54px;
            height: 54px;
            display: grid;
            place-items: center;
            border-radius: 16px;
            margin-bottom: 16px;
            font-size: 24px;
            background: linear-gradient(135deg, rgba(246,197,71,0.14), rgba(200,31,18,0.12));
            border: 1px solid rgba(246, 197, 71, 0.14);
        }

        .card h3 {
            font-size: 1.14rem;
            margin-bottom: 10px;
        }

        .card p {
            color: var(--muted);
            line-height: 1.75;
            font-size: 0.96rem;
        }

        .about-box {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .about-panel {
            background: linear-gradient(180deg, rgba(17, 11, 8, 0.9), rgba(9, 9, 9, 0.95));
            border: 1px solid var(--line);
            border-radius: 28px;
            padding: 26px;
            box-shadow: var(--shadow);
        }

        .about-panel h3 {
            font-family: "Orbitron", sans-serif;
            margin-bottom: 12px;
            text-transform: uppercase;
            font-size: 1.15rem;
        }

        .about-panel p {
            color: var(--muted);
            line-height: 1.8;
        }

        .about-list {
            display: grid;
            gap: 12px;
            margin-top: 18px;
        }

        .about-list div {
            padding: 14px 16px;
            border-radius: 16px;
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.05);
            color: var(--white);
            font-weight: 600;
        }

        .cta {
            margin-top: 8px;
        }

        .cta-box {
            padding: 34px 30px;
            border-radius: 30px;
            background:
                radial-gradient(circle at top left, rgba(246, 197, 71, 0.12), transparent 26%),
                radial-gradient(circle at bottom right, rgba(200, 31, 18, 0.16), transparent 28%),
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

        footer {
            border-top: 1px solid rgba(246, 197, 71, 0.08);
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

        .glow {
            color: var(--gold);
        }

        @media (max-width: 980px) {
            .hero-grid,
            .feature-grid,
            .about-box {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 680px) {
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

            .hero-actions {
                flex-direction: column;
            }

            .hero-actions .btn {
                width: 100%;
            }

            .hero {
                padding-top: 60px;
            }
        }
    </style>
</head>
<body>

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
                <a href="#fitur">Fitur</a>
                <a href="#join">Join</a>
                <a href="fivem://connect/YOUR_SERVER_IP:30120" class="btn btn-primary">Join Game</a>
                <a href="https://discord.gg/uabbUg83Dd" target="_blank" class="btn btn-discord">Join Discord</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container hero-grid">
                <div>
                    <div class="eyebrow">☣ Zombie Survival • Hardcore Roleplay • Post Apocalyptic</div>
                    <h1>Masuk ke Dunia Garuda yang Telah Hancur.</h1>
                    <p>
                        <strong>Garuda Survival Roleplay</strong> adalah server FiveM GTA V Roleplay dengan tema
                        <strong>zombie apocalypse</strong>, <strong>survival</strong>, dan <strong>dunia pasca kehancuran</strong>.
                        Bertahan dari wabah, cari resource, bangun aliansi, lawan ancaman zombie, dan ukir cerita karaktermu
                        di dunia yang brutal, gelap, dan penuh konflik.
                    </p>

                    <div class="hero-actions">
                        <a href="fivem://connect/YOUR_SERVER_IP:30120" class="btn btn-primary">🎮 Join Game</a>
                        <a href="https://discord.gg/uabbUg83Dd" target="_blank" class="btn btn-discord">💬 Join Discord</a>
                    </div>

                    <div class="hero-notes">
                        <div class="note-pill">Zombie Outbreak</div>
                        <div class="note-pill">Hard Survival</div>
                        <div class="note-pill">Faction & Story</div>
                        <div class="note-pill">Indonesian Community</div>
                    </div>
                </div>

                <div class="hero-card">
                    <div class="hero-logo-wrap">
                        <img src="https://media.discordapp.net/attachments/1471039068090531861/1474728188725952614/garuda.png?ex=69b34ae7&is=69b1f967&hm=9b6941641b22d69a662db270df14477c221321af14c79cbe7c3812a891392ea8&=&format=webp&quality=lossless&width=640&height=640" alt="Garuda Survival Roleplay">
                    </div>

                    <div class="status-box">
                        <div class="status-item">
                            <small>Status Server</small>
                            <strong class="online">SURVIVAL SECTOR ONLINE</strong>
                        </div>
                        <div class="status-item">
                            <small>Tema Utama</small>
                            <strong>Zombie Survival Roleplay</strong>
                        </div>
                        <div class="status-item">
                            <small>Nuansa Gameplay</small>
                            <strong>Dark, Hardcore, Brutal, Immersive</strong>
                        </div>
                        <div class="status-item">
                            <small>Komunitas</small>
                            <strong>Join Discord untuk whitelist, info, dan update</strong>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="tentang">
            <div class="container">
                <div class="section-head">
                    <h2>Dunia yang Penuh Abu, Darah, dan Ancaman</h2>
                    <p>
                        Kota telah runtuh. Peradaban hancur. Jalanan dipenuhi reruntuhan, kobaran api, dan mayat hidup.
                        Di Garuda Survival Roleplay, setiap langkah adalah risiko. Setiap malam membawa teror baru.
                        Kamu tidak hanya bermain RP — kamu berjuang untuk tetap hidup.
                    </p>
                </div>

                <div class="about-box">
                    <div class="about-panel">
                        <h3>Lore Singkat</h3>
                        <p>
                            Setelah wabah mematikan menyapu wilayah Garuda, hanya sedikit manusia yang tersisa.
                            Sebagian bertahan sebagai survivor, sebagian berubah menjadi ancaman. Hukum lama tidak lagi berlaku.
                            Yang tersisa hanyalah insting, kekuatan, dan kemauan untuk bertahan.
                        </p>
                    </div>

                    <div class="about-panel">
                        <h3>Apa yang Menantimu</h3>
                        <div class="about-list">
                            <div>☣ Serangan zombie dan area berbahaya</div>
                            <div>🔫 Looting, defense, dan survival combat</div>
                            <div>🧰 Crafting, resource hunt, dan progres karakter</div>
                            <div>🛡 Faction, alliance, betrayal, dan story RP</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="fitur">
            <div class="container">
                <div class="section-head">
                    <h2>Fitur Utama Garuda Survival</h2>
                    <p>
                        Dibangun untuk pemain yang suka dunia roleplay dengan tekanan tinggi, atmosfer mencekam,
                        dan pengalaman survival yang lebih liar dari server biasa.
                    </p>
                </div>

                <div class="feature-grid">
                    <div class="card">
                        <div class="card-icon">☣</div>
                        <h3>Zombie Apocalypse Atmosphere</h3>
                        <p>
                            Rasakan dunia yang gelap dan kacau dengan ancaman zombie yang terus membayangi.
                            Setiap sudut kota bisa menjadi tempat kematianmu.
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-icon">🥫</div>
                        <h3>Hardcore Survival</h3>
                        <p>
                            Cari makanan, air, obat, amunisi, dan perlengkapan penting untuk bertahan.
                            Resource terbatas, keputusanmu menentukan nasib karakter.
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-icon">🔫</div>
                        <h3>Combat & Threat</h3>
                        <p>
                            Hadapi zombie, bandit, dan survivor lain dalam situasi yang menegangkan.
                            Dunia Garuda tidak mengenal belas kasihan.
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-icon">🛠</div>
                        <h3>Crafting & Progression</h3>
                        <p>
                            Kumpulkan material, bangun perlengkapan, dan tingkatkan peluang hidupmu melalui sistem survival
                            yang lebih dalam dan menantang.
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-icon">🏚</div>
                        <h3>Post-Apocalyptic Roleplay</h3>
                        <p>
                            Bangun cerita karaktermu di tengah kehancuran: survivor, scavenger, medic, raider, atau pemimpin
                            kelompok yang ingin menguasai wilayah.
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-icon">🦅</div>
                        <h3>Garuda Identity</h3>
                        <p>
                            Nuansa khas Garuda hadir lewat visual tegas, warna merah-emas, dan atmosfer panas yang brutal,
                            selaras dengan identitas server.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="join" class="cta">
            <div class="container">
                <div class="cta-box">
                    <div>
                        <h3>Siap Menjadi Survivor Sejati?</h3>
                        <p>
                            Bergabunglah ke <span class="glow">Garuda Survival Roleplay</span> sekarang juga.
                            Masuki dunia penuh wabah, bangun aliansi, rebut resource, dan buktikan bahwa kamu mampu
                            bertahan di akhir peradaban.
                        </p>
                    </div>

                    <div class="hero-actions">
                        <a href="https://servers.fivem.net/servers/detail/pbj7b8" class="btn btn-primary">Join Game</a>
                        <a href="https://discord.gg/uabbUg83Dd" target="_blank" class="btn btn-discord">Join Discord</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container footer-inner">
            <div>© 2026 Garuda Survival Roleplay. All rights reserved.</div>
            <div>FiveM GTA V Roleplay • Zombie Survival • Post Apocalypse</div>
        </div>
    </footer>

</body>
</html>