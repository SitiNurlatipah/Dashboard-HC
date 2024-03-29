<!-- Left Sidebar Menu -->
<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header">
            <span>Main</span> 
            <i class="zmdi zmdi-more ml-5"></i>
        </li>
        <li>
            <a class="" href="{{ route('dashboard') }}"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"></div><div class="clearfix"></div></a>  
        </li>
        <!-- <li>
            <a href="{{ route('dashboard') }}"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dasboard</span></div><div class="clearfix"></div></a>
            
        </li> -->
        <li>
            <a href="{{ route('user') }}"><div class="pull-left"><i class="fa fa-group mr-20"></i><span class="right-nav-text">Master Employee</span></div><div class="clearfix"></div></a>
        </li>
        <li>
            <a href="{{ route('balance') }}"><div class="pull-left"><i class="fa fa-sliders mr-20"></i><span class="right-nav-text">Balance Scorecard</span></div><div class="clearfix"></div></a>
        </li>
        
        
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="fa fa-bar-chart-o mr-20"></i><span class="right-nav-text">Recruitment</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                <ul id="ecom_dr" class="collapse collapse-level-1">
                <!-- <a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                <ul id="ecom_dr" class="collapse collapse-level-1"> -->
                    <!-- <li>
                        <a class="" href="{{ route('total') }}">Data Trend Employee</a>
                    </li> -->
                    <li>
                        <a href="{{ route('mppreal') }}">MPP & Real Employee</a>
                    </li>
                    <li>
                        <a href="{{ route('recruitment') }}">Recruitment Progress</a>
                    </li>
                    <li>
                        <a href="{{ route('avg') }}">Avg Recruitment</a>
                    </li>
                    <li>
                        <a href="{{ route('employee') }}">GETO & Turn Over</a>
                    </li>
                    <!-- <li>
                        <a href="#">Success Rate FPTK</a>
                    </li> -->
                </ul>
        </li>
        <!-- <li>
            <a href="{{ route('total') }}"><div class="pull-left"><i class="fa fa-bookmark mr-20"></i><span class="right-nav-text">Data Trend Employee</span></div><div class="clearfix"></div></a>
            
        </li> -->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#product"><div class="pull-left"><i class="fa fa-dollar mr-20"></i><span class="right-nav-text">Productivity</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                <ul id="product" class="collapse collapse-level-1">
                    <li>
                        <a href="{{ route('productivity') }}">Data Productivity</a>
                    </li>
                    <li>
                        <a href="{{ route('sales') }}">Sales</a>
                    </li>
                </ul>
        </li>
        <!-- <li>
            <a href="{{ route('recruitment') }}"><div class="pull-left"><i class="fa fa-bar-chart-o mr-20"></i><span class="right-nav-text">Recruitment Progress</span></div><div class="clearfix"></div></a>
        </li>
        <li>
            <a href="{{ route('avg') }}"><div class="pull-left"><i class="fa fa-bolt mr-20"></i><span class="right-nav-text">Leadtime Recruitment</span></div><div class="clearfix"></div></a>
        </li>
        <li>
            <a href="{{ route('mppreal') }}"><div class="pull-left"><i class="fa fa-tasks mr-20"></i><span class="right-nav-text">MPP VS Realization </span></div><div class="clearfix"></div></a>
        </li> -->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" class="cabang" data-target="#training_side"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">Training</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="training_side" class="collapse collapse-level-1">
                <li>
                    <a class="" href="{{ route('realization') }}">Data Training</a>
                </li>
               {{--<li>
                    <a href="{{ route('ceo') }}">CEO Training</a>
                </li>--}}
                <li>
                    <a  href="{{ route('training') }}">Report Training</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" class="cabang" data-toggle="collapse" data-target="#hrga_side"><div class="pull-left"><i class="fa  fa-shopping-cart mr-20"></i><span class="right-nav-text">HRGA Issue</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="hrga_side" class="collapse collapse-level-1">
                <li>
                    <a class="" href="{{ route('kch') }}">KCH</a>
                </li>
                <li>
                    <a  href="{{ route('kcs') }}">KCS</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('payroll') }}"><div class="pull-left"><i class="fa fa-clipboard mr-20"></i><span class="right-nav-text">Personalia</span></div><div class="clearfix"></div></a>
        </li>
        @if(Auth::user()->role=='Admin')
        <li>
            <a href="{{ route('pengguna') }}"><div class="pull-left"><i class="zmdi zmdi-settings mr-20"></i><span class="right-nav-text">Pengguna</span></div><div class="clearfix"></div></a>
        </li>
        @endif
    </ul>
</div>
@push('script')
<script>
$(function () {
    var url = window.location;
    // for single sidebar menu
    $('ul.side-nav a').filter(function () {
        return this.href == url;
    }).addClass('active');

    //for sidebar menu and treeview
    $('ul.collapse-level-1 a').filter(function () {
        return this.href == url;
    }).parentsUntil(".side-nav > .cabang")
        .addClass('menu-open').prev('a')
        .addClass('active');
});
</script>
@endpush
    <!-- /Left Sidebar Menu -->

