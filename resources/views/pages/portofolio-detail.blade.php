@extends('layouts.app')

@section('title')
    Portofolio - Sekolah Vokasi E-COM
@endsection

@section('content')
    <div style="margin-top: 80px">
        <div class="container"><h2>Portofolio {{ $user->name }}</h2></div>
            <div class="container tabs">	
                <ul class="nav nav-pills">
                    <li class="active">
                        <a  href="#biodata" data-toggle="tab">Biodata</a>
                    </li>
                    <li>
                        <a href="#kepanitiaan" data-toggle="tab">Kepanitiaan</a>
                    </li>
                    <li>
                        <a href="#organisasi" data-toggle="tab">Organisasi</a>
                    </li>
                    <li>
                        <a href="#pendidikan" data-toggle="tab">Pendidikan</a>
                    </li>
                    <li>
                        <a href="#experience" data-toggle="tab">Experience</a>
                    </li>
                    <li>
                        <a href="#project" data-toggle="tab">Project</a>
                    </li>
                    <li>
                        <a href="#skills" data-toggle="tab">Skills</a>
                    </li>
                </ul>

                <div class="tab-content clearfix">
                    <div class="tab-pane active" id="biodata">
                        <h3>Biodata</h3>
                    </div>
                    <div class="tab-pane" id="kepanitiaan">
                        <h3>Kepanitiaan</h3>
                    </div>
                    <div class="tab-pane" id="organisasi">
                        <h3>Organisasi</h3>
                    </div>
                    <div class="tab-pane" id="pendidikan">
                        <h3>Pendidikan</h3>
                    </div>
                    <div class="tab-pane" id="experience">
                        <h3>Experience</h3>
                    </div>
                    <div class="tab-pane" id="project">
                        <h3>Project</h3>
                    </div>
                    <div class="tab-pane" id="skills">
                        <h3>Skills</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script> --}}
@endsection