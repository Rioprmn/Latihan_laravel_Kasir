@extends('layouts.main')

@section('content')
<div class="header-page" style="margin-bottom: 25px;">
    <h2 style="margin: 0; color: #1e293b;">📜 Laporan Transaksi</h2>
    <p style="color: #64748b; margin-top: 5px;">Pantau semua riwayat penjualan toko Anda di sini.</p>
</div>

{{-- Notifikasi Status --}}
@if(session('success'))
    <div id="alert-success" style="background: #dcfce7; color: #166534; padding: 15px; border-radius: 12px; margin-bottom: 20px; border: 1px solid #bbf7d0; display: flex; align-items: center; gap: 10px;">
        <span>✅</span> {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div id="alert-error" style="background: #fee2e2; color: #991b1b; padding: 15px; border-radius: 12px; margin-bottom: 20px; border: 1px solid #fecaca; display: flex; align-items: center; gap: 10px;">
        <span>❌</span> {{ session('error') }}
    </div>
@endif

{{-- Form Utama untuk Hapus Massal --}}
<form action="{{ route('transactions.bulkDelete') }}" method="POST" id="bulkDeleteForm">
    @csrf
    @method('DELETE')

    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
            <div style="display: flex; gap: 10px; align-items: center;">
                <span style="background: #f1f5f9; padding: 8px 15px; border-radius: 20px; font-size: 0.85rem; color: #475569; font-weight: 600;">
                    Total: {{ $transactions->count() }} Transaksi
                </span>
                
                <a href="{{ route('transactions.export') }}" class="btn" style="background: #0ee995; color: white; text-decoration: none; font-size: 0.85rem; padding: 8px 15px; border-radius: 20px; display: flex; align-items: center; gap: 8px;">
                    📥 Download CSV
                </a>
                <a href="{{ route('transactions.exportPdf') }}" class="btn" style="background: #ef4444; color: white; text-decoration: none; font-size: 0.85rem; padding: 8px 15px; border-radius: 20px; display: flex; align-items: center; gap: 8px;">
                    📄 Download PDF
                </a>
            </div>

            {{-- Tombol Hapus Terpilih --}}
            @if($transactions->count() > 0)
            <button type="submit" id="deleteSelectedBtn" disabled 
                onclick="return confirm('⚠️ PERINGATAN: Transaksi yang dipilih akan dihapus permanen. Lanjutkan?')"
                style="background: #fee2e2; color: #ef4444; border: 1px solid #fecaca; font-size: 0.85rem; padding: 8px 15px; border-radius: 20px; cursor: pointer; font-weight: 600; transition: 0.3s; opacity: 0.5;">
                🗑️ Hapus Terpilih
            </button>
            @endif
        </div>

        <a href="{{ route('transactions.create') }}" class="btn btn-primary" style="display: flex; align-items: center; gap: 8px; margin-bottom: 20px; width: fit-content; text-decoration: none;">
            <span>+</span> Transaksi Baru
        </a>

        <div class="table-responsive">
            <table class="table-custom" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="text-align: left; border-bottom: 2px solid #f1f5f9;">
                        <th style="width: 40px; text-align: center; padding: 15px;">
                            <input type="checkbox" id="selectAll" style="transform: scale(1.2); cursor: pointer;">
                        </th>
                        <th style="padding: 15px;">NO. NOTA</th>
                        <th style="padding: 15px;">TANGGAL & WAKTU</th>
                        <th style="padding: 15px;">KASIR</th>
                        <th style="padding: 15px;">TOTAL BELANJA</th>
                        <th style="padding: 15px; text-align: center;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $trx)
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="text-align: center; padding: 15px;">
                            <input type="checkbox" name="ids[]" value="{{ $trx->id }}" class="transaction-checkbox" style="transform: scale(1.2); cursor: pointer;">
                        </td>
                        <td style="padding: 15px;">
                            <span class="badge-trx" style="background: #ecfdf5; color: #065f46; padding: 5px 10px; border-radius: 8px; font-weight: bold; font-size: 0.85rem;">
                                #TRX-{{ $trx->id }}
                            </span>
                        </td>
                        <td style="padding: 15px; color: #475569;">
                            <div style="font-weight: 600;">{{ $trx->created_at->format('d M Y') }}</div>
                            <small style="color: #94a3b8;">{{ $trx->created_at->format('H:i') }} WIB</small>
                        </td>
                        <td style="padding: 15px;">
                            {{ $trx->user->name ?? 'Admin' }}
                        </td>
                        <td style="padding: 15px; font-weight: 700; color: #1e293b;">
                            Rp {{ number_format($trx->total) }}
                        </td>
                        <td style="text-align: center; padding: 15px;">
                            <a href="{{ route('transactions.show', $trx->id) }}" class="btn-detail-modern" style="text-decoration: none; color: #2563eb; font-weight: 600; border: 1px solid #dbeafe; padding: 5px 15px; border-radius: 8px; font-size: 0.85rem;">
                                Lihat Nota
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 50px 0;">
                            <div style="font-size: 2rem; margin-bottom: 10px;">📂</div>
                            <h4 style="margin: 0; color: #94a3b8;">Belum ada transaksi tercatat</h4>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</form>

{{-- Script Logika Checkbox --}}
<script>
    const selectAll = document.getElementById('selectAll');
    const checkboxes = document.querySelectorAll('.transaction-checkbox');
    const deleteBtn = document.getElementById('deleteSelectedBtn');

    function toggleDeleteButton() {
        const checkedCount = document.querySelectorAll('.transaction-checkbox:checked').length;
        if (deleteBtn) {
            deleteBtn.disabled = checkedCount === 0;
            deleteBtn.style.opacity = checkedCount === 0 ? "0.5" : "1";
        }
    }

    if (selectAll) {
        selectAll.addEventListener('change', function() {
            checkboxes.forEach(cb => cb.checked = this.checked);
            toggleDeleteButton();
        });
    }

    checkboxes.forEach(cb => {
        cb.addEventListener('change', toggleDeleteButton);
    });

    // Auto-hide alert setelah 4 detik
    setTimeout(() => {
        const alerts = ['alert-success', 'alert-error'];
        alerts.forEach(id => {
            const el = document.getElementById(id);
            if(el) el.style.display = 'none';
        });
    }, 4000);
</script>
@endsection