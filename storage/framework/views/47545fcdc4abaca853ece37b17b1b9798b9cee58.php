<div class="sidebar">
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?php echo e(asset('../assets/img/profile.jpg')); ?>" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Hizrian
                            <span class="user-level">LPPM</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item active">
                    <a href="/">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Master</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/mahasiswa">
                                    <span class="sub-item">Mahasiswa</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/avatars.html">
                                    <span class="sub-item">DPL</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/avatars.html">
                                    <span class="sub-item">Periode</span>
                                </a>
                            </li>
                            <li>
                                <a href="/fakultas">
                                    <span class="sub-item">Fakultas</span>
                                </a>
                            </li>
                            <li>
                                <a href="/jurusan">
                                    <span class="sub-item">Jurusan</span>
                                </a>
                            </li>
                            <li>
                                <a href="/lokasi">
                                    <span class="sub-item">Lokasi</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div><?php /**PATH D:\XAMPP\htdocs\project\Laravel\kknsystem-app\resources\views/layout/sidebar.blade.php ENDPATH**/ ?>