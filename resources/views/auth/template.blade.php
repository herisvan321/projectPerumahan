<!DOCTYPE html>
<html lang="en">
    <head>        
        <title>Halaman Admin</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="{{asset('/img/logo.png')}}" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('/admin/css/theme-default.css')}}"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="{{ asset('/ckeditor/ckeditor.js')}}"></script>
    </head>
    <body>
        <div class="page-container">
            <div class="page-sidebar">
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="{{url('/index/')}}">
                        Admin </a>
                        <a href="#" class="x-navigation-control"></a>
                    </li> 
                    <li class="xn-title">Home</li> 
                    <li><a href="{{url('/index/')}}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a></li>
                    <li><a href="{{url('/index/slideshow')}}"><i class="fa fa-tasks"></i><span class="xn-text">Slide Show</span></a></li>
                    <li><a href="{{url('/index/typerumah')}}"><span class="fa  fa-briefcase"></span> <span class="xn-text">Type Rumah</span></a></li>
                    <li><a href="{{url('/index/harga')}}"><span class="fa  fa-money"></span> <span class="xn-text">Harga</span></a></li>
                    <li><a href="{{url('/index/ulasan')}}"><span class="fa  fa-comment-o"></span> <span class="xn-text">Ulasan</span></a></li>
                    <li><a href="{{url('/index/galery')}}"><span class="fa  fa-picture-o"></span> <span class="xn-text">Galery</span></a></li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">statistik</span></a>
                        <ul>
                            <li><a href="{{url('/index/statistik/link')}}"><span class="fa fa-bar-chart-o"></span>Link</a></li>
                            <li><a href="{{url('/index/statistik/order')}}"><span class="fa fa-bar-chart-o"></span> Order</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="page-content" >
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                    </li> 
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-user"></span></a>
                        <div class="panel panel-info animated zoomIn xn-drop-left xn-panel-dragging ui-draggable">
                            <div class="panel-heading ui-draggable-handle">
                                <h3 class="panel-title"> Profil</h3>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll mCustomScrollbar _mCS_2 mCS-autoHide mCS_no_scrollbar" >
                                <a href="{{url('/index/setting')}}" class="list-group-item"><span class="fa fa-user"></span> Name 
                                <span class="pull-right">{{auth()->user()->name}}</span>
                                </a>
                                <a href="{{url('/index/setting')}}" class="list-group-item"><span class="fa fa-envelope"></span> Email 
                                <span class="pull-right">{{auth()->user()->email}}</span>
                                </a>
                                <a href="{{url('/index/setting')}}" class="list-group-item"><span class="fa fa-heart-o"></span> Status 
                                <span class="pull-right">Admin</span>
                                </a>
                            </div>   
                            <div class="panel-footer text-center">
                                <a href="{{url('/index/setting')}}"><span class="fa fa-cog"></span> Setting</a>
                            </div>                   
                        </div>  
                </ul>
                <div class="page-content-wrap" >
                    <div class="" style="overflow: hidden;">
                       <br>
                       <div class="container-fluid">
                        @include('pesan')
                       </div>
                        @yield('mainhome')
                    </div>
                </div>      
            </div>         
        </div>
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>      
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-info btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/jquery/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/bootstrap/bootstrap.min.js')}}"></script>        
        <script type="text/javascript" src="{{ asset('/admin/js/plugins.js')}}"></script>        
        <script type="text/javascript" src="{{ asset('/admin/js/actions.js')}}"></script>    
        <script type='text/javascript' src="{{ asset('/admin/js/plugins/icheck/icheck.min.js')}}"></script>        
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/scrolltotop/scrolltopcontrol.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/morris/raphael-min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/morris/morris.min.js')}}"></script>       
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/rickshaw/d3.v3.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/rickshaw/rickshaw.min.js')}}"></script>
        <script type='text/javascript' src="{{ asset('/admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script type='text/javascript' src="{{ asset('/admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>                
        <script type='text/javascript' src="{{ asset('/admin/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>                
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/owl/owl.carousel.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>  
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/moment.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/settings.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/demo_charts_rickshaw.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/demo_dashboard.js')}}"></script>
        <script type="text/javascript">
          const vm = new Vue({
          el: '#app',
          data() {
            return {
              url: null,
            }
          },
          methods: {
            onFileChange(e) {
              const file = e.target.files[0];
              this.url = URL.createObjectURL(file);
            }
          }
        })
        </script>
    </body>
</html>