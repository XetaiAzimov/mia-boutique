<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mia Admin | İdarəetmə Paneli</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3E%3Ccircle cx='8' cy='8' r='8' fill='%23ffafbd'/%3E%3Ctext x='8' y='11.5' font-family='Arial, sans-serif' font-weight='black' font-size='10' text-anchor='middle' fill='%23FFFAF0'%3Em%3C/text%3E%3C/svg%3E">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&family=Playfair+Display:italic,wght@700&display=swap');
        body { font-family: 'Quicksand', sans-serif; background-color: #fffafb; }
        .brand-font { font-family: 'Playfair Display', serif; }
        .admin-card { transition: all 0.3s ease; border: 1px solid rgba(255, 175, 189, 0.2); }
    </style>
</head>
<body class="text-gray-800 pb-20">

    <nav class="bg-white border-b border-pink-100 px-6 py-4 flex justify-between items-center sticky top-0 z-50 shadow-sm">
        <div class="flex items-center space-x-4">
            <a href="/" class="text-2xl brand-font text-pink-500 italic lowercase tracking-tighter">mia.</a>
            <span class="text-[10px] uppercase tracking-widest text-gray-400 font-bold border-l pl-4 border-pink-100">Admin Dashboard</span>
        </div>
        <div class="flex items-center space-x-4">
            <span class="text-xs font-bold text-gray-500">Xətai Əzimov</span>
            <div class="w-8 h-8 bg-pink-100 rounded-full flex items-center justify-center text-pink-500 font-bold text-xs italic">XA</div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 mt-10">
        
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 text-green-600 rounded-2xl border border-green-100 text-xs font-bold uppercase tracking-widest text-center animate-bounce">
                {{ session('success') }} 🌸
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            
            <div class="lg:col-span-1">
                <div class="bg-white p-8 rounded-[2rem] shadow-xl shadow-pink-50/50 admin-card">
                    <h3 class="brand-font text-2xl mb-6 text-gray-800">Yeni Məhsul 💎</h3>
                    
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="flex flex-col">
            <label class="text-[10px] font-bold text-gray-400 uppercase mb-2">Məhsulun Adı</label>
            <input type="text" name="name" required 
                   class="w-full p-3 bg-gray-50 border border-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-200" 
                   placeholder="Məs: Mirvari Qolbaq">
        </div>

        <div class="flex flex-col">
            <label class="text-[10px] font-bold text-gray-400 uppercase mb-2">Qiymət (AZN)</label>
            <input type="number" name="price" min="0" step="0.01" required 
                   class="w-full p-3 bg-gray-50 border border-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-200" 
                   placeholder="0.00">
        </div>

        <div class="flex flex-col">
            <label class="text-[10px] font-bold text-gray-400 uppercase mb-2">Kateqoriya</label>
            <select name="type" required class="w-full p-3 bg-gray-50 border border-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-200">
                <option value="sep">Sep</option>
                <option value="qolbaq">Qolbaq</option>
                <option value="uzuk">Üzük</option>
            </select>
        </div>

        <div class="flex flex-col">
            <label class="text-[10px] font-bold text-gray-400 uppercase mb-2">Məhsul Şəkli</label>
            <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-xl border border-gray-100">
    <input type="checkbox" name="in_stock" checked class="w-4 h-4 accent-pink-500">
    <span class="text-[10px] font-bold text-gray-500 uppercase">Hazırda stokda var</span>
</div>
            <input type="file" name="image" required 
                   class="w-full p-2 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-bold file:bg-pink-50 file:text-pink-700 hover:file:bg-pink-100">
        </div>
    </div>

    <button type="submit" class="w-full bg-pink-500 text-white py-4 rounded-2xl font-bold uppercase text-[10px] shadow-lg shadow-pink-100 hover:bg-pink-600 transition-all">
        Məhsulu Siyahıya Əlavə Et
    </button>
</form>
                </div>

                <div class="mt-8 bg-white p-8 rounded-[2rem] shadow-xl shadow-pink-50/50 admin-card">
    <h3 class="brand-font text-2xl mb-6 text-gray-800 italic">Komandamız ✨</h3>
    
    <form action="{{ route('employee.store') }}" method="POST" class="mb-6 space-y-3">
        @csrf
        <input type="text" name="name" placeholder="Ad Soyad" class="w-full p-3 bg-pink-50/30 rounded-xl border border-pink-50 text-xs focus:outline-none">
        <input type="text" name="position" placeholder="Vəzifə" class="w-full p-3 bg-pink-50/30 rounded-xl border border-pink-50 text-xs focus:outline-none">
        <button type="submit" class="w-full bg-pink-400 text-white py-2 rounded-xl text-[10px] font-bold uppercase tracking-widest hover:bg-pink-500 transition-all">Əlavə Et</button>
    </form>

    <div class="space-y-4">
        @foreach(\App\Models\Employee::all() as $emp)
        <div class="flex items-center justify-between p-3 bg-pink-50/20 rounded-xl border border-pink-50/50">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-white border border-pink-100 rounded-full flex items-center justify-center text-[10px] font-bold text-pink-400">
                    {{ substr($emp->name, 0, 1) }}
                </div>
                <div>
                    <p class="text-[11px] font-bold text-gray-700 leading-none">{{ $emp->name }}</p>
                    <p class="text-[8px] text-pink-400 uppercase font-bold tracking-tighter">{{ $emp->position }}</p>
                </div>
            </div>
            <form action="{{ route('employee.destroy', $emp->id) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="text-gray-300 hover:text-red-400"><i data-lucide="x" class="w-3 h-3"></i></button>
            </form>
        </div>
        @endforeach
    </div>
</div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-[2rem] shadow-xl shadow-pink-50/50 overflow-hidden admin-card">
                    <div class="p-8 border-b border-pink-50 flex justify-between items-center">
                        <h3 class="brand-font text-2xl text-gray-800">Məhsul Bazası 📦</h3>
                        <span class="bg-pink-50 text-pink-500 text-[10px] font-bold px-4 py-1.5 rounded-full uppercase">{{ $products->count() }} Məhsul</span>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-pink-50/30 text-[10px] uppercase tracking-widest text-gray-400 font-bold">
                                <tr>
                                    <th class="px-8 py-4">Şəkil</th>
                                    <th class="px-4 py-4">Məhsul Adı</th>
                                    <th class="px-4 py-4">Qiymət</th>
                                    <th class="px-4 py-4">Tip</th>
                                    <th class="px-8 py-4 text-right">Əməliyyat</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-pink-50">
                                @foreach($products as $p)
                                <tr class="hover:bg-pink-50/10 transition-colors">
                                    <td class="px-8 py-4">
                                        <img src="{{ asset('storage/' . $p->image) }}" class="w-12 h-12 rounded-xl object-cover border border-pink-50">
                                    </td>
                                    <td class="px-4 py-4 font-bold text-xs text-gray-700">{{ $p->name }}</td>
                                    <td class="px-4 py-4 text-xs font-black text-pink-500">{{ $p->price }} AZN</td>
                                    <td class="px-4 py-4">
                                        <span class="text-[9px] uppercase font-bold px-2 py-1 bg-gray-100 rounded-md text-gray-500">{{ $p->type }}</span>
                                    </td>
                                    <td class="px-8 py-4 text-right">
                                        <form action="{{ route('product.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Silsin?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-gray-300 hover:text-red-500 transition-colors">
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($products->isEmpty())
                            <div class="p-20 text-center opacity-30 italic text-sm">Hələ ki məhsul yoxdur...</div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </main>

  <script>
    // İkonları aktivləşdir
    lucide.createIcons();

    // Səbət üçün boş massiv
    let cart = [];

    // ADMIN MODAL FUNKSİYALARI (ƏSAS BURADIR)
    function openAdminModal() {
        console.log("Admin modal açılır...");
        document.getElementById('admin-modal').classList.remove('hidden');
    }

    function closeAdminModal() {
        document.getElementById('admin-modal').classList.add('hidden');
    }

    function checkAdminPass() {
        const passInput = document.getElementById('admin-pass');
        const pass = passInput.value;
        
        console.log("Daxil edilən kod: " + pass); // Yoxlamaq üçün

        if (pass === "211") {
            console.log("Kod düzdür, yönləndirilir...");
            window.location.href = "/admin";
        } else {
            alert("Kod yanlışdır! 🌸");
            passInput.value = ""; // Səhvdirsə inputu təmizlə
        }
    }

    // Səbət və digər funksiyalar (Eynilə qalır)
    function toggleCart(forceOpen = false) { 
        const s = document.getElementById('cart-sidebar'); 
        forceOpen ? s.classList.remove('translate-x-full') : s.classList.toggle('translate-x-full'); 
    }

    function addToCart(product) {
        cart.push(product);
        updateCart();
        if(window.innerWidth > 768) toggleCart(true);
    }

    function updateCart() {
        const itemsContainer = document.getElementById('cart-items');
        document.getElementById('cart-count').innerText = cart.length;
        
        if(cart.length === 0) {
            itemsContainer.innerHTML = `<div class="text-center opacity-20 py-10 italic text-[10px]">Səbətiniz boşdur 🌸</div>`;
        } else {
            itemsContainer.innerHTML = cart.map((item, index) => `
                <div class="flex items-center space-x-3 bg-pink-50/20 p-2 rounded-xl border border-pink-50">
                    <img src="/storage/${item.image}" class="w-10 h-10 rounded-lg object-cover">
                    <div class="flex-1 leading-tight">
                        <h5 class="text-[9px] font-bold uppercase text-gray-700">${item.name}</h5>
                        <p class="text-pink-500 font-bold text-[9px]">${item.price} AZN</p>
                    </div>
                </div>`).join('');
        }
        
        let total = cart.reduce((sum, item) => sum + parseFloat(item.price), 0);
        document.getElementById('cart-total').innerText = total.toFixed(2) + " AZN";
        lucide.createIcons();
    }
</script>
</body>
</html>