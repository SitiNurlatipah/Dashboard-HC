<!-- Left Sidebar Menu -->
    <div class="fixed-sidebar-left">
        <ul class="nav navbar-nav side-nav nicescroll-bar">
            <li class="navigation-header">
                <span>Main</span> 
                <i class="zmdi zmdi-more"></i>
            </li>
            <li>
                <a href="{{ route('dashboard') }}"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dasboard</span></div><div class="clearfix"></div></a>
                
            </li>
            <li>
                <a href="{{ route('user') }}"><div class="pull-left"><i class="fa fa-history mr-20"></i><span class="right-nav-text">Management User</span></div><div class="clearfix"></div></a>
            </li>
            <li>
                <a href="{{ route('locater') }}"><div class="pull-left"><i class="fa fa-bolt mr-20"></i><span class="right-nav-text">Locater</span></div><div class="clearfix"></div></a>
            </li>
            <li>
                <a href="{{ route('module') }}"><div class="pull-left"><i class="fa fa-tasks mr-20"></i><span class="right-nav-text">PM Module</span></div><div class="clearfix"></div></a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="fa fa-group mr-20"></i><span class="right-nav-text">Management Employee</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                <ul id="dashboard_dr" class="collapse collapse-level-1">
				    <li>
						<a href="{{ route('employee') }}">Data Employee</a>
					</li>
                    <li>
						<a href="{{ route('chart') }}">Grafik Data Employee</a>
					</li> 
                </ul>
            </li>
            <li><hr class="light-grey-hr mb-10"/></li>
            {{-- <li class="navigation-header">
                <span>compo</span> 
                <i class="zmdi zmdi-more"></i>
            </li> --}}
            {{-- <li><hr class="light-grey-hr mb-10"/></li>
            <li class="navigation-header">
                <span>featured</span> 
                <i class="zmdi zmdi-more"></i>
            </li> --}}
        </ul>
    </div>
    <!-- /Left Sidebar Menu -->

