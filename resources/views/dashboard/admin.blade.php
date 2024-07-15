@extends('template.appadmin')
@section('title', 'Dashboard')
@section('main')
<style>
    .row input[type="checkbox"]{
        position: absolute;
        width: 100%;
        top: 0;
        left: 0;
        height: 100%;
        z-index: 3;
        opacity: 0;
        cursor: pointer;
    }

    .cabang{
        position: absolute;
        opacity: 0%;
        width: 97%;
        transform: translateY(-100%);
        transition: .8s;
    }

    .cabang.slide{
        transform: translateY(0);
        transition: .8s;
    }
</style>
    {{-- <div class="panel-header bg-primary-gradient">
    <div class="py-5 page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="pb-2 text-white fw-bold">Dashboard</h2>
                <h5 class="mb-2 text-white op-7">Ayodya Pala</h5>
            </div>
            
        </div>
    </div>
</div> --}}
    <div class="panel-header " style="background-image: linear-gradient(#7a74fc, #6C63FF);">
        <div class="py-5 page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="pb-2 text-white fw-bold">Dashboard </h2>
                    <h5 class="mb-2 text-white op-7">{{ Carbon\Carbon::now()->isoFormat('dddd, D MMMM YYYY') }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt--5">
        <div class="mt-3 card" id="main" style="z-index: 2; overflow: hidden;">
            <div class="m-3 row">
                <input type="checkbox" name="" id="" class="toggle">
                <div class="text-center col-lg-4">
                    <img src="{{ asset('image/Winners_Flatline.svg') }}" class="card-img-top"
                        alt="..." style="width: 70%; height: 170px;">
                </div>
                <div class="col-lg-4">
                    <div class="card-body">
                        {{-- <img src="{{ asset('Atlantis-Lite/assets/img/DataArranging_Outline.svg')}}" class="card-img-top" alt="..." style="width: 500px; ;"> --}}
                        <h5 class="card-title">Jumlah Cabang</h5>

                        <p class="card-text">{{ count($cabangs) }}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-body">
                        {{-- <img src="{{ asset('Atlantis-Lite/assets/img/DataArranging_Outline.svg')}}" class="card-img-top" alt="..." style="width: 500px; ;"> --}}
                        <h5 class="card-title">Jumlah Siswa</h5>
                        <p class="card-text">{{ count($siswa) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="cabang card mt--4" style="z-index: 1">
            <div class="container-fluid">
                <div class="table-responsive">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cabang</th>
                            <th scope="col">Jumlah Siswa</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($cabangs as $cab)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cab->name }}</td>
                                <td>{{ count($cab->siswa) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        const menuToggle = document.querySelector('.toggle');
        const cabang = document.querySelector('.cabang');
        const main = document.querySelector('#main');

        menuToggle.addEventListener('click', function () {
            cabang.classList.toggle('slide');
            main.style.opacity = 100%;
        })
    </script>
@endsection
