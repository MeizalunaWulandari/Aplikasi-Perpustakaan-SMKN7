<?php

namespace App\Imports;

use App\Models\TmpBuku;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BukuImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Buku|null
     */
    public function model(array $row)
    {
        return new TmpBuku([
            'judul'     => $row['judul'],
            'pengarang'    => $row['pengarang'],
            'singkatan_pengarang'    => $row['singkatan_pengarang'],
            'tempat_terbit'    => $row['tempat_terbit'],
            'penerbit'    => $row['penerbit'],
            'tahun_terbit'    => $row['tahun_terbit'],
            'tahun_buku'    => $row['tahun_buku'],
            'no_klasifikasi'    => $row['no_klasifikasi'],
            'inisial_buku'    => $row['inisial_buku'],
            'no_induk'    => $row['no_induk'],
        ]);
    }
}
