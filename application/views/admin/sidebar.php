<div id="page-sidebar" class="scrollable-content">
                <div id="sidebar-menu">
                    <ul>
                        <li <?php if($uri1=='dashboard') echo 'class="active"'; ?>>
                            <a href="<?php echo base_url() ?>index.php/admin/dashboard/" title="Dashboard">
                                <i class="glyph-icon icon-dashboard"></i>
                              		Dashboard
                            </a>
                        </li>
                        <li <?php if($uri1=='category') echo 'class="active"'; ?>>
                            <a href="javascript:;" title="Components">
                                <i class="glyph-icon icon-code"></i>
                                Manage Categories
                            </a>
                            <ul <?php if($uri1=='category') echo 'style="display:block;"'; ?> >
                                <li <?php if($uri2=='add') echo 'class="current-page"'; ?> >
                                    <a href="<?php echo base_url() ?>index.php/admin/category/add/" title="Dashboard panels">
                                        <i class="glyph-icon icon-chevron-right"></i>
                                        Add Category
                                    </a>
                                </li>
                                <li <?php if($uri2=='catlist') echo 'class="current-page"'; ?>>
                                    <a href="<?php echo base_url() ?>index.php/admin/category/catlist/" title="Tile buttons">
                                        <i class="glyph-icon icon-chevron-right"></i>
                                        List Category
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li <?php if($uri1=='menu') echo 'class="active"'; ?>>
                            <a href="javascript:;" title="Components">
                                <i class="glyph-icon icon-code"></i>
                                Manage Menu
                            </a>
                            <ul <?php if($uri1=='menu') echo 'style="display:block;"'; ?> >
                                <li <?php if($uri2=='add') echo 'class="current-page"'; ?> >
                                    <a href="<?php echo base_url() ?>index.php/admin/menu/add/" title="Dashboard panels">
                                        <i class="glyph-icon icon-chevron-right"></i>
                                        Add Menu
                                    </a>
                                </li>
                                <li <?php if($uri2=='menulist') echo 'class="current-page"'; ?>>
                                    <a href="<?php echo base_url() ?>index.php/admin/menu/menulist/" title="Tile buttons">
                                        <i class="glyph-icon icon-chevron-right"></i>
                                        List Menu
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li <?php if($uri1=='pages') echo 'class="active"'; ?>>
                            <a href="javascript:;" title="Pages">
                                <i class="glyph-icon icon-folder-open"></i>
                                Manage Pages
                            </a>
                             <ul <?php if($uri1=='category') echo 'style="display:block;"'; ?> >
                                <li <?php if($uri2=='catlist') echo 'class="current-page"'; ?>>
                                    <a href="<?php echo base_url() ?>index.php/admin/pages/pagelist/" title="Tile buttons">
                                        <i class="glyph-icon icon-chevron-right"></i>
                                        List Pages
                                    </a>
                                </li>
                            </ul>
                           </li>
                        <li <?php if($uri1=='location') echo 'class="active"'; ?>>
                            <a href="javascript:;" title="Widgets">
                                <i class="glyph-icon icon-tags"></i>
                               Manage Locations
                            </a>
                            <ul  <?php if($uri1=='location') echo 'style="display:block;"'; ?>>
                                <li <?php if($uri2=='add') echo 'class="current-page"'; ?>>
                                    <a href="<?php echo base_url() ?>index.php/admin/location/add/" title="Tabs">
                                        <i class="glyph-icon icon-chevron-right"></i>
                                        Add Location
                                    </a>
                                </li>
                                <li <?php if($uri2=='loclist') echo 'class="current-page"'; ?>>
                                    <a href="<?php echo base_url() ?>index.php/admin/location/loclist/" title="Accordions">
                                        <i class="glyph-icon icon-chevron-right"></i>
                                        List Locations
                                    </a>
                                </li>
                            </ul>
                        </li>
                       <!-- <li <?php if($uri1=='updatestock') echo 'class="active current-page"'; ?> >
                            <a href="<?php echo base_url() ?>index.php/admin/updatestock/" title="Elements">
                                <i class="glyph-icon icon-laptop"></i>
                                Applications
                            </a>
                        </li> -->
                       <li <?php if($uri1=='jobs') echo 'class="active"'; ?>>
                            <a href="javascript:;" title="Charts">
                                <i class="glyph-icon icon-bar-chart-o"></i>
                                Jobs Management
                            </a>
                            <ul  <?php if($uri1=='jobs') echo 'style="display:block;"'; ?>>
                                <li <?php if($uri2=='add_job') echo 'class="add_job"'; ?>>
                                    <a href="<?php echo base_url() ?>index.php/admin/jobs/add_job/" title="Pie Gauges">
                                        <i class="glyph-icon icon-chevron-right"></i>
                                        Add Job
                                    </a>
                                </li>
                                <li <?php if($uri2=='joblist' || $uri2=='edit') echo 'class="joblist"'; ?>>
                                    <a href="<?php echo base_url() ?>index.php/admin/jobs/joblist" title="xCharts">
                                        <i class="glyph-icon icon-chevron-right"></i>
                                        List Jobs
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li <?php if($uri1=='users') echo 'class="active"'; ?>>
                            <a href="javascript:;" title="Tables">
                                <i class="glyph-icon icon-table"></i>
                                User Management
                            </a>
                            <ul  <?php if($uri1=='users') echo 'style="display:block;"'; ?>>
                                <li <?php if($uri2=='list') echo 'class="list"'; ?>>
                                    <a href="<?php echo base_url() ?>index.php/admin/users/userlist/" title="Dynamic tables">
                                        <i class="glyph-icon icon-chevron-right"></i>
                                        List User
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="divider mrg5T mobile-hidden"></div>
                    <div class="text-center mobile-hidden">
                        <div class="button-group display-inline">
                            <a href="javascript:;" class="btn medium bg-green tooltip-button" data-placement="top" title="Messages">
                                <i class="glyph-icon icon-flag"></i>
                            </a>
                            <a href="javascript:;" class="btn medium bg-green tooltip-button" data-placement="top" title="Mailbox">
                                <i class="glyph-icon icon-inbox"></i>
                            </a>
                            <a href="javascript:;" class="btn medium bg-green tooltip-button" data-placement="top" title="Content">
                                <i class="glyph-icon icon-hdd"></i>
                            </a>
                        </div>

                    </div>
                </div>

            </div><!-- #page-sidebar -->