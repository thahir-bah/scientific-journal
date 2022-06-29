


<?php $__env->startSection('title'); ?><?php echo e(!empty($article) ? $article->title : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description', '$meta_desc'); ?>
<?php $__env->startSection('content'); ?>
    <?php if(Session::has('payment_message')): ?>
        <?php $response = Session::get('payment_message') ?>
        <div class="toast-holder">
            <div id="toast-container">
                <div class="alert toast-<?php echo e($response['code']); ?> alart-message alert-dismissible fade show fixed_message">
                    <div class="toast-message">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <?php echo e($response['message']); ?>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php
    if (Schema::hasTable('users')){
        $slide_unserialize_array = App\SiteManagement::getMetaValue('slides');
        $welcome_slide_unSerialize_array = App\SiteManagement::getMetaValue('welcome_slides');
        $published_articles = App\Article::getPublishedArticle();
        $page_slug  = App\SiteManagement::getMetaValue('pages');
        $page_data = App\Page::getPageData($page_slug[0]);
        if(!empty($page_data)){
        $welcome_desc = preg_replace("/<img[^>]+\>/i", " ", $page_data->body);
        }else{
            $welcome_desc = "";
        }
    }
    ?>
     <?php if(!empty($slide_unserialize_array)): ?>
    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-9 float-left mt-0 pt-0">
        <h2><?php echo e($article->title); ?></h2> 
                <div class="h4 pb-2 mb-4 text-dark border-bottom border-dark" style="position: flex; width: 100%;"></div>
                <div>
                    <h3>Authors:</h3> 
                    <span class="sj-username inline"><?php echo e(App\User::getUserNameByID($article->corresponding_author_id)); ?></span>
                                                        
                </div>
                <br>
                <h3>Abstract</h3>
                <div class="sj-description"><?php echo e($article->excerpt); ?></div>
                <a href="<?php echo e(route('getPublishFile', $article->submitted_document)); ?>">
                    <i class="fa fa-download"></i><?php echo e(trans('prs.btn_download')); ?>

                </a>
                
        <!--<div id="sj-homebanner" class="sj-homebanner owl-carousel">
            <?php $__currentLoopData = $slide_unserialize_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="sj-postbook">
                                <figure class="sj-featureimg">
                                    <div class="sj-bookimg">
                                        <div class="sj-frontcover">
                                            <img src="<?php echo e(asset('uploads/slider/images/'.$slide['slide_image'])); ?>" alt="<?php echo e(trans('prs.slide_img')); ?>">
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                        <?php if(!empty($slide['slide_title']) || !empty($slide['slide_desc']) ): ?>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="sj-bannercontent">
                                <h1><?php echo htmlspecialchars_decode(stripslashes($slide['slide_title'])); ?></h1>
                                <div class="sj-description">
                                    <p><?php echo htmlspecialchars_decode(stripslashes($slide['slide_desc'])); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div> -->
    <?php endif; ?>
    <!--
    <?php if(!empty($page_data)): ?>
    <div class="sj-haslayout sj-welcomegreetingsection sj-sectionspace">
        <div class="container">
            <div class="row">
                
                <div class="sj-welcomegreeting">
                    <?php if(!empty($welcome_slide_unSerialize_array)): ?>
                        <div class="col-12 col-sm-12 col-md-5 col-lg-5 sj-verticalmiddle">
                            <div id="sj-welcomeimgslider" class="sj-welcomeimgslider sj-welcomeslider owl-carousel">
                                <?php $__currentLoopData = $welcome_slide_unSerialize_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <figure class="sj-welcomeimg item">
                                        <img src="<?php echo e(asset('uploads/settings/welcome_slider/'.$slide['welcome_slide_image'])); ?>" alt="<?php echo e(trans('prs.img_desc')); ?>">
                                    </figure>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-12 col-sm-12 col-md-7 col-lg-7 sj-verticalmiddle float-right">
                        <div class="sj-welcomecontent">
                            <div class="sj-welcomehead">
                                <span><?php echo e($page_data->sub_title); ?></span>
                                <h2><?php echo e($page_data->title); ?></h2>
                            </div>
                            <div class="sj-description">
                                <?php echo str_limit(htmlspecialchars_decode(stripslashes($welcome_desc)), 300) ?>
                            </div>
                            <div class="sj-btnarea">
                                <a class="sj-btn" href="<?php echo e(url('/page/'.$page_data->slug.'/')); ?>"><?php echo e(trans('prs.btn_read_more')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
    <?php endif; ?>
    -->
    </div>
<?php if(Schema::hasTable('users')): ?>
                <?php echo $__env->make('includes.rightside-menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>