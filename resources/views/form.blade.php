@extends('template.appuser')
@section('title', 'form diagnosa')
@section('content')

<style>
    /* Custom Stylish Checkbox */
    .checkbox-wrapper-46 input[type="checkbox"] {
        display: none;
        visibility: hidden;
    }

    .checkbox-wrapper-46 .cbx {
        display: flex;
        align-items: center;
        background-color: #f5f5f9;
        padding: 10px 14px;
        border-radius: 12px;
        border: 1px solid #d0d0e0;
        cursor: pointer;
        transition: all 0.25s ease-in-out;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    .checkbox-wrapper-46 .cbx:hover {
        background-color: #e8ebf3;
        border-color: #506eec;
    }

    .checkbox-wrapper-46 .cbx span {
        display: inline-block;
        vertical-align: middle;
        transform: translate3d(0, 0, 0);
    }

    .checkbox-wrapper-46 .cbx span:first-child {
        position: relative;
        width: 18px;
        height: 18px;
        border-radius: 4px;
        border: 1px solid #9098a9;
        transition: all 0.2s ease;
        margin-right: 10px;
        background: white;
    }

    .checkbox-wrapper-46 .cbx span:first-child svg {
        position: absolute;
        top: 3px;
        left: 2px;
        fill: none;
        stroke: #fff;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-dasharray: 16px;
        stroke-dashoffset: 16px;
        transition: all 0.3s ease;
        transition-delay: 0.1s;
    }

    .checkbox-wrapper-46 .cbx span:first-child:before {
        content: "";
        width: 100%;
        height: 100%;
        background: #506eec;
        display: block;
        transform: scale(0);
        opacity: 1;
        border-radius: 50%;
    }

    .checkbox-wrapper-46 .inp-cbx:checked + .cbx span:first-child {
        background: #506eec;
        border-color: #506eec;
        animation: wave-46 0.4s ease;
    }

    .checkbox-wrapper-46 .inp-cbx:checked + .cbx span:first-child svg {
        stroke-dashoffset: 0;
    }

    .checkbox-wrapper-46 .inp-cbx:checked + .cbx span:first-child:before {
        transform: scale(3.5);
        opacity: 0;
        transition: all 0.6s ease;
    }

    @keyframes wave-46 {
        50% {
            transform: scale(0.9);
        }
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
        <div class="card shadow-sm">
        <h5 class="card-header text-center fw-bold">🩺 Form Diagnosa Penyakit Sapi</h5>
        <p class="text-center text-muted mt-1 mb-3" style="font-size: 0.95rem;">
    Silakan pilih minimal <strong>2 gejala</strong> atau lebih untuk mendapatkan hasil diagnosa yang akurat.
</p>
        <div class="card-body">
        <form method="POST" action="{{url('diagnosa/hasil')}}" enctype="multipart/form-data">
        @csrf
                <div class="row row-cols-1 row-cols-md-2 g-3">
                    @foreach ($gejala as $index => $item)
                    <div class="col">
                        <div class="checkbox-wrapper-46">
                            <input 
                                type="checkbox" 
                                id="cbx-{{ $index }}" 
                                class="inp-cbx" 
                                name="gejala[]" 
                                value="{{ $item->ID_GEJALA }}" 
                            />
                            <label for="cbx-{{ $index }}" class="cbx">
                                <span>
                                    <svg viewBox="0 0 12 10" height="10px" width="12px">
                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                    </svg>
                                </span>
                                <span class="text-capitalize">{{ strtolower($item->GEJALA) }}</span>
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg px-5">
                        🔍 Diagnosa Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
        </div>
    </div>
    
</div>

@endsection
