<ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu {{ request()->is('/') ? 'active' : ''}}">
                <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="{{ request()->is('/') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Dashboard</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('/') ? 'show' : ''}}" id="dashboard" data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('/') ? 'active' : ''}}">
                        <a href="/"> Analytics </a>
                    </li>
                </ul>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Main Menu</span></div>
            </li>
           <?php
            $collectionOfRoles=App\Http\Controllers\UserRoleController::allRoles();
           ?>
            @if(auth()->user()->hasAnyRole($collectionOfRoles))
           
            @if(auth()->user()->hasDirectPermission('students'))
            <li class="menu {{ request()->is('students') || request()->is('students/*') ? 'active' : ''}}">
                <a href="#students" data-bs-toggle="collapse" aria-expanded="{{ request()->is('students') || request()->is('students/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Students</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('students') || request()->is('students/*') ? 'show' : ''}}" id="students" data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('students') ? 'active' : ''}}">
                        <a href="/students"> All Students </a>
                    </li>
                    <li class="{{ request()->is('students/create') ? 'active' : ''}}">
                        <a href="/students/create"> Add Student </a>
                    </li>                   
                </ul>
            </li>
            @endif
            <!-- @if(auth()->user()->hasDirectPermission('student-attendence'))
            <li class="menu {{ request()->is('student-attendence') || request()->is('student-attendence/*') ? 'active' : ''}}">
                <a href="#attendence" data-bs-toggle="collapse" aria-expanded="{{ request()->is('student-attendence') || request()->is('student-attendence/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Student Attendence</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('student-attendence') || request()->is('student-attendence/*') ? 'show' : ''}}" id="attendence" data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('student-attendence') ? 'active' : ''}}">
                    <form action="/student-attendence" method="Post">
                        @csrf
                       <a href="javascript:{}" onclick="this.closest('form').submit();">Students Attendence</a>
                    </form>
                       
                    </li>
                    
                                    
                </ul>
            </li>
            @endif -->
            @if(auth()->user()->hasDirectPermission('employee-attendence'))
            <li class="menu {{ request()->is('employee-attendence') || request()->is('employee-attendence/*') ? 'active' : ''}}">
                <a href="#empattendence" data-bs-toggle="collapse" aria-expanded="{{ request()->is('employee-attendence') || request()->is('employee-attendence/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Employee Attendence</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('employee-attendence') || request()->is('employee-attendence/*') ? 'show' : ''}}" id="empattendence" data-bs-parent="#accordionExample">
                    
                    <li class="{{ request()->is('employee-attendence') ? 'active' : ''}}">
                       <form action="/employee-attendence" method="Post">
                        @csrf
                          <a href="javascript:{}" onclick="this.closest('form').submit();">Employee Attendence</a>
                       </form>
                       
                    </li>
                                    
                </ul>
            </li>
            @endif


            @if(auth()->user()->hasDirectPermission('students'))
            <!-- <li class="menu {{ request()->is('studentSchools') || request()->is('studentSchools/*') ? 'active' : ''}}">
                <a href="#studentSchools" data-bs-toggle="collapse" aria-expanded="{{ request()->is('studentSchools') || request()->is('studentSchools/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span>Students School</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('studentSchools') || request()->is('studentSchools/*') ? 'show' : ''}}" id="studentSchools" data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('studentSchools') ? 'active' : ''}}">
                        <a href="/studentSchools"> All Students School </a>
                    </li>
                    <li class="{{ request()->is('students/create') ? 'active' : ''}}">
                        <a href="/studentSchools/create"> Add Student School </a>
                    </li>                   
                </ul>
            </li> -->
            @endif

            @if(auth()->user()->hasDirectPermission('parents'))
            <li class="menu {{ request()->is('parents') || request()->is('parents/*') ? 'active' : ''}}">
                <a href="#parents" data-bs-toggle="collapse" aria-expanded="{{ request()->is('parents') || request()->is('parents/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Parents</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('parents') || request()->is('parents/*') ? 'show' : ''}}" id="parents" data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('parents') ? 'active' : ''}}">
                        <a href="/parents"> All Parents </a>
                    </li>
                    <li class="{{ request()->is('parents/create') ? 'active' : ''}}">
                        <a href="/parents/create"> Add Parent </a>
                    </li>                   
                </ul>
            </li>
            @endif


            @if(auth()->user()->hasDirectPermission('families'))
            <li class="menu {{ request()->is('families') || request()->is('families/*') ? 'active' : ''}}">
                <a href="#families" data-bs-toggle="collapse" aria-expanded="{{ request()->is('families') || request()->is('families/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-family"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Families</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('families') || request()->is('families/*') ? 'show' : ''}}" id="families" data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('families') ? 'active' : ''}}">
                        <a href="/families"> All Families </a>
                    </li>
                    <li class="{{ request()->is('families/create') ? 'active' : ''}}">
                        <a href="/families/create"> Add Family </a>
                    </li>                   
                </ul>
            </li>
            @endif



            @if(auth()->user()->hasDirectPermission('employees'))
            <li class="menu {{ request()->is('employees') || request()->is('employees/*') ? 'active' : ''}}">
                <a href="#employees" data-bs-toggle="collapse" aria-expanded="{{ request()->is('employees') || request()->is('employees/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                        <span>Employees</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('employees') || request()->is('employees/*') ? 'show' : ''}}" id="employees" data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('employees') ? 'active' : ''}}">
                        <a href="/employees"> All Employees </a>
                    </li>
                    <li class="{{ request()->is('employees/create') ? 'active' : ''}}">
                        <a href="/employees/create"> Add Employee </a>
                    </li>                   
                </ul>
            </li>
            @endif

            @if(auth()->user()->hasDirectPermission('classes'))
            <li class="menu {{ request()->is('classes') || request()->is('classes/*') || request()->is('class-sections') || request()->is('class-sections/*') ? 'active' : ''}}">
                <a href="#classes" data-bs-toggle="collapse" aria-expanded="{{ request()->is('classes') || request()->is('classes/*') || request()->is('class-sections/*') || request()->is('class-sections') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"/><polygon points="12 15 17 21 7 21 12 15"/></svg>
                        <span>Classes</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('classes') || request()->is('classes/*') || request()->is('classes/*') || request()->is('class-sections')  ? 'show' : ''}}" id="classes" data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('classes') ? 'active' : ''}}">
                        <a href="/classes"> All Classes </a>
                    </li>
                    <li class="{{ request()->is('classes/create') ? 'active' : ''}}">
                        <a href="/classes/create"> Add Class </a>
                    </li>  
                              
                </ul>
            </li>
            @endif


            @if(auth()->user()->hasDirectPermission('class-sections'))
            <li class="menu {{ request()->is('class-sections') || request()->is('class-sections/*') ? 'active' : ''}}">
                <a href="#class-sections" data-bs-toggle="collapse" aria-expanded="{{ request()->is('class-sections') || request()->is('class-sections/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg>
                        <span>Class Sections</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('class-sections') || request()->is('class-sections/*') ? 'show' : ''}}" id="class-sections" data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('class-sections') ? 'active' : ''}}">
                        <a href="/class-sections"> All Class Section </a>
                    </li>
                    <li class="{{ request()->is('class-sections/create') ? 'active' : ''}}">
                        <a href="/class-sections/create"> Add Section </a>
                    </li>                   
                </ul>
            </li>
            @endif



            @if(auth()->user()->hasDirectPermission('academic_sessions'))
            <li class="menu {{ request()->is('academic-sessions') || request()->is('academic-sessions/*') ? 'active' : ''}}">
                <a href="#academic-sessions" data-bs-toggle="collapse" aria-expanded="{{ request()->is('academic-sessions') || request()->is('academic-sessions/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg>
                        <span>Academic Sessions</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('academic-sessions') || request()->is('academic-sessions/*') ? 'show' : ''}}" id="academic-sessions" data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('academic-sessions') ? 'active' : ''}}">
                        <a href="/academic-sessions"> All Academic Sessions </a>
                    </li>
                    <li class="{{ request()->is('academic-sessions/create') ? 'active' : ''}}">
                        <a href="/academic-sessions/create"> Add Academic Sessions </a>
                    </li>                   
                </ul>
            </li>
            @endif


            @if(auth()->user()->hasDirectPermission('campuses'))
            <li class="menu {{ request()->is('campuses') || request()->is('campuses/*') ? 'active' : ''}}">
                <a href="#campuses" data-bs-toggle="collapse" aria-expanded="{{ request()->is('campuses') || request()->is('campuses/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Campuses</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('campuses') || request()->is('campuses/*') ? 'show' : ''}}" id="campuses" data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('campuses') ? 'active' : ''}}">
                        <a href="/campuses"> All Campuses </a>
                    </li>
                    <li class="{{ request()->is('campuses/create') ? 'active' : ''}}">
                        <a href="/campuses/create"> Add Campus </a>
                    </li>                   
                </ul>
            </li>
            @endif


            @if(auth()->user()->hasDirectPermission('country'))
            <li class="menu {{ request()->is('country') || request()->is('country/*') ? 'active' : ''}}">
                <a href="#country" data-bs-toggle="collapse" aria-expanded="{{ request()->is('country') || request()->is('country/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                        <span>Locations</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('country') || request()->is('country/*') ? 'show' : ''}}" id="country" data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('country') ? 'active' : ''}}">
                        <a href="/country"> Countries </a>
                    </li>
                           
                    <li class="{{ request()->is('city') ? 'active' : ''}}">
                        <a href="/city"> Cities </a>
                    </li>     
                      
                    <li class="{{ request()->is('town') ? 'active' : ''}}">
                        <a href="/town"> Towns </a>
                    </li>
                       
                </ul>
            </li>
            @endif


            @if(auth()->user()->hasDirectPermission('fee-head'))
            <li class="menu {{ request()->is('fee-head') || request()->is('fee-head/*') ? 'active' : ''}}">
                <a href="#fee-head" data-bs-toggle="collapse" aria-expanded="{{ request()->is('fee-head') || request()->is('fee-head/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                        <span>Acounting</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('fee-head') || request()->is('fee-head/*') ? 'show' : ''}}" id="fee-head" data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('fee-head') ? 'active' : ''}}">
                        <a href="/fee-head"> Fee Head</a>
                    </li>
                                      
                </ul>
            </li>
            @endif
            @if(auth()->user()->hasDirectPermission('all-fees'))
            <li class="menu {{ request()->is('paid-fees') || request()->is('generate-challan') || request()->is('paid-fees/*') ? 'active' : ''}}">
                <a href="#paid-fees" data-bs-toggle="collapse" aria-expanded="{{ request()->is('paid-fees') || request()->is('generate-challan') || request()->is('paid-fees/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Paid Fees</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('paid-fees') || request()->is('paid-fees/*') ? 'show' : ''}}" id="paid-fees" data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('paid-fees') ? 'active' : ''}}">
                       
                        <form action="/paid-fees" method="Post">
                        @csrf
                       <a href="javascript:{}" onclick="this.closest('form').submit();">Student Invoice</a>
                    </form>
                    </li>
                                   
                </ul>


                <ul class="collapse submenu list-unstyled" id="paid-fees" data-bs-parent="#accordionExample">
                    <li>
                        <a href="/parentallInvoices"> Parent Invoice </a>
                    </li>
                                   
                </ul>


                <ul class="collapse submenu list-unstyled" id="paid-fees" data-bs-parent="#accordionExample">
                    <li>
                        <a href="/invoices"> All Invoices </a>
                    </li>
                    <li>
                        
                    <!-- <form action="/generate-challan" method="Post">
                        @csrf
                       <a href="javascript:{}" onclick="this.closest('form').submit();">Challan Genration</a>
                    </form> -->
                    <a href="/generate-challan">Challan Generation </a>
                        
                    </li>
                                   
                </ul>



            </li>
            @endif
          
            @if(auth()->user()->hasDirectPermission('user-management'))
            <li class="menu {{ request()->is('users') || request()->is('userlog') || request()->is('users/*') ? 'active' : ''}}">
                <a href="#users" data-bs-toggle="collapse" aria-expanded="{{ request()->is('users') || request()->is('users/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>User Management</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('users') || request()->is('users/*') ? 'show' : ''}}" id="users" data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('users') ? 'active' : ''}}">
                        <a href="/users"> All Users </a>
                    </li>
                    @if(auth()->user()->hasRole('Super Admin'))
                    <li class="{{ request()->is('userlog') ? 'active' : ''}}">
                        <a href="/userlog">User logs </a>
                    </li>
                    @endif
                                   
                </ul>
            </li>
            @endif
            @if(auth()->user()->hasDirectPermission('front-office'))
            <li class="menu {{ request()->is('school-visitors') || request()->is('school-visitor') || request()->is('school-visitors/*') ? 'active' : ''}}">
                <a href="#front-office" data-bs-toggle="collapse" aria-expanded="{{ request()->is('school-visitor') || request()->is('school-visitors/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>School Visitors</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('school-visitor') || request()->is('school-visitors/*') ? 'show' : ''}}" id="front-office" data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('school-visitor') ? 'active' : ''}}">
                        
                        <form action="/school-visitor" method="Post">
                        @csrf
                         <a href="javascript:{}" onclick="this.closest('form').submit();">School Visitors</a>
                        </form>
                    </li>
                    
                                   
                </ul>
            </li>
            @endif
            @if(auth()->user()->hasDirectPermission('user-management'))
            <li class="menu {{ request()->is('crm-settings') || request()->is('crm-settings/*') ? 'active' : ''}}">
                <a href="#crm" data-bs-toggle="collapse" aria-expanded="{{ request()->is('crm-settings') || request()->is('crm-settings/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                        <span>Settings</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('crm-settings') || request()->is('crm-settings/*') ? 'show' : ''}}" id="crm" data-bs-parent="#accordionExample">
                    
                    @if(auth()->user()->hasAnyRole(['Super Admin','Admin']))
                    <li class="{{ request()->is('crm-settings') ? 'active' : ''}}">
                        <a href="/crm-settings">CRM Settings</a>
                    </li>
                    @endif
                    <!-- @if(auth()->user()->hasRole('Admin'))
                    <li  class="{{request()->is('campuses/*') ? 'active' : ''}}">
                      <a href="{{route('campuses.edit',1)}}">
                       Campus
                      </a>
                
                   </li>
                   @endif -->
                                   
                </ul>
            </li>
            @endif
            @if(auth()->user()->hasDirectPermission('permission-managment'))
            @if(auth()->user()->hasRole('Super Admin'))
            <li class="menu {{ request()->is('permissions') ||  request()->is('permissions/*') ? 'active' : ''}}">
                <a href="#roles" data-bs-toggle="collapse" aria-expanded="{{ request()->is('permissions') || request()->is('permissions/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Role & Permissions</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('roles') || request()->is('roles/*') ? 'show' : ''}}" id="roles" data-bs-parent="#accordionExample">
                  
                
                    <li class="{{ request()->is('roles') ? 'active' : ''}}">
                        <a href="/roles"> All Roles</a>
                    </li>
                  
                    <li class="{{ request()->is('permissions') ? 'active' : ''}}">
                        <a href="/permissions"> All Permissions</a>
                    </li>
                                   
                </ul>
            </li>
            @endif
            @endif
            @if(auth()->user()->hasDirectPermission('user-complaints'))
            <li class="menu {{ request()->is('complaint') ||  request()->is('complaint/*') ? 'active' : ''}}">
                <a href="#complaint" data-bs-toggle="collapse" aria-expanded="{{ request()->is('complaint') || request()->is('complaint/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Complaints</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('complaint') || request()->is('complaint/*') ? 'show' : ''}}" id="complaint" data-bs-parent="#accordionExample">
                  
                
                    <li class="{{ request()->is('complaint') ? 'active' : ''}}">
                        <a href="/complaint"> Complaints</a>
                    </li>
                  
                    
                                   
                </ul>
            </li>
            @endif

            @if(auth()->user()->hasDirectPermission('reports'))
            <li class="menu {{ request()->is('reports') || request()->is('reports-defaulters') || request()->is('reports/*') ? 'active' : ''}}">
                <a href="#reports" data-bs-toggle="collapse" aria-expanded="{{ request()->is('reports') || request()->is('reports-defaulters') || request()->is('reports/*') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Reports</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('reports') || request()->is('reports-defaulters') || request()->is('reports/*') ? 'show' : ''}}" id="reports" data-bs-parent="#accordionExample">
                    <li class="{{ request()->is('reports') ? 'active' : ''}}">

                    <form action="/reports" method="Post">
                        @csrf
                       <a href="javascript:{}" onclick="this.closest('form').submit();"> Fee Reports</a>
                    </form>
                    </li>
                    <li class="{{ request()->is('reports-defaulters') ? 'active' : ''}}">

                    <form action="/reports-defaulters" method="Post">
                        @csrf
                       <a href="javascript:{}" onclick="this.closest('form').submit();"> Fee Defaulters</a>
                    </form>
                    </li>
                                   
                    <!-- <li class="{{ request()->is('') ? 'active' : ''}}">
                        <a href="/reports"> Exam Reports</a>
                    </li>
                        
                    <li class="{{ request()->is('') ? 'active' : ''}}">
                        <a href="/reports"> Expensive Reports </a>
                    </li>
                                   
                    <li class="{{ request()->is('') ? 'active' : ''}}">
                        <a href="/reports"> Attandence Reports </a>
                    </li> -->
                                   
                </ul>
            </li>
            @endif


            
           
        @endif
           


         
            
          
            
        </ul>