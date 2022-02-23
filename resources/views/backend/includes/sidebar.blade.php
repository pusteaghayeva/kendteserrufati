 <!--- Sidemenu -->
 <div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li>
            <a href="{{route('backend.dashboard')}}" class="waves-effect">
                <i class="bx bx-chat"></i>
                <span key="t-chat">İdarəetmə paneli</span>
            </a>
        </li>
        <li>
            <a href="{{route('backend.admins.index')}}" class="waves-effect">
                <i class="bx bx-user-circle"></i>
                <span key="t-chat">Admin</span>
            </a>
        </li>
  
        
        <li>
            <a href="{{route('backend.news.index')}}" class="waves-effect">
                <i class="bx bx-detail"></i>
                <span key="t-chat">Xəbərlər</span>
            </a>
        </li>
     

        <li>
            <a href="{{route('backend.sliders.index')}}" class="waves-effect">
                <i class="bx bx-aperture"></i>
                <span key="t-chat">Slayd</span>
            </a>
        </li>


        <li>
            <a href="{{route('backend.laws.index')}}" class="waves-effect">
                <i class="bx bx-briefcase-alt-2"></i>
                <span key="t-chat">Qanunvericilik</span>
            </a>
        </li>

        <li>
            <a href="{{route('backend.colleges.index')}}" class="waves-effect">
                <i class="bx bx-list-ul"></i>
                <span key="t-chat">Kollegiya</span>
            </a>
        </li>

        <li>
            <a href="{{route('backend.videos.index')}}" class="waves-effect">
                <i class="bx bx-tone"></i>
                <span key="t-chat">Video qalereya</span>
            </a>
        </li>

        <li>
            <a href="{{route('backend.categories.index')}}" class="waves-effect">
                <i class="bx bx-list-ul"></i>
                <span key="t-chat">Kateqoriyalar</span>
            </a>
        </li>
   

        <li>
            <a href="{{route('backend.static_pages.index')}}" class="waves-effect">
                <i class="bx bx-file"></i>
                <span key="t-chat">Statik səhifələr</span>
            </a>
        </li>

        <li>
            <a href="{{route('backend.aqrarnews.index')}}" class="waves-effect">
                <i class="bx bx-list-ul"></i>
                <span key="t-chat">Aqrar xəbərlər</span>
            </a>
        </li>


        <li>
            <a href="{{route('backend.aqrarcategories.index')}}" class="waves-effect">
                <i class="bx bx-list-ul"></i>
                <span key="t-chat">Aqrar kateqoriya</span>
            </a>
        </li>

        <li>
            <a href="{{route('backend.photos.index')}}" class="waves-effect">
                <i class="bx bx-images"></i>
                <span key="t-chat">Fotoqalereya</span>
            </a>
        </li>



        <li>
            <a href="{{route('backend.settings.edit', ['setting' =>1])}}" class="waves-effect">
                <i class="bx bx-cog"></i>
                <span key="t-chat">Tənzimləmələr</span>
            </a>
        </li>


    </ul>
</div>
<!-- Sidebar -->