<!-- ========== Left Sidebar Start ========== -->
<?php
$this->db->where('username', $this->session->userdata('username'));
$prof = $this->db->get('users')->row();
$tglkemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));
$tglA = date('d');
$getTgl = $tglA - 1;
$kurangTgl        = mktime(0, 0, 0, date("n"), date("j") - $getTgl, date("Y"));
$hasilTgl = date('Y-m-d', $kurangTgl);
?>
<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
        <?php if (empty($prof->foto)) : ?>
            <img src="<?= base_url() ?>assets/images/profiles/profil1.png" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
            <img src="<?= base_url() ?>assets/images/profiles/profil1.png" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />
        <?php else : ?>
            <img src="<?= base_url('assets/images/profiles/' . $prof->foto) ?>" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
            <img src="<?= base_url('assets/images/profiles/' . $prof->foto) ?>" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />
        <?php endif ?>
        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0"><?= $this->session->userdata('namaLengkap') ?></h6>
            <span class="pro-user-desc">Administrator</span>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown">
<!--                 

                <div class="dropdown-divider"></div> -->

                <a href="<?= base_url('auth/logout') ?>" class="dropdown-item notify-item">
                    <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-content">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            <ul class="metismenu" id="menu-bar">
                <li class="menu-title">DASHBOARD</li>

                <li>
                    <a href="<?= base_url('admin/dashboard') ?>">
                        <i data-feather="home"></i>
                        <!-- <span class="badge badge-success float-right">1</span> -->
                        <span> Dashboard </span>
                    </a>
                </li>
                                
                <li class="menu-title">Akademik</li>

                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="database"></i>
                        <span> Data Master </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="<?= base_url('datamaster/guru') ?>">Guru</a>
                        </li>
                        <li>
                            <a href="<?= base_url('datamaster/siswa') ?>">Siswa</a>
                        </li>
                        <li>
                            <a href="<?= base_url('datamaster/kelas') ?>">Kelas</a>
                        </li>
                        <li>
                            <a href="<?= base_url('datamaster/ta') ?>">Tahun Akademik</a>
                        </li>
                        <li>
                            <a href="<?= base_url('datamaster/users') ?>">Users</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title">Report</li>
                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="printer"></i>
                        <span> Laporan </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="javascript: void(0);">
                                <span> Akademik </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="<?= base_url('laporan/lguru') ?>" target="_blank">Data Guru</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('laporan/lsiswa') ?>" target="_blank">Data Semua Siswa</a>
                                </li>
                                
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

<!-- Modal -->

<!-- honor pengajar -->
<div class="modal fade" id="m_hpengajar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('laporan/hpengajar') ?>" method="post" target="_blank">
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Bulan</label>
                        <?= droplist_filter('filter', 'honorarium', 'tahunAjaran', 'tanggal', 'jenisHonorarium', 'idHonorarium', 'hpengajar') ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Print</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- honor walikelas  -->
<div class="modal fade" id="m_hwalikelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('laporan/hwalikelas') ?>" method="post" target="_blank">
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Bulan</label>
                        <?= droplist_filter('filter', 'honorarium', 'tahunAjaran', 'tanggal', 'jenisHonorarium', 'idHonorarium', 'hwalikelas') ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Print</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- honor tatausaha -->
<div class="modal fade" id="m_htatausaha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('laporan/htatausaha') ?>" method="post" target="_blank">
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Bulan</label>
                        <?= droplist_filter('filter', 'honorarium', 'tahunAjaran', 'tanggal', 'jenisHonorarium', 'idHonorarium', 'htatausaha') ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Print</button>
                </form>
            </div>
        </div>
    </div>
</div>
