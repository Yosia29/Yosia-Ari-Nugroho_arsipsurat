<?php
namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('search');
        $surats = Surat::with('kategori')
            ->when($q, function($query,$q){
                $query->where('judul','like',"%{$q}%");
            })
            ->orderBy('created_at','desc')
            ->paginate(10)
            ->appends(['search'=>$q]);
        return view('surat.index', compact('surats','q'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('surat.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'nomor_surat' => 'required|unique:surats,nomor_surat',
        'judul' => 'required',
        'kategori_id' => 'required|exists:kategoris,id',
        'file' => 'required|mimes:pdf|max:2048',
    ]);

    if ($request->hasFile('file')) {
        $path = $request->file('file')->store('surat', 'public');
    }

    Surat::create([
        'nomor_surat' => $request->nomor_surat,
        'judul' => $request->judul,
        'tanggal' => now(),
        'kategori_id' => $request->kategori_id,
        'file_path' => $path,
    ]);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil diupload.');
    }

    public function lihat($id)
    {
        $surat = Surat::findOrFail($id);
        return view('surat.lihat', compact('surat'));
    }

    public function destroy(Surat $surat)
    {
        if (Storage::disk('public')->exists($surat->file_path)) {
            Storage::disk('public')->delete($surat->file_path);
        }
        $surat->delete();
        return redirect()->route('surat.index')->with('success','Data berhasil dihapus');
    }

    public function download(Surat $surat)
    {
        $file = storage_path('app/public/'.$surat->file_path);
        return response()->download($file, $surat->judul . '.pdf');
    }
}
