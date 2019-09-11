<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SlideShowModel;
use App\TypeRumahModel;
use App\HargaModel;
use App\User;
use App\UlasanModel;
use App\GaleryModel;
use App\waktuModel;
use App\VisitorModel;
use DB;
use Session;
use Str;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $r)
    {
        $slideshow = SlideShowModel::all();
        $type = TypeRumahModel::all();
        $galery = GaleryModel::all();

        $datacombo = VisitorModel::GroupBy(DB::raw('YEAR(created_at),MONTH(created_at)'))
         ->select(DB::raw('YEAR(created_at) as tahun,MONTH(created_at) as bulan'))
         ->orderBy('created_at', 'desc')
         ->get();
         $cekbulanvalue = @$r->cari ? @$r->cari : '';
        $visitor = VisitorModel::GroupBy('link')->select('link', DB::raw('count(*) as tambah'))->where('jenis', 0)->orderBy('tambah', 'desc')->where('created_at', 'LIKE', '%'.date('Y-m-d').'%')->paginate(6);
        $order1= VisitorModel::GroupBy('link')->select('link', DB::raw('count(*) as tambah'))->where('jenis', 1)->orderBy('tambah', 'desc')->where('created_at', 'LIKE', '%'.date('Y-m-d').'%')->paginate(6);
        $cekbulan = waktuModel::where('tgl','LIKE','%'.date('Y-m').'%')
        ->get();
        if(@$r->cari)
        {
            $cekbulan = waktuModel::where('tgl','LIKE','%'.$r->cari.'%')
            ->get();
        }
         // dd(@$r->cari);
        return view('auth.pages.index', compact(
            'slideshow',
            'type', 
            'galery',
            'cekbulan',
            'visitor',
            'order1',
            'datacombo',
            'cekbulanvalue'
        )
        );
    }
    public function statistik(Request $r, $slug)
    {
        $cekbulanvalue = @$r->cari ? @$r->cari : '';
        $datacombo = VisitorModel::GroupBy(DB::raw('YEAR(created_at),MONTH(created_at)'))
         ->select(DB::raw('YEAR(created_at) as tahun,MONTH(created_at) as bulan'))
         ->orderBy('created_at', 'desc')
         ->get();
         if($slug == 'link')
         {
            $data = VisitorModel::GroupBy('link')->select('link', DB::raw('count(*) as tambah'))->where('jenis', 0)->orderBy('tambah', 'desc')->where('created_at', 'LIKE', '%'.date('Y-m').'%')->get();
            if(@$r->cari)
            {
                $data = VisitorModel::GroupBy('link')->select('link', DB::raw('count(*) as tambah'))->where('jenis', 0)->orderBy('tambah', 'desc')->where('created_at', 'LIKE', '%'.$r->cari.'%')->get();
            }
            $pesan = 'Visitor Link';
         }
         elseif($slug == 'order')
         {
            $data= VisitorModel::GroupBy('link')->select('link', DB::raw('count(*) as tambah'))->where('jenis', 1)->orderBy('tambah', 'desc')->where('created_at', 'LIKE', '%'.date('Y-m').'%')->get();
            if(@$r->cari)
            {
                $data= VisitorModel::GroupBy('link')->select('link', DB::raw('count(*) as tambah'))->where('jenis', 1)->orderBy('tambah', 'desc')->where('created_at', 'LIKE', '%'.$r->cari.'%')->get();
            }
            $pesan = 'Order Click';
         }

        return view('auth.pages.statistik', compact('data', 'pesan', 'datacombo', 'cekbulanvalue',  'slug'));
    }
    public function slideshow()
    {
        $data = SlideShowModel::orderBy('id', 'desc')->get();
        return view('auth.pages.slideshow', compact('data'));
    }
    public function svslideshow(Request $r)
    {
        $r->validate([
            'judul'          => 'required',
            'deskripsi'      => 'required',
            'file'           => 'required',
        ]);
        $file = $r->file('file');
        $ext = $file->getClientOriginalExtension();
        $namafile = date('YmdHsi'). ".$ext";
        $file->move('upload/slide',$namafile);
        $input = new SlideShowModel();
        $input->judul = $r->judul;
        $input->deskripsi = $r->deskripsi;
        $input->file = $namafile;
        $input->save();
        if($input)
        {
            Session::flash('sukses', 'data berhasi disimpan!');
        }
        else
        {
            Session::flash('gagal', 'data gagal disimpan!');
        }
        return back();
    }

    public function edslideshow($id)
    {
        $data = SlideShowModel::find($id);
        return view('auth.pages.edslideshow', compact('data'));
    }

    public function upslideshow(Request $r, $id)
    {
        if($r->file('file') == null)
        {
            $input = SlideShowModel::find($id);
            $input->judul = $r->judul;
            $input->deskripsi = $r->deskripsi;
            $input->update();
        }
        else
        {
            $input = SlideShowModel::find($id);
            $target = 'upload/slide/'.$input->file;
            unlink($target);
            $file = $r->file('file');
            $ext = $file->getClientOriginalExtension();
            $namafile = date('YmdHsi'). ".$ext";
            $file->move('upload/slide/',$namafile);
            $input->judul = $r->judul;
            $input->deskripsi = $r->deskripsi;
            $input->file = $namafile;
            $input->update();
        }
        if($input)
        {
            Session::flash('sukses', 'data berhasi diupdate!');
        }
        else
        {
            Session::flash('gagal', 'data gagal diupdate!');
        }
        return redirect('/index/slideshow');
    }
    public function delslideshow($id)
    {
        $del = SlideShowModel::find($id);
        $target = 'upload/slide/'.$del->file;
        unlink($target);
        $del->delete();
        if($del)
        {
            Session::flash('sukses', 'data berhasi dihapus!');
        }
        else
        {
            Session::flash('gagal', 'data gagal dihapus!');
        }
        return back();
    }
    public function typerumah()
    {
        $data = TypeRumahModel::orderBy('id', 'desc')->get();
        return view('auth.pages.typerumah', compact('data'));
    }
    public function edtyperumah($id)
    {
        $data = TypeRumahModel::find($id);
        return view('auth.pages.edtyperumah', compact('data'));
    }
    public function svtyperumah(Request $r)
    {
         $r->validate([
            'judul'          => 'required',
            'deskripsi'      => 'required',
            'file'           => 'required',
        ]);
        $file = $r->file('file');
        $ext = $file->getClientOriginalExtension();
        $namafile = date('YmdHsi'). ".$ext";
        $file->move('upload/rumah/',$namafile);
        $input = new TypeRumahModel();
        $input->judul = $r->judul;
        $input->slug = Str::slug($r->judul, '-');
        $input->deskripsi = $r->deskripsi;
        $input->file = $namafile;
        $input->save();
        if($input)
        {
            Session::flash('sukses', 'data berhasi disimpan!');
        }
        else
        {
            Session::flash('gagal', 'data gagal disimpan!');
        }
        return back();
    }

    public function uptyperumah(Request $r, $id)
    {
        if($r->file('file') == null)
        {
            $input = TypeRumahModel::find($id);
            $input->judul = $r->judul;
            $input->slug = Str::slug($r->judul, '-');
            $input->deskripsi = $r->deskripsi;
            $input->update();
        }
        else
        {
            $input = TypeRumahModel::find($id);
            $target = 'upload/rumah/'.$input->file;
            unlink($target);
            $file = $r->file('file');
            $ext = $file->getClientOriginalExtension();
            $namafile = date('YmdHsi'). ".$ext";
            $file->move('upload/rumah/',$namafile);
            $input->judul = $r->judul;
            $input->deskripsi = $r->deskripsi;
            $input->slug = Str::slug($r->judul, '-');
            $input->file = $namafile;
            $input->update();
        }
        if($input)
        {
            Session::flash('sukses', 'data berhasi diupdate!');
        }
        else
        {
            Session::flash('gagal', 'data gagal diupdate!');
        }
        return redirect('/index/typerumah');
    }
    public function deltyperumah($id)
    {
        $del = TypeRumahModel::find($id);
        $target = 'upload/rumah/'.$del->file;
        unlink($target);
        $del->delete();
        if($del)
        {
            Session::flash('sukses', 'data berhasi dihapus!');
        }
        else
        {
            Session::flash('gagal', 'data gagal dihapus!');
        }
        return back();
    }

    public function harga()
    {
        $data = HargaModel::orderBy('id', 'desc')->get();
        return view('auth.pages.harga', compact('data'));
    }

    public function svharga(Request $r)
    {
        $r->validate([
            'judul'          => 'required',
            'harga'          => 'required',
            'isi'            => 'required',
        ]);
        $input          = new HargaModel();
        $input->judul   = $r->judul;
        $input->harga   = $r->harga;
        $input->isi     = $r->isi;
        $input->save();
        if($input)
        {
            Session::flash('sukses', 'data berhasi disimpan!');
        }
        else
        {
            Session::flash('gagal', 'data gagal disimpan!');
        }
        return back();
    }

    public function edharga($id)
    {
        $cekdata = HargaModel::find($id);
        return view('auth.pages.edharga', compact('cekdata'));
    }
    public function upharga(Request $r, $id)
    {
        $up = HargaModel::find($id);
        $up->judul = $r->judul;
        $up->harga = $r->harga;
        $up->isi   = $r->isi;
        $up->update();
        if($up)
        {
            Session::flash('sukses', 'data berhasi diupdate!');
        }
        else
        {
            Session::flash('gagal', 'data gagal diupdate!');
        }
        return redirect('/index/harga');
    }
    public function delharga($id)
    {
        $cekdata = HargaModel::find($id);
        $cekdata->delete();
        return back();
    }

    public function ulasan()
    {
        $data = UlasanModel::orderBy('id', 'desc')->get();
        return view('auth.pages.ulasan', compact('data'));
    }

    public function svulasan(Request $r)
    {
        $r->validate([
            'nama'          => 'required',
            'isi'           => 'required',
            'file'          => 'required',
        ]);
        $file = $r->file('file');
        $ext = $file->getClientOriginalExtension();
        $namafile = date('YmdHsi'). ".$ext";
        $file->move('upload/ulasan/',$namafile);
        $input = new UlasanModel();
        $input->nama = $r->nama;
        $input->isi = $r->isi;
        $input->file = $namafile;
        $input->save();
        if($input)
        {
            Session::flash('sukses', 'data berhasi disimpan!');
        }
        else
        {
            Session::flash('gagal', 'data gagal disimpan!');
        }
        return back();
    }
    public function edulasan($id)
    {
        $data = UlasanModel::find($id);
        return view('auth.pages.edulasan', compact('data'));
    }

    public function upulasan(Request $r, $id)
    {
        if($r->file('file') == null)
        {
            $input = UlasanModel::find($id);
            $input->nama = $r->nama;
            $input->isi = $r->isi;
            $input->update();
        }
        else
        {
            $input = UlasanModel::find($id);
            $target = 'upload/ulasan/'.$input->file;
            unlink($target);
            $file = $r->file('file');
            $ext = $file->getClientOriginalExtension();
            $namafile = date('YmdHsi'). ".$ext";
            $file->move('upload/ulasan/',$namafile);
            $input->nama = $r->nama;
            $input->isi = $r->isi;
            $input->file = $namafile;
            $input->update();
        }
        if($input)
        {
            Session::flash('sukses', 'data berhasi diupdate!');
        }
        else
        {
            Session::flash('gagal', 'data gagal diupdate!');
        }
        return redirect('/index/ulasan');
    }
    public function delulasan($id)
    {
        $del = UlasanModel::find($id);
        $target = 'upload/ulasan/'.$del->file;
        unlink($target);
        $del->delete();
        if($del)
        {
            Session::flash('sukses', 'data berhasi dihapus!');
        }
        else
        {
            Session::flash('gagal', 'data gagal dihapus!');
        }
        return back();
    }
    public function setting()
    {
        return view('auth.pages.setting');
    }
    public function upsetting(Request $r)
    {
        $up = User::find(auth()->user()->id);
        $up->name = $r->name;
        $up->email = $r->email;
        if(!$r->password)
        {
            $up->password = $up->password;
        }
        else
        {
            $up->password = Hash::make($r->password);
        }
        $up->update();
        if($up)
        {
            Session::flash('sukses', 'data Anda berhasi diupdate!');
        }
        else
        {
            Session::flash('gagal', 'data Anda Gagal diupdate!');
        }
        return back();
    }
    public function galery()
    {
        $data = GaleryModel::orderBy('id', 'desc')->get();
        return view('auth.pages.galery', compact('data'));
    }
    public function svgalery(Request $r)
    {
        $r->validate([
            'judul'          => 'required',
            'deskripsi'           => 'required',
            'isi'          => 'required',
        ]);
        $file = $r->file('file');
        $ext = $file->getClientOriginalExtension();
        $namafile = date('YmdHsi'). ".$ext";
        $file->move('upload/galery/',$namafile);
        $input = new GaleryModel();
        $input->judul = $r->judul;
        $input->slug = Str::slug($r->judul, '-');
        $input->deskripsi = $r->deskripsi;
        $input->isi = $r->isi;
        $input->file = $namafile;
        $input->save();
        if($input)
        {
            Session::flash('sukses', 'data berhasi disimpan!');
        }
        else
        {
            Session::flash('gagal', 'data gagal disimpan!');
        }
        return back();
    }
    public function edgalery($id)
    {
        $data = GaleryModel::find($id);
        return view('auth.pages.edgalery', compact('data'));
    }
    public function upgalery(Request $r, $id)
    {
        if($r->file('file') == null)
        {
            $input = GaleryModel::find($id);
            $input->judul = $r->judul;
            $input->slug = Str::slug($r->judul, '-');
            $input->deskripsi = $r->deskripsi;
            $input->isi = $r->isi;
            $input->update();
        }
        else
        {
            $input = GaleryModel::find($id);
            $target = 'upload/galery/'.$input->file;
            unlink($target);
            $file = $r->file('file');
            $ext = $file->getClientOriginalExtension();
            $namafile = date('YmdHsi'). ".$ext";
            $file->move('upload/galery/',$namafile);
            $input->judul = $r->judul;
            $input->slug = Str::slug($r->judul, '-');
            $input->deskripsi = $r->deskripsi;
            $input->isi = $r->isi;
            $input->file = $namafile;
            $input->update();
        }
        if($input)
        {
            Session::flash('sukses', 'data berhasi diupdate!');
        }
        else
        {
            Session::flash('gagal', 'data gagal diupdate!');
        }
        return redirect('/index/galery');
    }
    public function delgalery($id)
    {
        $del = GaleryModel::find($id);
        $target = 'upload/galery/'.$del->file;
        unlink($target);
        $del->delete();
        if($del)
        {
            Session::flash('sukses', 'data berhasi dihapus!');
        }
        else
        {
            Session::flash('gagal', 'data gagal dihapus!');
        }
        return back();
    }

}
