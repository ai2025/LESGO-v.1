@section('title', 'Buat Soal Ulangan')
<main>
    <div>
        {{-- Success is as dangerous as failure. --}}
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @foreach ($dataAcc as $i)
            @include('layouts.header', ['fotoP' => $i->foto])
            @endforeach

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">@yield('title') - {{ $dataUl['judul_ulangan'] }}</h2>
                                    @if ($no_soal > 1)
                                    <a href="{{ route('listSoalGuru', ['id_ul' => $id_ul]) }}">
                                        <button type="button" class="au-btn au-btn-icon au-btn--blue">
                                            <i class="zmdi zmdi-format-list-bulleted"></i> List Soal 
                                        </button>
                                    </a>
                                    @endif
                                    {{-- <button class="btn btn-primary" wire:click="soalKe">DDME</button> --}}
                                </div>
                            </div>
                        </div>

                        <hr>
                        @if (session()->has('pesan'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Berhasil!</strong> {{ session('pesan') }}
                        </div>
                        @endif

                        {{-- @if ($no_soal == 1)
                            <a href="{{ route('customSoalGuru', ['id_ul' => $id_ul]) }}">
                                <button type="button"
                                    class="au-btn au-btn-icon au-btn--blue ml-2">
                                    <i class="zmdi zmdi-arrow-left"></i> Kembali
                                </button>
                            </a>
                        @endif --}}

                        <div class="py-6">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 bg-white border-b border-gray-200">
                                        {{-- <h2>{{ $vw }}</h2> --}}
                                        <form wire:submit.prevent>
                                            <h4>Soal nomor {{ $no_soal }}</h4>
                                            <hr>
                                            @if ($dataUl['is_poin'] == '1')
                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="poin" class=" form-control-label">Poin: </label>
                                                </div>
                                                <div class="col-12 col-md-7">
                                                    <input wire:model.defer="poin" type="number" id="poin" name="poin" 
                                                    placeholder="Masukkan poin soal" class="form-control @error('poin') is-invalid @enderror">
                                                    <small class="form-text text-muted">Masukkan poin untuk soal nomor {{ $no_soal }}</small>
                                                </div>
                                                @error('poin')
                                                <span id="error-msg">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            @endif
                                            <div class="form-group">
                                                <label for="kunci_jawaban" class="form-control-label">Kunci Jawaban</label>
                                                <select name="kunci_jawaban" id="kunci_jawaban" class="form-control" wire:model.defer="kunci_jawaban">
                                                    <option value="">-- Pilih Kunci --</option>
                                                    <option value="pilihan_a">A</option>
                                                    <option value="pilihan_b">B</option>
                                                    <option value="pilihan_c">C</option>
                                                    <option value="pilihan_d">D</option>
                                                    <option value="pilihan_e">E</option>
                                                </select>
                                                @error('kunci_jawaban')
                                                <span id="error-msg">{{ $message }}</span>
                                                @enderror
                                            </div>
                                                    <div>
                                                        <label for="no_soal" class="form-control-label">Soal {{ $no_soal }}</label>
                                                    </div>
                                                    <div wire:ignore class="form-group">
                                                        <textarea type="text" id="ed_soal" wire:model="ed_soal" name="ed_soal"
                                                        class="form-control @error('ed_soal') is-invalid @enderror">
                                                        </textarea>
                                                    </div>
                                                    @error('ed_soal')
                                                        <span id="error-msg">{{ $message }}</span>
                                                        @enderror

                                                    <div class="form-group" wire:ignore>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <label for="pilA" class="form-control-label">A.</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea type="text" id="pilA"  wire:model="pilA"
                                                                class="form-control @error('pilA') is-invalid @enderror" name="pilA"> 
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('pilA')
                                                        <span id="error-msg">{{ $message }}</span>
                                                    @enderror

                                                    <div class="form-group" wire:ignore>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <label for="pilB" class="form-control-label">B.</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea type="text" id="pilB"  wire:model="pilB"
                                                                class="form-control @error('pilB') is-invalid @enderror" name="pilB">
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('pilB')
                                                        <span id="error-msg">{{ $message }}</span>
                                                    @enderror

                                                    <div class="form-group" wire:ignore>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <label for="pilC" class="form-control-label">C.</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea type="text" id="pilC"  wire:model="pilC"
                                                                class="form-control @error('pilC') is-invalid @enderror" name="pilC"> 
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('pilC')
                                                        <span id="error-msg">{{ $message }}</span>
                                                    @enderror

                                                    {{-- @if ($pilgan == 4 || $pilgan == 5) --}}
                                                    <div class="form-group" wire:ignore>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <label for="pilD" class="form-control-label">D.</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea type="text" id="pilD"  wire:model="pilD"
                                                                class="form-control @error('pilD') is-invalid @enderror" name="pilD" > 
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('pilD')
                                                        <span id="error-msg">{{ $message }}</span>
                                                    @enderror

                                                    {{-- @if ($pilgan == 5) --}}
                                                    <div class="form-group" wire:ignore>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <label for="pilE" class="form-control-label">E.</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea type="text" id="pilE"  wire:model="pilE"
                                                                class="form-control @error('pilE') is-invalid @enderror" name="pilE" > 
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('pilE')
                                                        <span id="error-msg">{{ $message }}</span>
                                                    @enderror
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1"> </h2>
                                    {{-- <a href="#"> --}}
                                        <button type="button" class="au-btn au-btn-icon au-btn--green"
                                        wire:click="saveSoal">
                                            Simpan &ensp; <i class="zmdi zmdi-play"></i>
                                        </button>
                                    {{-- </a> --}}
                                </div>
                            </div>
                        </div>
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
            @push('scripts')
            <script type="text/javascript">
                $('#ed_soal').summernote({
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['link', 'picture', 'video']],
                    ],
                    height: 100,                 // set editor height
                    width: "100%",                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    dialogsInBody: true,
                    popatmouse:true,
                    callbacks: {
                        onChange: function(e) {
                            @this.set('ed_soal', e);
                        }
                    }
                });

                $('#pilA').summernote({
                        toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['picture']],
                    ],
                    height: 50,                 // set editor height
                    width: "100%",                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    dialogsInBody: true,
                    popatmouse:true,
                    callbacks: {
                        onChange: function(e) {
                            @this.set('pilA', e);
                        }
                    }
                });

                $('#pilB').summernote({
                        toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['picture']],
                    ],
                    height: 50,                 // set editor height
                    width: "100%",                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    dialogsInBody: true,
                    popatmouse:true,
                    callbacks: {
                        onChange: function(e) {
                            @this.set('pilB', e);
                        }
                    }
                });

                $('#pilC').summernote({
                        toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['picture']],
                    ],
                    height: 50,                 // set editor height
                    width: "100%",                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    dialogsInBody: true,
                    popatmouse:true,
                    callbacks: {
                        onChange: function(e) {
                            @this.set('pilC', e);
                        }
                    }
                });

                $('#pilD').summernote({
                        toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['picture']],
                    ],
                    height: 50,                 // set editor height
                    width: "100%",                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    dialogsInBody: true,
                    popatmouse:true,
                    callbacks: {
                        onChange: function(e) {
                            @this.set('pilD', e);
                        }
                    }
                });

                $('#pilE').summernote({
                        toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['picture']],
                    ],
                    height: 50,                 // set editor height
                    width: "100%",                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    dialogsInBody: true,
                    popatmouse:true,
                    callbacks: {
                        onChange: function(e) {
                            @this.set('pilE', e);
                        }
                    }
                });
            </script>
            @endpush
            <!-- END MAIN CONTENT-->
        </div>
    </div>
</main>