<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckShopStatus extends Command
{
    /**
     * Nama dan argument perintah.
     */
    protected $signature = 'pos:status {jam?}';

    /**
     * Deskripsi perintah.
     */
    protected $description = 'Mengecek status operasional Toko Kelontong POS';

    /**
     * Menjalankan perintah.
     */
    public function handle()
    {
        // Mengambil input jam.
        // Jika tidak diisi, default menggunakan jam 10.
        $jam = $this->argument('jam') ?? 10;

        // Meminta nama kasir.
        $namaKasir = $this->ask('Masukkan nama kasir');

        $this->info('=== SISTEM MONITORING TOKO KELONTONG POS ===');

        // Menentukan status toko.
        // Toko buka dari jam 08:00 sampai 21:00.
        if ($jam >= 8 && $jam <= 21) {
            $this->info(
                "Halo {$namaKasir}, Status Toko pada jam {$jam}:00 WIB adalah: BUKA."
            );

            $this->comment(
                'Silakan kasir bersiap di meja transaksi!'
            );
        } else {
            $this->error(
                "Halo {$namaKasir}, Status Toko pada jam {$jam}:00 WIB adalah: TUTUP."
            );

            $this->warn(
                'Akses transaksi kasir dinonaktifkan sementara.'
            );
        }

        return Command::SUCCESS;
    }
}
