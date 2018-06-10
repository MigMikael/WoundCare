@extends('layouts.app')

@section('content')
    <div class="container container-first">
        <div class="row well">
            <h1>
                <b>About WoundSee</b>
            </h1>
        </div>

        <div class="row well" style="font-size: larger">
            <p>WoundSee เป็นระบบการแพทย์ทางไกลที่เน้นไปที่การดูแลรักษาบาดแผลเรื้อรัง Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae cupiditate earum quisquam vel vero. Adipisci commodi cupiditate dolor, dolorum eos harum id inventore nisi nulla odit provident quo quos repudiandae.</p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus culpa debitis, delectus explicabo harum nemo obcaecati! Aspernatur, dignissimos ducimus id laudantium minima modi nostrum possimus quasi qui veniam, veritatis voluptatibus.</p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aut, distinctio, eius explicabo fuga incidunt ipsa ipsam maxime non, numquam obcaecati pariatur porro praesentium quam quasi similique tempora ut voluptate?</p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis fugit quo similique voluptatem. Alias amet ea earum facilis, illo ipsa itaque necessitatibus optio quas quasi repellendus, similique, tenetur totam unde.</p>
        </div>

        <div class="row well">
            <h1>
                <b>ผู้พัฒนา</b>
            </h1>
        </div>

        <div class="row well col-md-12">
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3>ชนะไชย พุทธรักษา</h3>
                    </div>
                    <div class="panel-body text-center" style="font-size: large">
                        <img src="{{ url('/img/mig.jpg') }}" class="img-responsive img-thumbnail profile-img" alt="ชนะไชย พุทธรักษา">
                        <hr>
                        <div class="col-md-4 col-sm-4">
                            <a href="https://www.facebook.com/mig.mikael" target="_blank">
                                <i class="fa fa-facebook-official fa-2x" style="padding-right: 1%" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <a href="https://www.instagram.com/migmikael/" target="_blank">
                                <i class="fa fa-instagram fa-2x" style="padding-right: 1%" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <a href="https://github.com/MigMikael" target="_blank">
                                <i class="fa fa-github-square fa-2x" style="padding-right: 1%" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="panel-footer text-left">
                        <a href="https://migmikael.github.io" target="_blank" class="btn btn-primary">Web Site</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3>นันทิพัฒน์ พลบดี</h3>
                    </div>
                    <div class="panel-body text-center" style="font-size: large">
                        <img src="{{ url('/img/man.jpg') }}" class="img-responsive img-thumbnail profile-img" alt="นันทิพัฒน์ พลบดี">
                        <hr>
                        <div class="col-md-4 col-sm-4">
                            <a href="https://www.facebook.com/vsmanzz" target="_blank">
                                <i class="fa fa-facebook-official fa-2x" style="padding-right: 1%" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <a href="https://www.instagram.com/vsmanzz/" target="_blank">
                                <i class="fa fa-instagram fa-2x" style="padding-right: 1%" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <a href="" target="_blank">
                                <i class="fa fa-github-square fa-2x" style="padding-right: 1%" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a href="" class="btn btn-primary">Web Site</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3>ณพร จารุตั้งตรง</h3>
                    </div>
                    <div class="panel-body text-center" style="font-size: large">
                        <img src="{{ url('/img/minnie.jpg') }}" class="img-responsive img-thumbnail profile-img" alt="">
                        <hr>
                        <div class="col-md-4 col-sm-4">
                            <a href="https://www.facebook.com/profile.php?id=100001561958489" target="_blank">
                                <i class="fa fa-facebook-official fa-2x" style="padding-right: 1%" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <a href="https://www.instagram.com/min_minnie_k/" target="_blank">
                                <i class="fa fa-instagram fa-2x" style="padding-right: 1%" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <a href="" target="_blank">
                                <i class="fa fa-github-square fa-2x" style="padding-right: 1%" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a href="" class="btn btn-primary">Web Site</a>
                    </div>
                </div>
            </div>
        </div>
        {{--@include('footer')--}}
    </div>
@endsection