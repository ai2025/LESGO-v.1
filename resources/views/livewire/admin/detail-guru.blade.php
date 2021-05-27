@section('title', 'Detail Guru')
<main id="main">
    <div>
        {{-- The Master doesn't talk, he acts. --}}
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @foreach ($dataAcc as $i)
            @include('layouts.header', ['fotoP' => $i->foto])
            @endforeach

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @if (session()->has('pesan'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Berhasil!</strong> {{ session('pesan') }}
                        </div>
                        @endif
                        @foreach ($detailGuru as $g)
                        <div>
                            <div class="alert alert-warning" role="alert">
                                <h4 class="alert-heading">Perhatian!</h4>
                                <hr>
                                <p class="mb-0">
                                    Peran pada user tidak dapat diganti, harap menghapus user tersebut terlebih dahulu.
                                    Kemudian silahkan membuatnya kembali di peran yang diinginkan.
                                </p>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-user"></i>
                                    <strong class="card-title pl-2">Profile Card</strong>
                                    <button class="btn btn-warning float-right" data-toggle="modal"
                                        data-target="#mdlEditGuru" wire:click="loadDetail({{ $g->id }})">
                                        <i class="fa fa-pen" aria-hidden="true"></i> Edit
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="mx-auto d-block">
                                        {{-- @if ($g->foto != null)
                                        <img class="rounded-circle mx-auto d-block"
                                            src="{{ asset('storage/'.$g->foto) }}" alt="Card image cap">
                                        @else --}}
                                        <img class="rounded-circle mx-auto d-block"
                                            src="{{ asset('lms/images/icon/avatar-01.jpg') }}" alt="Card image cap">
                                        {{-- @endif --}}
                                        <h5 class="text-sm-center mt-2 mb-1">{{ $g->name }}</h5>
                                        <div class="location text-sm-center">
                                            <i class="fa fa-id-card" aria-hidden="true"></i>
                                            @if ($g->jabatan != null)
                                            {{ $g->jabatan }}
                                            @else
                                            -
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-text text-sm-center">
                                        <div class="row text-left">
                                            <div class="col-sm">
                                                <p>
                                                    <strong> NIP &emsp; &emsp; &emsp; &emsp; &ensp; : </strong>
                                                    @if ($g->nip != null)
                                                    {{ $g->nip }}
                                                    @else
                                                    -
                                                    @endif
                                                </p>
                                                <p>
                                                    <strong> Jenis Kelamin : </strong>
                                                    @if ($g->jenis_kelamin != null)
                                                    {{ $g->jenis_kelamin }}
                                                    @else
                                                    -
                                                    @endif
                                                </p>
                                                <p>
                                                    <strong> Peran &emsp; &emsp; &ensp; &emsp;: </strong>
                                                    {{ $g->peran }}
                                                </p>
                                            </div>
                                            <div class="col-sm">
                                                <p>
                                                    <strong> Email &emsp;: </strong> {{ $g->email }}
                                                </p>
                                                <p>
                                                    <strong> No. HP &ensp; : </strong>
                                                    @if ($g->no_hp != null)
                                                    {{ $g->no_hp }}
                                                    @else
                                                    -
                                                    @endif
                                                </p>
                                                <p>
                                                    <strong> Alamat : </strong>
                                                    @if ($g->alamat != null)
                                                    {{ $g->alamat }}
                                                    @else
                                                    -
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 LESGO. All rights reserved. Template by <a
                                            href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
        </div>
        {{-- @include('layouts.modals') --}}
        <!-- Modal edit guru-->
        <div wire:ignore.self class="modal fade" id="mdlEditGuru" data-backdrop="static" data-keyboard="false"
            tabindex="-1" data-focus="true" data-show="true" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Guru {{ $name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form wire:submit.prevent="submit">
                        {{-- @csrf --}}
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        wire:model.defer="name">
                                        @error('name')
                                <span id="error-msg">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input wire:model.debounce.800ms="email" type="email" class="form-control"
                                        id="email" name="email">
                                        @error('email')
                                        <span id="error-msg">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        {{-- @endforeach --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-warning" wire:click="updateGuru()">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>