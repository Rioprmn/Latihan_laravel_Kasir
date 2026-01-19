<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kasir-Ku | Sistem Kasir & Inventaris Terpadu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem kasir dan inventaris profesional untuk toko Anda. Kelola produk, stok, dan laporan penjualan dengan mudah.">

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0F5132',
                        secondary: '#198754',
                        accent: '#20c997'
                    },
                    animation: {
                        float: 'float 3s ease-in-out infinite',
                        slideUp: 'slideUp 0.6s ease-out'
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        }
                    }
                }
            }
        }
    </script>

    <style>
        .gradient-primary {
            background: linear-gradient(135deg, #0F5132 0%, #198754 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(15, 81, 50, 0.2);
        }
    </style>
</head>
<body class="bg-white text-gray-800 overflow-x-hidden">

<!-- ================= NAVBAR ================= -->
<nav class="sticky top-0 z-50 bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 gradient-primary rounded-lg flex items-center justify-center">
                    <i class="fas fa-shopping-cart text-white text-lg"></i>
                </div>
                <h1 class="text-2xl font-bold gradient-primary bg-clip-text text-transparent">KASIR-KU</h1>
            </div>
            <a href="{{ route('login') }}"
               class="bg-gradient-to-r from-primary to-secondary text-white px-6 py-2.5 rounded-lg font-semibold hover:shadow-lg transition transform hover:scale-105">
                <i class="fas fa-sign-in-alt mr-2"></i>Login
            </a>
        </div>
    </div>
</nav>

<!-- ================= HERO SECTION ================= -->
<section class="gradient-primary text-white py-20 md:py-32 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full -mr-48 -mt-48"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-white rounded-full -ml-48 -mb-48"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6 animate-slideUp">
                <div class="inline-block bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm font-semibold">
                    ✨ Solusi Kasir Modern
                </div>
                
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                    Kelola Toko Anda dengan <span class="text-accent">Mudah & Cepat</span>
                </h2>
                
                <p class="text-lg text-gray-100 max-w-2xl">
                    Sistem kasir terintegrasi untuk mengelola produk, stok, transaksi, dan laporan penjualan dengan satu dashboard yang powerful dan user-friendly.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="{{ route('login') }}"
                       class="inline-block bg-accent text-primary px-8 py-3.5 rounded-lg font-bold hover:shadow-2xl transition transform hover:scale-105 text-center">
                        <i class="fas fa-rocket mr-2"></i>Mulai Sekarang
                    </a>
                    <a href="#fitur"
                       class="inline-block bg-white bg-opacity-20 text-white px-8 py-3.5 rounded-lg font-bold hover:bg-opacity-30 transition border border-white text-center">
                        <i class="fas fa-arrow-down mr-2"></i>Lihat Fitur
                    </a>
                </div>
            </div>

            <div class="hidden md:block relative h-96">
                <div class="absolute inset-0 gradient-primary rounded-2xl opacity-20 blur-3xl"></div>
                
                <div class="relative bg-white rounded-2xl shadow-2xl p-6 hover:scale-[1.02] transition">
                    <!-- Foto Produk -->
                    <div class="aspect-square bg-gray-100 rounded-xl overflow-hidden">
                        <img 
                            src="https://via.placeholder.com/500x500?text=Product+Image"
                            alt="Product Image"
                            class="w-full h-full object-cover"
                        >
                    </div>

                    <!-- Info Produk -->
                    <div class="mt-4 space-y-2">
                        <h3 class="text-lg font-semibold text-gray-800 truncate">
                            Product Name
                        </h3>

                        <p class="text-sm text-gray-500 line-clamp-2">
                            Short product description goes here.
                        </p>

                        <div class="flex items-center justify-between pt-2">
                            <span class="text-lg font-bold text-accent">
                                $99.00
                            </span>

                            <button class="px-4 py-2 text-sm rounded-lg bg-accent text-white hover:opacity-90">
                                Add
                            </button>
                        </div>
                    </div>
                </div>


                {{-- <div class="relative bg-white rounded-2xl shadow-2xl p-6 animate-float">
                    <div class="space-y-4">
                        <div class="h-12 bg-gray-200 rounded-lg animate-pulse"></div>
                        <div class="grid grid-cols-3 gap-2">
                            <div class="h-16 bg-accent/10 rounded-lg animate-pulse"></div>
                            <div class="h-16 bg-accent/20 rounded-lg animate-pulse"></div>
                            <div class="h-16 bg-accent/10 rounded-lg animate-pulse"></div>
                        </div>
                        <div class="space-y-2 pt-4">
                            <div class="h-3 bg-gray-200 rounded animate-pulse w-3/4"></div>
                            <div class="h-3 bg-gray-200 rounded animate-pulse w-1/2"></div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>

<!-- ================= FEATURES SECTION ================= -->
<section id="fitur" class="py-20 md:py-32 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-4 mb-16">
            <h3 class="text-3xl md:text-4xl font-bold">Fitur-Fitur Unggulan</h3>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Semua yang Anda butuhkan untuk menjalankan bisnis retail dengan efisien
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="card-hover bg-white p-8 rounded-xl shadow-lg">
                <div class="w-14 h-14 gradient-primary rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-box text-white text-2xl"></i>
                </div>
                <h4 class="text-xl font-bold mb-3">Manajemen Produk</h4>
                <p class="text-gray-600">
                    Tambah, edit, dan kelola produk dengan foto, harga, stok real-time yang terupdate otomatis.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="card-hover bg-white p-8 rounded-xl shadow-lg">
                <div class="w-14 h-14 gradient-primary rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-receipt text-white text-2xl"></i>
                </div>
                <h4 class="text-xl font-bold mb-3">Transaksi Kasir</h4>
                <p class="text-gray-600">
                    Proses penjualan dengan cepat, support multiple payment method, print struk otomatis.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="card-hover bg-white p-8 rounded-xl shadow-lg">
                <div class="w-14 h-14 gradient-primary rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-chart-bar text-white text-2xl"></i>
                </div>
                <h4 class="text-xl font-bold mb-3">Laporan Penjualan</h4>
                <p class="text-gray-600">
                    Pantau performa bisnis secara real-time dengan grafik dan analitik yang detail.
                </p>
            </div>

            <!-- Feature 4 -->
            <div class="card-hover bg-white p-8 rounded-xl shadow-lg">
                <div class="w-14 h-14 gradient-primary rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-tags text-white text-2xl"></i>
                </div>
                <h4 class="text-xl font-bold mb-3">Kategorisasi Produk</h4>
                <p class="text-gray-600">
                    Organisir produk berdasarkan kategori untuk navigasi yang lebih mudah dan terstruktur.
                </p>
            </div>

            <!-- Feature 5 -->
            {{-- <div class="card-hover bg-white p-8 rounded-xl shadow-lg">
                <div class="w-14 h-14 gradient-primary rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h4 class="text-xl font-bold mb-3">Multi-User Management</h4>
                <p class="text-gray-600">
                    Support admin dan kasir dengan hak akses berbeda, tracking aktivitas per user.
                </p>
            </div> --}}

            <!-- Feature 6 -->
            <div class="card-hover bg-white p-8 rounded-xl shadow-lg">
                <div class="w-14 h-14 gradient-primary rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-sliders-h text-white text-2xl"></i>
                </div>
                <h4 class="text-xl font-bold mb-3">Pengaturan Sistem</h4>
                <p class="text-gray-600">
                    Sesuaikan sistem sesuai kebutuhan toko Anda, kelola profil toko dan preferensi.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= STATS SECTION ================= -->
{{-- <section class="py-20 md:py-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold gradient-primary bg-clip-text text-transparent">500+</div>
                <p class="text-gray-600 mt-2">User Aktif</p>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold gradient-primary bg-clip-text text-transparent">50K+</div>
                <p class="text-gray-600 mt-2">Transaksi/Bulan</p>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold gradient-primary bg-clip-text text-transparent">99.9%</div>
                <p class="text-gray-600 mt-2">Uptime</p>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold gradient-primary bg-clip-text text-transparent">24/7</div>
                <p class="text-gray-600 mt-2">Support</p>
            </div>
        </div>
    </div>
</section> --}}

<!-- ================= CTA SECTION ================= -->
<section class="gradient-primary text-white py-20 md:py-28 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full -ml-48 -mt-48"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full -mr-48 -mb-48"></div>
    </div>
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-8">
        <h3 class="text-3xl md:text-5xl font-bold leading-tight">
            Siap Membuat Bisnis Anda <span class="text-accent">Lebih Profesional?</span>
        </h3>
        
        <p class="text-lg text-gray-100 max-w-2xl mx-auto">
            Bergabunglah dengan ribuan pemilik toko yang telah mempercayai Kasir-Ku untuk mengelola bisnis mereka dengan lebih efisien.
        </p>
        
        {{-- <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
            <a href="{{ route('login') }}"
               class="inline-block bg-accent text-primary px-8 py-4 rounded-lg font-bold hover:shadow-2xl transition transform hover:scale-105 text-center">
                <i class="fas fa-arrow-right mr-2"></i>Login Sekarang
            </a>
            <a href="mailto:support@kasir-ku.com"
               class="inline-block bg-white bg-opacity-20 text-white px-8 py-4 rounded-lg font-bold hover:bg-opacity-30 transition border border-white text-center">
                <i class="fas fa-envelope mr-2"></i>Hubungi Kami
            </a>
        </div> --}}
    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="bg-gray-900 text-gray-400 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-4 gap-8 mb-8">
            <div>
                <h5 class="text-white font-bold mb-4">Kasir-Ku</h5>
                <p class="text-sm">Sistem kasir modern untuk bisnis retail Anda.</p>
            </div>
            <div>
                <h5 class="text-white font-bold mb-4">Produk</h5>
                <ul class="text-sm space-y-2">
                    <li><a href="#fitur" class="hover:text-accent transition">Fitur</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-accent transition">Login</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-white font-bold mb-4">Perusahaan</h5>
                <ul class="text-sm space-y-2">
                    <li><a href="#" class="hover:text-accent transition">Tentang</a></li>
                    <li><a href="#" class="hover:text-accent transition">Kontak</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-white font-bold mb-4">Ikuti Kami</h5>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-accent transition"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="hover:text-accent transition"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="hover:text-accent transition"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        
        <div class="border-t border-gray-800 pt-8 text-center text-sm">
            <p>&copy; {{ date('Y') }} Kasir-Ku. All rights reserved. | Dibuat <span class="text-accent"></span> oleh Rio Permana NPM 23552011057</p>
        </div>
    </div>
</footer>

</body>
</html>
