<?php
        if (!empty($_GET['user_id']) && !empty($_GET['email_type'])) {
            $user_id = $_GET['user_id'];
            $email_type = $_GET['email_type'];
            if (!empty($_GET['status']) && !empty($_GET['id'])) {
                $action = route('login',['user_id='.$user_id,'email_type='.$email_type,'status='.$_GET['status'],'id='.$_GET['id']]);
            } elseif (!empty($_GET['status'])) {
                $action = route('login',['user_id='.$user_id,'email_type='.$email_type,'status='.$_GET['status']]);
            } elseif (!empty($_GET['invoice_id'])) {
                $action = route('login',['user_id='.$user_id,'email_type='.$email_type,'invoice_id='.$_GET['invoice_id']]);
            } else {
                $action = route('login',['user_id='.$user_id,'email_type='.$email_type]);
            }
        }else{
            $action = route('login');
        }
        $reg_data = App\SiteManagement::getMetaValue('reg_data');
        $login_focus = '';
        $register_focus = '';
        if (!empty($_GET['type'])) {
            if ($_GET['type'] == 'login') {
                $login_focus = 'autofocus';
            } elseif ($_GET['type'] == 'register') {
                $register_focus = 'autofocus';
            }
        }
    ?>


<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-3 float-right">
    <aside id="sj-asidebar" class="sj-asidebar sj-widgetbox">
        <div class="sj-widgetdashboard">
       <!--   <nav id="sj-dashboardnav" class="sj-dashboardnav"> -->
            <nav id="sj-dashboardnav">
                <ul>
                  <?php if(empty(Auth::user()->id)): ?>
                        <li class="">
                          <?php if(Session::has('message')): ?>
                    <div class="toast-holder">
                        <flash_messages :message="'<?php echo e(Session::get('message')); ?>'" :message_class="'success'" v-cloak></flash_messages>
                    </div>
                <?php elseif(Session::has('error')): ?>
                    <div class="toast-holder">
                        <flash_messages :message="'<?php echo e(Session::get('error')); ?>'" :message_class="'danger'" v-cloak></flash_messages>
                    </div>
                <?php endif; ?>
                <div class="provider-site-wrap" v-show="loading" v-cloak><div class="provider-loader"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>
                          <aside id="sj-sidebarvtwo" class="sj-sidebar">
                            
                        <div class="sj-widget sj-widgetlogin">
                            <div class="p-3">
                                <h4>LOGIN</h4>
                            </div>
                            <div class="sj-widgetcontent">
                                <form method="POST" action="<?php echo e($action); ?>" class="sj-formtheme sj-formlogin">
                                    <?php echo csrf_field(); ?>
                                    <fieldset>
                                        <div class="form-group">
                                            <input type="email" name="email" value="<?php echo e($errors->has('email') ? old('email') : ''); ?>" class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>"
                                            placeholder="<?php echo e(trans('prs.ph_email')); ?>" <?php echo e($login_focus); ?>>
                                            <?php if($errors->has('email')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(trans('prs.ph_pass')); ?>">
                                            <?php if($errors->has('password')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group sj-forgotpass">
                                            <div class="sj-checkbox">
                                                <input type="checkbox" id="remember" name="remember">
                                                <label for="remember"><?php echo e(trans('prs.keep_logged_in')); ?></label>
                                            </div>
                                    
                                        </div>
                                        <div class="sj-btnarea">
                                            <button type="submit" class="sj-btn sj-btnactive"><?php echo e(trans('prs.btn_login')); ?></button>
                                        </div>

                                    </fieldset>
                                </form>
                                
                            </div>
                        </div>
                        
                    </aside>

                    
                        </li>
                        <?php endif; ?>
                        <li class="">
                            <div class="p-3"><h4>CITATION ANALYSIS</h4></div>
                            <ul>
                             <li><a href="">. Academia.edu</a></li>
                             <li><a href="">. Dimensions</a></li>
                             <li><a href="">. Google Scholar</a></li>
                             <li><a href="">. Scimagojr</a></li>
                             <li><a href="">. Scholar Metrics</a></li>
                             <li><a href="">. Scilit</a></li>
                             <li><a href="">. Scinapse</a></li>
                             <li><a href="">. Scopus</a></li>
                           </ul>
                        </li>

                        <li class="">
                            <div class="p-3"><h4>QUICK LINKS</h4></div> 
                             <ul>
                               <li>Editorial Boards</li>
                               <li>Abstracting and Indexing</li>
                               <li>Focus and Scope</li>
                               <li>Author Guideline</li>
                               <li>Online Submission</li>
                               <li>Publication Ethics</li>
                               <li>The Best Journal</li>
                               <li>Contact Us</li>
                             </ul>
                        </li>
                      
                        <li class="">
                            <div class="p-3"><h4>BROWSERS</h4></div>
                               <ul>
                                 <li>By Issus</li>
                                 <li>By Authors</li>
                                 <li>By Title</li>
                               </ul>
                        </li>
                        
                        <li class="">
                            <div class="p-3"><h4>INFORMATION</h4></div> 
                           <ul>
                             <li>For Readers</li>
                             <li>For Authors</li>
                             <li>For Librarians</li>
                           </ul>
                    
                </ul>
                
            </nav>
        </div>
    </aside>
</div>



