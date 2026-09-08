# 🎨 Design System & UI/UX Blueprint — Electric Blue Edition

> **Dokumen Panduan Desain, Animasi, & Arsitektur UI/UX**  
> Dibuat sebagai blueprint resmi implementasi website bernuansa **Electric Blue & Deep Navy** untuk stack **Laravel 13 & PHP 8.4** (Tailwind CSS, Blade Components, Alpine.js, & Vite).

---

## 1. 🌌 Filosofi Desain: *Deep Space & Electric Blue*

Konsep visual mengusung estetika **Futuristic SaaS & Cyber-Studio** dengan dominasi warna **Electric Blue / Sapphire Neon**:
- **Deep Navy Obsidian Background:** Latar belakang gelap bernuansa luar angkasa (`#030712`, `#010409`, `#0b1324`), memberikan kontras tinggi terhadap elemen neon tanpa membuat mata lelah.
- **Electric Blue & Cyan Glows:** Aksen utama biru elektrik (`#3b82f6`, `rgb(59, 130, 246)`) dipadukan dengan sentuhan cyan (`#06b6d4`) untuk efek radial aura, border bercahaya (*neon border*), dan tombol berpendar (*glowing CTA*).
- **Glassmorphism & Crisp Precision:** Panel semi-transparan dengan border tipis `rgba(59, 130, 246, 0.22)` dan blur backdrop (`backdrop-blur-md`).
- **Dual Typography:**
  - **Body & Headlines:** `Inter` (bersih, proporsional, readability tinggi).
  - **Meta, Badges, Prompts, & Numbers:** `JetBrains Mono` (industrial vibe, mono tabular-nums).

---

## 2. 🎨 Token Warna & Variabel CSS (Electric Blue Palette)

### 2.1 CSS Variables (`resources/css/app.css`)

```css
/* ═══════════════════════ DARK THEME (DEFAULT / LANDING) ═══════════════════════ */
:root, :root.theme-dark {
  --bg:            #030712;  /* Slate 950 / Deep Space */
  --bg-deep:       #010409;  /* Background input & inner terminal */
  --bg-panel:      #0b1324;  /* Card & container navy */
  --bg-elev:       #111d38;  /* Hover / dropdown item */
  --border:        rgba(59, 130, 246, 0.22);
  --border-strong: rgba(59, 130, 246, 0.48);
  --text:          #f0f6fc;  /* Ice White */
  --text-muted:    #94a3b8;  /* Muted Slate */
  --text-dim:      #64748b;  /* Dim Slate / Placeholder */
  --accent-rgb:    59, 130, 246;
  --accent:        #3b82f6;  /* Electric Blue */
  --accent-hover:  #60a5fa;  /* Sky Glow Blue */
  --accent-soft:   rgba(59, 130, 246, 0.18);
  --accent-deep:   #1d4ed8;  /* Royal Deep Blue */
  --accent-cyan:   #06b6d4;  /* Cyan highlight */
  --shadow-strong: 0 10px 40px -8px rgba(37, 99, 235, 0.45);
  color-scheme: dark;
}

/* ═══════════════════════ LIGHT THEME (STUDIO TOGGLE) ═══════════════════════ */
:root.theme-light {
  --bg:            #f8fafc;
  --bg-deep:       #f1f5f9;
  --bg-panel:      #ffffff;
  --bg-elev:       #e2e8f0;
  --border:        rgba(37, 99, 235, 0.18);
  --border-strong: rgba(37, 99, 235, 0.40);
  --text:          #0f172a;
  --text-muted:    #475569;
  --text-dim:      #94a3b8;
  --accent-rgb:    37, 99, 235;
  --accent:        #2563eb;  /* Cobalt Blue */
  --accent-hover:  #1d4ed8;
  --accent-soft:   rgba(37, 99, 235, 0.12);
  --accent-deep:   #1e40af;
  --accent-cyan:   #0891b2;
  --shadow-strong: 0 10px 40px -8px rgba(15, 23, 42, 0.12);
  color-scheme: light;
}

/* Ambient Blue Ambient Glow */
.theme-dark body::before {
  content: '';
  position: fixed;
  inset: 0;
  pointer-events: none;
  background:
    radial-gradient(900px circle at 15% 0%, rgba(59, 130, 246, 0.08), transparent 50%),
    radial-gradient(900px circle at 85% 100%, rgba(6, 182, 212, 0.06), transparent 50%);
  z-index: 0;
}
```

---

## 3. 📐 Konfigurasi Tailwind CSS (`tailwind.config.js`)

```javascript
/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        bg:         'var(--bg)',
        'bg-panel': 'var(--bg-panel)',
        'bg-elev':  'var(--bg-elev)',
        'bg-deep':  'var(--bg-deep)',
        border:     'var(--border)',
        'border-strong': 'var(--border-strong)',
        text:       'var(--text)',
        'text-mut': 'var(--text-muted)',
        'text-dim': 'var(--text-dim)',
        accent:     'var(--accent)',
        'accent-h': 'var(--accent-hover)',
        'accent-sm':'var(--accent-soft)',
        'accent-d': 'var(--accent-deep)',
        cyan:       'var(--accent-cyan)',
      },
      fontFamily: {
        sans: ['Inter', 'system-ui', 'sans-serif'],
        mono: ['"JetBrains Mono"', 'Consolas', 'monospace'],
      },
      boxShadow: {
        'panel': '0 4px 20px -4px rgba(0,0,0,0.35)',
        'glow':  '0 0 20px var(--accent-soft)',
        'glow-strong': '0 0 32px var(--accent), 0 0 60px var(--accent-soft)',
      },
      animation: {
        'fade-in':    'fade-in 0.3s ease-out both',
        'slide-up':   'slide-up 0.35s cubic-bezier(0.16,1,0.3,1) both',
        'float-slow': 'float-y 5s ease-in-out infinite',
      },
      keyframes: {
        'fade-in':  { '0%': { opacity: 0 }, '100%': { opacity: 1 } },
        'slide-up': { '0%': { transform: 'translateY(20px)', opacity: 0 }, '100%': { transform: 'translateY(0)', opacity: 1 } },
        'float-y':  { '0%,100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-8px)' } },
      },
    },
  },
  plugins: [],
};
```

---

## 4. 📐 Cara Membangun Struktur Layout UI/UX

### 4.1 Prinsip Grid & Flexbox Responsif
1. **Container Max-Width & Padding:**  
   Gunakan container terpusat dengan padding dinamis:  
   `max-w-7xl mx-auto px-4 sm:px-6 lg:px-8`.
2. **Visual Hierarchy (F-Pattern & Z-Pattern):**
   - **Landing Page (Z-Pattern):** Dimulai dari Navbar (Logo kiri -> CTA kanan) -> Hero Headline & Mockup tengah -> Fitur berselang-seling -> Pricing Cards -> Final Action CTA.
   - **Studio Workspace (F-Pattern):** Navigasi vertikal kiri (Sidebar) -> Form konfigurasi di kolom tengah -> Live Output Prompt & Action button di kolom kanan.

```
┌────────────────────────────────────────────────────────────────────────────────────────┐
│ TOP BAR: [Logo Brand] [Dropdown Mode] [Tutorial Video] [Theme Toggle] [User Menu]      │
├─────────┬───────────────────────────────────────────┬──────────────────────────────────┤
│ SIDEBAR │ KOLOM TENGAH (FORM CONTROLS)              │ KOLOM KANAN (PREVIEW & PROMPT)   │
│ (Icon   │ • Mode Header & Quick Presets             │ • Realtime Codeblock Display     │
│  Nav)   │ • Section Card 1: Informasi Produk        │ • Primary CTA "Copy Prompt"      │
│         │ • Section Card 2: Visual Style & Warna    │ • External Link "Open ChatGPT"   │
│         │ • Section Card 3: Aspect Ratio Selector   │ • History Logs & Prompt Variants │
├─────────┴───────────────────────────────────────────┴──────────────────────────────────┤
│ STATUS BAR: Mode Aktif | Status Koneksi | Counter Karakter Prompt                      │
└────────────────────────────────────────────────────────────────────────────────────────┘
```

---

## 5. ✨ Desain Animasi & Micro-Interactions (Lengkap dengan CSS)

Berikut adalah kumpulan animasi CSS yang dapat Anda tempelkan pada `resources/css/app.css`:

### 5.1 Infinite Marquee (Ticker Logo & Desain Berjalan)

Digunakan untuk menampilkan logo klien, feed iklan, atau testimoni yang bergerak terus-menerus tanpa jeda.

```css
/* Keyframes Horizontal Marquee */
@keyframes marquee-x {
  from { transform: translateX(0); }
  to   { transform: translateX(-50%); }
}
@keyframes marquee-x-rev {
  from { transform: translateX(-50%); }
  to   { transform: translateX(0); }
}

.marquee-track {
  display: flex;
  width: max-content;
  will-change: transform;
}
.marquee-slow   { animation: marquee-x 48s linear infinite; }
.marquee-medium { animation: marquee-x 30s linear infinite; }
.marquee-fast   { animation: marquee-x 18s linear infinite; }
.marquee-rev    { animation: marquee-x-rev 35s linear infinite; }

/* Pause on Hover */
.marquee-pause:hover .marquee-track {
  animation-play-state: paused;
}

/* Edge Fade Mask (Gradasi transparan di sisi kiri & kanan) */
.marquee-mask {
  -webkit-mask-image: linear-gradient(90deg, transparent 0%, #000 8%, #000 92%, transparent 100%);
          mask-image: linear-gradient(90deg, transparent 0%, #000 8%, #000 92%, transparent 100%);
}
```

**Cara Pasang di Blade:**
```blade
<div class="overflow-hidden marquee-mask marquee-pause py-4">
    <div class="marquee-track marquee-medium gap-6">
        <!-- Gandakan item 2x agar animasi loop seamless -->
        @foreach(array_merge($items, $items) as $item)
            <div class="surface p-4 w-64 shrink-0">{{ $item->title }}</div>
        @endforeach
    </div>
</div>
```

---

### 5.2 Animated Neon Shimmer Border

Border kartu dengan garis gradien bercahaya yang berputar mengelilingi kartu.

```css
@keyframes border-shimmer {
  0%   { background-position: 0% 50%; }
  100% { background-position: 200% 50%; }
}

.neon-border {
  position: relative;
  border-radius: 1rem;
  background: var(--bg-panel);
}
.neon-border::before {
  content: '';
  position: absolute;
  inset: -1px;
  border-radius: inherit;
  padding: 1px;
  background: linear-gradient(120deg,
    rgba(59, 130, 246, 0.65),
    rgba(6, 182, 212, 0.20) 30%,
    rgba(59, 130, 246, 0.85) 55%,
    rgba(6, 182, 212, 0.15) 80%,
    rgba(59, 130, 246, 0.65));
  background-size: 220% 220%;
  -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
          mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
  -webkit-mask-composite: xor;
          mask-composite: exclude;
  animation: border-shimmer 6s linear infinite;
  pointer-events: none;
}
```

---

### 5.3 Glowing Shimmer CTA Button

Tombol CTA dengan refleksi cahaya diagonal saat di-hover dan efek drop-shadow pendar biru.

```css
.btn-cta {
  position: relative;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.6rem;
  padding: 0.95rem 1.6rem;
  border-radius: 0.75rem;
  background: linear-gradient(180deg, var(--accent-hover) 0%, var(--accent-deep) 100%);
  color: #ffffff;
  font-weight: 700;
  font-size: 0.95rem;
  letter-spacing: 0.01em;
  border: 1px solid rgba(255, 255, 255, 0.18);
  box-shadow:
    0 12px 28px -8px rgba(var(--accent-rgb), 0.55),
    0 0 0 1px rgba(var(--accent-rgb), 0.25),
    inset 0 1px 0 rgba(255, 255, 255, 0.22);
  transition: transform 0.15s ease, box-shadow 0.2s ease, filter 0.2s ease;
  overflow: hidden;
}
.btn-cta::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(120deg, transparent 30%, rgba(255, 255, 255, 0.3) 50%, transparent 70%);
  transform: translateX(-120%);
  transition: transform 0.8s ease;
}
.btn-cta:hover {
  transform: translateY(-2px);
  filter: brightness(1.1);
  box-shadow:
    0 18px 36px -8px rgba(var(--accent-rgb), 0.70),
    0 0 0 1px rgba(var(--accent-rgb), 0.40);
}
.btn-cta:hover::after {
  transform: translateX(120%);
}
```

---

### 5.4 Pulse Attention Badge & Radar Ring

Badge menyala untuk menarik fokus mata user ke item penting (misal: "NEW", "POPULER", "MULAI DI SINI").

```css
@keyframes badge-attention {
  0%, 100% {
    box-shadow: 0 0 0 0 rgba(var(--accent-rgb), 0.55), 0 2px 8px rgba(var(--accent-rgb), 0.30);
    transform: scale(1);
  }
  50% {
    box-shadow: 0 0 0 7px rgba(var(--accent-rgb), 0), 0 2px 14px rgba(var(--accent-rgb), 0.55);
    transform: scale(1.05);
  }
}
.chip-attention {
  background: var(--accent) !important;
  color: #fff !important;
  font-weight: 700 !important;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  font-size: 0.625rem !important;
  animation: badge-attention 1.5s ease-in-out infinite;
}

/* Radar Ping Ring */
@keyframes pulse-ring {
  0%   { transform: scale(0.85); opacity: 0.8; }
  100% { transform: scale(1.7);  opacity: 0; }
}
.ping-ring {
  position: absolute;
  inset: 0;
  border-radius: inherit;
  border: 1px solid var(--accent);
  animation: pulse-ring 2.4s cubic-bezier(0, 0, 0.2, 1) infinite;
  pointer-events: none;
}
```

---

### 5.5 Floating Card Effect & Grid Backgrounds

```css
/* Melayang halus naik-turun */
@keyframes float-y {
  0%, 100% { transform: translateY(0); }
  50%      { transform: translateY(-8px); }
}
.float-slow {
  animation: float-y 5s ease-in-out infinite;
}

/* Cyber Grid Lines */
.grid-bg {
  background-image:
    linear-gradient(rgba(59, 130, 246, 0.07) 1px, transparent 1px),
    linear-gradient(90deg, rgba(59, 130, 246, 0.07) 1px, transparent 1px);
  background-size: 56px 56px;
  background-position: -1px -1px;
}
.grid-bg-fade {
  -webkit-mask-image: radial-gradient(ellipse at center, #000 30%, transparent 80%);
          mask-image: radial-gradient(ellipse at center, #000 30%, transparent 80%);
}

/* Aksesibilitas: Matikan animasi bila user menyetel reduce motion */
@media (prefers-reduced-motion: reduce) {
  .marquee-track,
  .float-slow,
  .ping-ring,
  .neon-border::before,
  .chip-attention {
    animation: none !important;
  }
}
```

---

## 6. 🛠️ Contoh Kode Implementasi Lengkap (Laravel 13 Blade + Alpine.js)

### 6.1 Master Layout (`resources/views/layouts/app.blade.php`)

```blade
<!DOCTYPE html>
<html lang="id" class="theme-dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Auto Feeds Studio — Electric Blue' }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-bg text-text font-sans antialiased min-h-screen relative overflow-x-clip selection:bg-accent-sm selection:text-text">
    {{ $slot }}
</body>
</html>
```

---

### 6.2 Studio Workspace Component (`resources/views/studio/index.blade.php`)

```blade
<x-app-layout title="AI Design Studio">
    <div x-data="studioWorkspace()" class="flex flex-col h-screen overflow-hidden bg-bg">
        
        <!-- TOPBAR -->
        <header class="h-14 border-b border-border bg-bg-panel px-4 flex items-center justify-between z-10">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-accent flex items-center justify-center text-white font-black shadow-glow">
                    F
                </div>
                <span class="font-bold text-sm tracking-wide">AUTO FEEDS <span class="text-accent">AI</span></span>
                <span class="chip-attention px-2 py-0.5 rounded-full text-[10px]">PRO</span>
            </div>

            <div class="flex items-center gap-2">
                <button class="btn-ghost text-xs py-1.5 px-3">
                    <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Video Tutorial
                </button>
            </div>
        </header>

        <!-- WORKSPACE AREA -->
        <div class="flex flex-1 overflow-hidden">
            
            <!-- 1. LEFT SIDEBAR NAVIGATION -->
            <aside class="w-16 bg-bg-panel border-r border-border flex flex-col items-center py-4 gap-3">
                <template x-for="mode in modes" :key="mode.id">
                    <button 
                        @click="activeMode = mode.id"
                        :data-active="activeMode === mode.id"
                        class="side-btn group relative"
                        :title="mode.name"
                    >
                        <div x-html="mode.svgIcon"></div>
                        <!-- Tooltip -->
                        <span class="absolute left-16 bg-bg-elev border border-border px-2 py-1 rounded text-xs whitespace-nowrap opacity-0 pointer-events-none group-hover:opacity-100 transition-opacity z-50 shadow-panel" x-text="mode.name"></span>
                    </button>
                </template>
            </aside>

            <!-- 2. CENTER CONFIGURATION PANEL -->
            <main class="flex-1 overflow-y-auto p-6 space-y-6">
                <div class="max-w-3xl mx-auto space-y-6">
                    
                    <!-- Mode Header Card -->
                    <div class="surface p-6 relative overflow-hidden">
                        <div class="flex items-center justify-between mb-2">
                            <span class="section-num text-xs text-accent font-mono tracking-wider">// MODE AKTIF</span>
                            <button @click="loadPreset()" class="btn-ghost text-xs py-1 px-2.5">
                                ⚡ Load Demo Data
                            </button>
                        </div>
                        <h1 class="text-2xl font-black text-text" x-text="currentMode.name"></h1>
                        <p class="text-sm text-text-mut mt-1" x-text="currentMode.desc"></p>
                    </div>

                    <!-- Dynamic Input Card -->
                    <div class="neon-border p-6 space-y-4">
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-text-mut mb-1.5">
                                Nama Produk / Campaign
                            </label>
                            <input type="text" x-model="formData.productName" class="input" placeholder="Contoh: Sonic Wireless Headphone">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold uppercase tracking-wider text-text-mut mb-1.5">
                                    Niche / Kategori
                                </label>
                                <select x-model="formData.category" class="select">
                                    <option value="gadget">Tech & Gadget</option>
                                    <option value="fashion">Fashion & Streetwear</option>
                                    <option value="fnb">Food & Coffee</option>
                                    <option value="skincare">Beauty & Skincare</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold uppercase tracking-wider text-text-mut mb-1.5">
                                    Visual Tone / Mood
                                </label>
                                <select x-model="formData.tone" class="select">
                                    <option value="cyberpunk">Cyberpunk & Neon Blue</option>
                                    <option value="minimalist">Clean Studio Minimalist</option>
                                    <option value="luxury">Dark Premium Luxury</option>
                                    <option value="energetic">Vibrant & High Energy</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-text-mut mb-1.5">
                                Key Benefits / Tagline Promo
                            </label>
                            <textarea x-model="formData.tagline" rows="3" class="input" placeholder="Misal: Active Noise Cancelling 45dB, Baterai 60 Jam, Diskon 50% Khusus Hari Ini"></textarea>
                        </div>
                    </div>
                </div>
            </main>

            <!-- 3. RIGHT PROMPT OUTPUT PANEL -->
            <section class="w-96 bg-bg-panel border-l border-border flex flex-col p-4">
                <div class="flex items-center justify-between pb-3 border-b border-border">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-accent animate-ping"></span>
                        <span class="text-xs font-mono font-bold text-accent uppercase">Live Visual Prompt</span>
                    </div>
                    <button 
                        @click="copyToClipboard()"
                        class="btn-cta text-xs py-1.5 px-3"
                    >
                        <span x-text="copied ? '✓ Tersalin!' : 'Copy Prompt'"></span>
                    </button>
                </div>

                <!-- Codeblock Area -->
                <div class="flex-1 my-4 overflow-y-auto codeblock text-xs leading-relaxed select-all">
                    <span class="text-accent font-mono font-bold">// Midjourney / ChatGPT Prompt:</span><br><br>
                    <span class="text-text" x-text="finalPrompt"></span>
                </div>

                <!-- Action Button Footers -->
                <div class="pt-3 border-t border-border flex flex-col gap-2">
                    <a :href="'https://chatgpt.com/?q=' + encodeURIComponent(finalPrompt)" target="_blank" class="btn-ghost w-full justify-center text-xs">
                        🚀 Buka di ChatGPT
                    </a>
                </div>
            </section>
        </div>

        <!-- STATUS BAR -->
        <footer class="h-7 border-t border-border bg-bg-deep px-4 flex items-center justify-between text-[11px] text-text-dim font-mono">
            <div>MODE: <span class="text-text" x-text="currentMode.name"></span></div>
            <div>LENGTH: <span class="text-accent" x-text="finalPrompt.length + ' chars'"></span></div>
            <div>STATUS: <span class="text-emerald-400">● READY</span></div>
        </footer>
    </div>

    <!-- Alpine.js Reactive Logic -->
    <script>
        function studioWorkspace() {
            return {
                activeMode: 'banner',
                copied: false,
                formData: {
                    productName: '',
                    category: 'gadget',
                    tone: 'cyberpunk',
                    tagline: ''
                },
                modes: [
                    { 
                        id: 'banner', 
                        name: 'Design Feeds', 
                        desc: 'Isi detail produk untuk menghasilkan prompt desain feed iklan profesional.',
                        svgIcon: `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>`
                    },
                    { 
                        id: 'carousel', 
                        name: 'Carousel Multi-Slide', 
                        desc: 'Menyusun alur story, hook, dan layout multi-slide carousel Instagram.',
                        svgIcon: `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>`
                    },
                    { 
                        id: 'grid', 
                        name: '9 Feed Konsisten', 
                        desc: 'Konsep 9 kotak grid feed harmonis untuk satu campaign produk.',
                        svgIcon: `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>`
                    }
                ],
                get currentMode() {
                    return this.modes.find(m => m.id === this.activeMode) || this.modes[0];
                },
                get finalPrompt() {
                    const prod = this.formData.productName || 'Modern Commercial Product';
                    const tag  = this.formData.tagline ? ` featuring headline "${this.formData.tagline}"` : '';
                    return `Create a high-end commercial ${this.formData.category} visual advertisement for "${prod}"${tag}. Aesthetic: ${this.formData.tone}, electric sapphire blue lighting accents, volumetric glow, octane render 8k, photorealistic studio depth of field, ultra-sharp details --ar 1:1 --v 6.0`;
                },
                loadPreset() {
                    this.formData.productName = 'CyberPod Pro Wireless';
                    this.formData.category    = 'gadget';
                    this.formData.tone        = 'cyberpunk';
                    this.formData.tagline     = 'Pure Sound. Zero Noise. 60H Battery.';
                },
                copyToClipboard() {
                    navigator.clipboard.writeText(this.finalPrompt);
                    this.copied = true;
                    setTimeout(() => this.copied = false, 2500);
                }
            }
        }
    </script>
</x-app-layout>
```

---

## 7. 🚀 Ringkasan Cara Kerja & Langkah Pengembangan

1. **Instalasi Laravel 13 & Vite:**
   ```bash
   composer create-project laravel/laravel my-studio-app
   npm install -D tailwindcss postcss autoprefixer
   npx tailwindcss init -p
   npm install alpinejs
   ```
2. **Salin File Konfigurasi:**
   - Salin isi `tailwind.config.js` dari Bab 3.
   - Salin isi `resources/css/app.css` dari Bab 2 & 5 (Token warna Biru & Animasi).
3. **Bangun Komponen & Controller:**
   - Buat Controller `StudioController.php` untuk merender view.
   - Buat layout `app.blade.php` dan file view `studio/index.blade.php`.
4. **Jalankan Aplikasi:**
   ```bash
   npm run dev
   php artisan serve
   ```
