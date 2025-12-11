<!doctype html>
<html lang="en" x-data="availabilityApp()">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Check Availability — Bali Dream House Villa</title>

  <!-- Tailwind CDN (for quick prototype). Replace with compiled assets in production -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Alpine.js for reactivity -->
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <link rel="stylesheet" href="{{ asset('css/landing.css') }}">

  <style>
    /* HERO + NAVBAR + CARD styling */

    .nav-links { list-style:none; display:flex; gap:22px; align-items:center; margin:0; padding:0; }
    .nav-links a { color: #fff; font-weight:600; }
    .login-btn {
      background:#ffb84d;
      color:#111;
      padding:8px 12px;
      border-radius:10px;
      text-decoration:none;
      font-weight:700;
      box-shadow: 0 6px 18px rgba(0,0,0,0.18);
    }

    .hero-availability { min-height: 520px; display:flex; align-items:center; position:relative; }
    .hero-availability .overlay { position:absolute; inset:0; background:linear-gradient(180deg, rgba(0,0,0,0.45), rgba(0,0,0,0.55)); z-index:10; }

    /* Card centered above hero */
    main#check {
      display:flex;
      justify-content:center;
      position:relative;
      z-index:40;
      margin-top:-200px;
      padding: 0 1rem;
    }
    @media (max-width:640px){
      main#check { margin-top:-120px; }
    }

    .glass {
      background: rgba(255,255,255,0.96);
      backdrop-filter: blur(6px);
      border-radius: 18px;
      overflow: visible;
      box-shadow: 0 30px 70px rgba(2,6,23,0.45);
      transform-origin: center;
      animation: cardEntrance .7s cubic-bezier(.2,.9,.2,1);
      border: 1px solid rgba(17,24,39,0.06);
    }
    @keyframes cardEntrance {
      from { opacity: 0; transform: translateY(20px) scale(.995); }
      to   { opacity: 1; transform: translateY(0) scale(1); }
    }

    /* calendar cells */
    .date-cell { height: 3.6rem; width: 3.6rem; }
    .date-cell span { transition: transform .18s ease, color .12s ease; display:block; }
    .date-cell:hover { transform: translateY(-6px); box-shadow: 0 12px 28px rgba(2,6,23,0.09); }

    /* range visuals */
    .in-range { background: rgba(255,203,109,0.14); }
    .range-start, .range-end { background: rgba(255,222,173,0.95); box-shadow: 0 6px 18px rgba(255,184,77,0.12); border-radius:8px; }
    .range-start span, .range-end span { font-weight:700; color:#0b1220; }
    .dot { transition: transform .18s ease, opacity .18s ease; }

    /* misc */
    .legend-dot { width:10px;height:10px;border-radius:50%;display:inline-block; }
    .selected-badge { color:#0f172a; font-weight:700; }
  </style>
</head>
<body class="min-h-screen bg-gray-50 font-sans text-slate-800">

  <!-- NAVBAR -->
<header>
<nav class="navbar max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
<div class="flex items-center gap-4">
<div class="logo">
<img src="{{ asset('images/logo.png') }}" alt="Villa Bali Logo" style="width:52px;height:52px;object-fit:contain;">
</div>
<div>
<div class="text-white font-bold">Villa Bali</div>
<div class="text-xs text-white/80">Dream House Villa</div>
</div>
</div>


<ul class="nav-links">
<li><a href="{{ route('landing') }}" class="text-white hover:underline">Home</a></li>
<li><a href="#about" class="text-white hover:underline">About</a></li>
<li><a href="#about" class="text-white hover:underline">availability</a></li>
<li><a href="#contact" class="text-white hover:underline">Contact</a></li>


@guest
<li><a href="{{ route('login') }}" class="login-btn">Login</a></li>
@endguest


@auth
<li class="profile-menu-wrapper" style="position:relative;">
<button type="button" class="profile-toggle" onclick="toggleProfileMenu()" aria-expanded="false" aria-controls="profileDropdown" style="background:none;border:0;padding:0;cursor:pointer;">
<img
src="{{ auth()->user()->profile_photo
? asset('profile_photos/' . auth()->user()->profile_photo)
: asset('images/default_avatar.jpg') }}"
alt="profile" style="width:36px;height:36px;border-radius:50%;object-fit:cover;border:2px solid rgba(0,0,0,0.08);">
</button>


<div id="profileDropdown" class="profile-dropdown" role="menu" aria-hidden="true" style="display:none;position:absolute;right:0;top:46px;background:white;border-radius:8px;box-shadow:0 6px 18px rgba(0,0,0,0.12);width:220px;">
<div class="profile-header p-3 border-b">
<img src="{{ auth()->user()->profile_photo
? asset('profile_photos/' . auth()->user()->profile_photo)
: asset('images/default_avatar.jpg') }}"
alt="avatar" class="mini-avatar" style="width:48px;height:48px;border-radius:50%;object-fit:cover;float:left;margin-right:10px;">
<div style="padding-top:6px;">
<div style="font-weight:600;">Hi, {{ auth()->user()->name }}</div>
<div style="font-size:12px;color:#6b7280;">{{ auth()->user()->email }}</div>
</div>
</div>


<a href="{{ route('profile') }}" class="dropdown-item block px-4 py-2 text-sm hover:bg-gray-50">View Profile</a>
<a href="{{ route('pembayarans.index') }}" class="dropdown-item block px-4 py-2 text-sm hover:bg-gray-50">Payment History</a>


<form action="{{ route('logout') }}" method="POST" style="margin:0;">
@csrf
<button type="submit" class="dropdown-item logout-btn w-full text-left px-4 py-2 text-sm hover:bg-gray-50">Logout</button>
</form>
</div>
</li>
@endauth
</ul>
</nav>
</header>

<br>
<br>
<br> 
<!-- HERO (landing-style background only) -->
<section class="hero-availability relative bg-cover bg-center flex items-center justify-center"
style="background-image: url('{{ asset('images/header1.jpg') }}'); min-height:100vh; width:100%;"



  <main id="check" class="mb-12 flex justify-center mt-24 pt-20">
    <div class="w-full max-w-3xl px-4">
      <div class="glass p-8">
        <h1 class="text-3xl font-serif text-center">Check Availability</h1>
        <p class="text-center text-gray-600 mt-1">Pick your check-in and check-out dates</p>

        <form class="mt-6 grid gap-4" x-init="init()">
          <div>
            <label class="block text-sm font-medium text-gray-700">Select Villa</label>
            <select x-model="selectedVilla" class="mt-1 block w-full rounded-md border-gray-200 shadow-sm px-3 py-2">
              <template x-for="v in villas" :key="v.id">
                <option :value="v.id" x-text="v.name"></option>
              </template>
            </select>
          </div>

          <!-- CHECK-IN / CHECK-OUT -->
          <div class="flex gap-3">
            <div class="flex-1">
              <label class="block text-sm font-medium text-gray-700">Check-in</label>
              <div class="mt-1 rounded-md border border-gray-200 p-3 bg-white shadow-sm">
                <div class="flex items-center justify-between">
                  <div class="text-sm text-gray-700" x-text="selectedStartDisplay ?? 'Select check-in'"></div>
                  <button type="button" @click.prevent="clearRange" class="text-xs text-gray-500 hover:underline">Clear</button>
                </div>
              </div>
            </div>

            <div class="w-44">
              <label class="block text-sm font-medium text-gray-700">Check-out</label>
              <div class="mt-1 rounded-md border border-gray-200 p-3 bg-white shadow-sm text-sm text-gray-700" x-text="selectedEndDisplay ?? 'Select check-out'"></div>
            </div>

            <div class="w-36">
              <label class="block text-sm font-medium text-gray-700">Guests</label>
              <input type="number" min="1" x-model.number="guests" class="mt-1 block w-full rounded-md border-gray-200 shadow-sm px-2 py-1" />
            </div>
          </div>

          <!-- Calendar -->
          <div class="mt-3">
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-3">
                <button type="button" @click="prevMonth" class="p-2 rounded-md hover:bg-gray-100 transition">&lt;</button>
                <div class="font-medium text-gray-700" x-text="months[viewMonth] + ' ' + viewYear"></div>
                <button type="button" @click="nextMonth" class="p-2 rounded-md hover:bg-gray-100 transition">&gt;</button>
              </div>

              <div class="flex items-center gap-2">
                <select x-model.number="viewYear" @change="regenerate()" class="rounded-md border-gray-200 p-1">
                  <template x-for="y in years" :key="y">
                    <option :value="y" x-text="y"></option>
                  </template>
                </select>
                <select x-model.number="viewMonth" @change="regenerate()" class="rounded-md border-gray-200 p-1">
                  <template x-for="(m, idx) in months" :key="idx">
                    <option :value="idx" x-text="m"></option>
                  </template>
                </select>
              </div>
            </div>

            <div class="mt-4 bg-white rounded-lg p-6 shadow">
              <div class="grid grid-cols-7 gap-2 text-center text-xs text-gray-500">
                <template x-for="d in weekdayShort" :key="d"><div x-text="d" class="font-semibold"></div></template>
              </div>

              <div class="grid grid-cols-7 gap-3 mt-4">
                <template x-for="cell in calendar" :key="cell.key">
                  <div class="flex items-center justify-center">
                    <!-- button: changed classes to support range highlight -->
                    <button
                      :class="[
                        'date-cell rounded-md flex items-center justify-center transition-all duration-200',
                        !cell.inMonth ? 'opacity-30' : '',
                        isBooked(cell.date) ? 'opacity-40 cursor-not-allowed' : 'cursor-pointer',
                        isStart(cell.date) ? 'range-start' : '',
                        isEnd(cell.date) ? 'range-end' : '',
                        isInRange(cell.date) ? 'in-range' : ''
                      ]"
                      :disabled="!cell.inMonth || isBooked(cell.date)"
                      @click="selectDate(cell.date)"
                    >
                      <div class="relative text-center">
                        <span :class="{'text-gray-800 font-semibold': isStart(cell.date) || isEnd(cell.date), 'text-gray-600': !(isStart(cell.date) || isEnd(cell.date)) }" x-text="cell.day"></span>
                        <span class="dot absolute -bottom-2 left-1/2 -translate-x-1/2 w-2 h-2 rounded-full" :class="isBooked(cell.date) ? 'bg-red-500' : 'bg-green-400'"></span>
                      </div>
                    </button>
                  </div>
                </template>
              </div>

              <div class="mt-5 text-sm text-gray-600 flex items-center gap-4">
                <div class="flex items-center gap-2"><span class="legend-dot bg-green-400"></span> Available</div>
                <div class="flex items-center gap-2"><span class="legend-dot bg-red-500"></span> Unavailable</div>
                <div class="ml-auto text-right text-xs text-gray-500">Selected: <span class="selected-badge" x-text="selectedStartDisplay ? (selectedStartDisplay + (selectedEndDisplay ? ' → ' + selectedEndDisplay : '')) : '—'"></span></div>
              </div>

              <div class="mt-6">
                <button type="button" @click.prevent="reserve()" class="w-full py-3 rounded-md bg-slate-900 text-white hover:opacity-95 transition">Reserve Now</button>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </main>
</section>

  <!-- Main card (calendar) - centered -->
 

  <!-- Footer -->
  <footer class="bg-white/90 border-t mt-12">
    <div class="max-w-7xl mx-auto px-6 py-10 grid md:grid-cols-2 gap-6">
      <div>
        <h3 class="text-lg font-semibold">Contact</h3>
        <p>Phone: +62 819 9390 0319</p>
        <p>Email: bali@dreamhousevilla.net</p>
      </div>
      <div>
        <h3 class="text-lg font-semibold">About</h3>
        <p>Bali Dream House Villa brings a blend of nature and comfort. Enjoy breathtaking sunsets, lush gardens, and traditional Balinese hospitality.</p>
      </div>
    </div>
    <div class="text-center py-4 text-sm text-gray-600">©2025 Bali Dream House Villa</div>
  </footer>

  <!-- Alpine app -->
  <script>
    function availabilityApp(){
      return {
        // data dari PHP (fallback)
        villas: {!! json_encode($villas ?? [
          ['id' => 1, 'name' => 'Bali Dream House Villa 1'],
          ['id' => 2, 'name' => 'Bali Dream House Villa 2'],
        ]) !!},

        // bookingsMap: object keyed by villa id -> array of 'YYYY-MM-DD'
        bookingsMap: {!! json_encode($bookingsMap ?? [
          1 => ['2025-11-03','2025-11-04','2025-11-23'],
          2 => ['2025-11-10']
        ]) !!},

        selectedVilla: {!! json_encode(old('villa_id') ?? ($villas[0]['id'] ?? 1)) !!},

        // range state
        selectedStart: null,
        selectedEnd: null,
        selectedStartDisplay: null,
        selectedEndDisplay: null,

        guests: 2,

        // view state
        viewMonth: (new Date()).getMonth(),
        viewYear: (new Date()).getFullYear(),

        months: ['January','February','March','April','May','June','July','August','September','October','November','December'],
        weekdayShort: ['Su','Mo','Tu','We','Th','Fr','Sa'],
        years: (() => { let y=[]; const cur=new Date().getFullYear(); for(let i=cur-5;i<=cur+5;i++) y.push(i); return y })(),

        calendar: [],

        init(){
          this.regenerate();
        },

        toKey(date){
          const y = date.getFullYear();
          const m = String(date.getMonth()+1).padStart(2,'0');
          const d = String(date.getDate()).padStart(2,'0');
          return `${y}-${m}-${d}`;
        },

        isBooked(date){
          const key = this.toKey(date);
          const arr = this.bookingsMap[this.selectedVilla] || [];
          return arr.includes(key);
        },

        isSameDate(a,b){
          if(!a || !b) return false;
          return a.getFullYear()===b.getFullYear() && a.getMonth()===b.getMonth() && a.getDate()===b.getDate();
        },

        // range helpers
        isStart(date){ return this.selectedStart && this.isSameDate(date, this.selectedStart); },
        isEnd(date){ return this.selectedEnd && this.isSameDate(date, this.selectedEnd); },
        isInRange(date){
          if(!this.selectedStart || !this.selectedEnd) return false;
          const t = new Date(date.getFullYear(), date.getMonth(), date.getDate()).getTime();
          const s = new Date(this.selectedStart.getFullYear(), this.selectedStart.getMonth(), this.selectedStart.getDate()).getTime();
          const e = new Date(this.selectedEnd.getFullYear(), this.selectedEnd.getMonth(), this.selectedEnd.getDate()).getTime();
          return t > s && t < e;
        },

        selectDate(date){
          if(this.isBooked(date)) return;

          // if no start => set start
          if(!this.selectedStart){
            this.selectedStart = date;
            this.selectedEnd = null;
            this.selectedStartDisplay = date.toLocaleDateString('en-GB', { day: '2-digit', month: 'long', year: 'numeric' });
            this.selectedEndDisplay = null;
            return;
          }

          // if start exists but no end => set end (or restart if chosen earlier)
          if(this.selectedStart && !this.selectedEnd){
            if(date.getTime() < this.selectedStart.getTime()){
              // user clicked earlier day -> treat as new start
              this.selectedStart = date;
              this.selectedStartDisplay = date.toLocaleDateString('en-GB', { day: '2-digit', month: 'long', year: 'numeric' });
              return;
            }
            // if same day -> set checkout to next day
            if(this.isSameDate(date, this.selectedStart)){
              const next = new Date(this.selectedStart);
              next.setDate(next.getDate() + 1);
              this.selectedEnd = next;
            } else {
              this.selectedEnd = date;
            }
            this.selectedEndDisplay = this.selectedEnd.toLocaleDateString('en-GB', { day: '2-digit', month: 'long', year: 'numeric' });
            return;
          }

          // if both set -> restart with new start
          this.selectedStart = date;
          this.selectedEnd = null;
          this.selectedStartDisplay = date.toLocaleDateString('en-GB', { day: '2-digit', month: 'long', year: 'numeric' });
          this.selectedEndDisplay = null;
        },

        clearRange(){
          this.selectedStart = null;
          this.selectedEnd = null;
          this.selectedStartDisplay = null;
          this.selectedEndDisplay = null;
        },

        regenerate(){
          const first = new Date(this.viewYear, this.viewMonth, 1);
          const startDay = first.getDay();
          const daysInMonth = new Date(this.viewYear, this.viewMonth+1, 0).getDate();

          const prevDays = startDay;
          const totalCells = Math.ceil((prevDays + daysInMonth)/7)*7;
          const cells = [];

          const prevMonthLastDate = new Date(this.viewYear, this.viewMonth, 0).getDate();
          for(let i=0;i<totalCells;i++){
            const dayIndex = i - prevDays + 1;
            let inMonth = dayIndex>0 && dayIndex<=daysInMonth;
            let day = inMonth ? dayIndex : (dayIndex<=0 ? prevMonthLastDate + dayIndex : dayIndex - daysInMonth);

            let cellDate;
            if(inMonth){
              cellDate = new Date(this.viewYear, this.viewMonth, day);
            } else if(dayIndex<=0){
              cellDate = new Date(this.viewYear, this.viewMonth-1, day);
            } else {
              cellDate = new Date(this.viewYear, this.viewMonth+1, day);
            }

            cells.push({ key: i, day: day, inMonth: inMonth, date: cellDate });
          }

          this.calendar = cells;
        },

        prevMonth(){
          if(this.viewMonth === 0){ this.viewMonth = 11; this.viewYear -= 1; }
          else this.viewMonth -= 1;
          this.regenerate();
        },
        nextMonth(){
          if(this.viewMonth === 11){ this.viewMonth = 0; this.viewYear += 1; }
          else this.viewMonth += 1;
          this.regenerate();
        },

        reserve(){
          if(!this.selectedStart){ alert('Please pick a check-in date'); return; }
          if(!this.selectedEnd){ alert('Please pick a check-out date'); return; }

          const payload = {
            villa_id: this.selectedVilla,
            check_in: this.toKey(this.selectedStart),
            check_out: this.toKey(this.selectedEnd),
            guests: this.guests
          };
          // Replace with AJAX/form submission to your route when ready
          alert('Reserve\n' + JSON.stringify(payload, null, 2));
        }
      }
    }

    // helper to toggle profile dropdown
    function toggleProfileMenu(){
      const dd = document.getElementById('profileDropdown');
      if(!dd) return;
      dd.style.display = dd.style.display === 'block' ? 'none' : 'block';
    }
  </script>
</body>
</html>
