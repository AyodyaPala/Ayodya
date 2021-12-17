@extends('template.appadmin')
@section('jquery')
    <script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {

            $("#tags").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('sertifikat.getSertifikat') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    var tempat = ui.item.ttl;
                    var convert = tempat.split(",");

                    var ttl = convert[1];
                    var bulan = ttl.split(" ")[2];
                    var date = new Date(ttl);
                    var tanggal = date.getDate();
                    var tahun = date.getFullYear();
                    
                    var semester = ui.item.semester;
                    var ang = ['', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas'];
                    var tbr;

                    if (semester<12){
                        tbr=ang[semester];
                    }else if (semester<20){
                        tbr=ang[semester-10]+" belas";
                    }else if (semester<100){
                        tbr=ang[Math.floor(semester/10)]+" puluh "+ang[semester%10];
                    }

                    $('#tags').val(ui.item.label);
                    $('.nama').html(ui.item.label);
                    $('#induk').html(ui.item.id);
                    $('#tempat').html(convert[0]);
                    $('#cabang').html(ui.item.cabang);
                    $('#ortu').html(ui.item.ortu);
                    $('#tanggal').html(tanggal);
                    $('#bulan').html(bulan);
                    $('#tahun').html(tahun);
                    $('.semester').html(semester);
                    $('#huruf').html(tbr);
                    $('#foto').attr("src", '{{ asset('/') }}' + ui.item.foto);
                    return false;
                }
            });

        });
        
                    var date2 = new Date();
                    var tgl = date2.getDate();
                    var romawi = ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX'];
                    var tr;

                    if (tgl<11){
                        tr=romawi[tgl];
                    } else if (tgl<20){
                        tr='X'+romawi[tgl-10];
                    } else if (tgl<30){
                        tr='XX'+romawi[tgl%10];
                    } else if (tgl<40){
                        tr='XXX'+romawi[tgl%10];
                    }
                    $('#ini').html(tr);
    </script>
@endsection
@section('main')
    <style>
        .A3 {
            width: 100%;
            height: 650px;
            box-shadow: 2px 2px 10px 1px rgba(0, 0, 0, 0.10)
        }

        p.ttd {
            line-height: 1;
        }

    </style>
    <div class="container mt-4 mb-5">
        <div class="ui-widget">
            <label for="tags">Siswa</label>
            <input id="tags" class="form-control" name="tags">
        </div>
        {{-- <div class="form-group">
            <label for="">Nama Siswa</label>
            <select class="form-control" name="" id="">
                <option>tes</option>
                <option>tes</option>
                <option>tes</option>
            </select>
        </div> --}}
        <div class="row mt-4">
            <div class="col-sm-10">
                <div class="container A3 fw-bold" style="background: white;">
                    <img src="{{ asset('Atlantis-Lite/assets/img/ayodya_logo_sertifikat.png') }}" width="20%">
                    <center>
                        <h3 style="font-family: Eras Demi ITC"> No: __ / YAP / <span id="ini"></span> /
                            {{ Carbon\Carbon::now()->isoFormat('YYYY') }} </h3>
                        <p style="font-family: Eras Demi ITC">Diberikan Kepada:</p>
                        <h1 style="font-family: Edwardian Script ITC; font-size: 50px; margin: -10px 0" class="nama">Nama Siswa
                        </h1>

                        <p style="font-family: Eras Demi ITC"> Dilahirkan di <span id="tempat">__</span>, pada tanggal <span
                                id="tanggal">__</span>,
                            bulan <span id="bulan">__</span>, tahun <span id="tahun">__</span>
                            <br> Anak dari <span id="ortu">__</span>
                        </p>
                        <h1 style="font-family: Pristina; font-size: 50px; margin: -10px 0">Lulus</h1>

                        <p style="font-family: Eras Demi ITC" class="desc">Pada ujian tari daerah, modelling &
                            vokal di semester terpadu ke - <span class="semester">__</span> ( <span id="huruf">___</span> )
                            <br>yang diselenggarakan pada tanggal __, __, __, __ Oktober 2020
                            <br>di Gedung IX Fakultas Ilmu Pengetahuan Budaya Universitas Indonesia - Depok
                            <br>dan tercatat sebagai siswa Ayodya Pala - __
                            <br>dengan nomor induk : <span id="induk">__</span>
                        </p>


                    </center>
                    <div class="container d-flex justify-content-between">
                        <div class="foto">
                            <img src="" alt="" id="foto" width="110px" height="150px" style="border-radius: 100%">
                        </div>
                        <div style="margin-left: 0; text-align: center;">
                            <p class="ttd">Depok, {{ Carbon\Carbon::now()->isoFormat('D MMMM YYYY') }}
                                <br>Pimpinan
                            </p>
                            <br>
                            <br>
                            <p>Dra. Budi Agustinah</p>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-warning">PDF</button>
                <button type="submit" class="btn btn-info">Print</button>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-10">
                <div class="container A3" style="background: white;">
                    <br>
                    <div>
                        <h2 class="text-center ">DAFTAR NILAI UJIAN</h2>
                    </div>
                    <table style="margin-left: 100px">
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td class="nama"></td>
                        </tr>
                        <tr>
                            <th>No.Ujian</th>
                            <td>:</td>
                            <td id="ujian">36</td>
                        </tr>
                        <tr>
                            <th>Semester</th>
                            <td>:</td>
                            <td class="semester"></td>
                        </tr>
                    </table>

                    <center>
                        <table border='1' style="text-align: center; width: 100%; height:100px" class="mt-3 mb-3">
                            <tr>
                                <th colspan="2">MATERI UJIAN</th>
                                <th colspan="5">NILAI</th>
                            </tr>

                            <tr>
                                <th>DARI DAERAH</th>
                                <th>NAMA TARIAN </th>
                                <th>Wirawa</th>
                                <th>Wiraga</th>
                                <th>Wirasa</th>
                                <th>Subtotal</th>
                                <th>TOTAL</th>
                            </tr>
                            <tr>
                                <td id="daerah">jawatengah</td>
                                <td id="tari">gambiranom</td>
                                <td id="wirawa">78.50</td>
                                <td id="wiraga">78.50</td>
                                <td id="wirasa">78.50</td>
                                <td id="subtotal">78.50</td>
                                <th id="total" rowspan="2">78.50</th>
                            </tr>
                            <tr>
                                <td>sumatra</td>
                                <td>panen</td>
                                <td>78.50</td>
                                <td>78.50</td>
                                <td>78.50</td>
                                <td>78.50</td>
                            </tr>
                            <tr>
                                <th colspan="2">Undian</th>
                                <td>233</td>
                                <td>23</td>
                                <td>232</td>
                                <th colspan="2">232</th>
                            </tr>
                            <tr>
                                <th colspan="2">Sinopsi</th>
                                <th colspan="5">79.00</th>
                            </tr>

                        </table>

                    </center>
                    <div class="row">
                        <div class="col">
                            <h5 class="fw-bold">KETERANGAN</h5>
                            <tr>
                                <td>A</td>
                                <td>(Amanat Baik)</td>
                                <td>=</td>
                                <td>80</td>
                                <td>-</td>
                                <td>90</td>
                            </tr>
                            <br>
                            <tr>
                                <td>B</td>
                                <td>(Baik)</td>
                                <td>=</td>
                                <td>80</td>
                                <td>-</td>
                                <td>90</td>
                            </tr>
                            <br>
                            <tr>
                                <td>C</td>
                                <td>(Cukup)</td>
                                <td>=</td>
                                <td>80</td>
                                <td>-</td>
                                <td>90</td>
                            </tr>
                            <br>
                            <tr>
                                <td>D</td>
                                <td>(Kurang)</td>
                                <td>=</td>
                                <td>80</td>
                                <td>-</td>
                                <td>90</td>
                            </tr>

                        </div>
                        <center>
                            <div class="col">
                                <tr>
                                    <td>Depok, {{ Carbon\Carbon::now()->isoFormat('D MMMM YYYY') }}</td>
                                </tr>
                                <br>
                                <tr>
                                    <td>Ketua Litbang</td>
                                </tr>
                                <br>
                                <br>
                                <tr>
                                    <td></td>
                                </tr>
                                <br>
                                <tr>
                                    <td>Wulandari,S.sn</td>
                                </tr>
                            </div>
                        </center>

                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-warning">PDF</button>
                <button type="submit" class="btn btn-info">Print</button>
            </div>
        </div>
    </div>
@endsection
