
<?php $__env->startSection('title'); ?><?php echo e(config('app.name')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description', 'This is description tag'); ?>
<?php $__env->startSection('content'); ?>
    <?php if(Session::has('payment_message')): ?>
        <?php $response = Session::get('payment_message') ?>
        <div class="toast-holder">
            <div id="toast-container">
                <div class="alert toast-<?php echo e($response['code']); ?> alart-message alert-dismissible fade show fixed_message">
                    <div class="toas`t-message">
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
        
                <div class="row">
                <div style="margin: 0;
                        padding-top: 0;
                        font-weight: normal;
                        border: none;
                        font-family: Georgia, 'Times New Roman', Times, serif;
                        font-size: 1.6em;
                        text-shadow: 1px 1px 3px #000; ">A Propos</div> 
                <div class="h4 pb-2 mb-4 text-dark border-bottom border-dark" style="position: flex; width: 100%;"></div>
                <div class="sj-widgetcontent">
                    <h3>International Journal of Computer Engineering(IJCE)</h3>
                <p>International Journal of Computer Engineering(IJCE), ISSN 2088-8708, e-ISSN 2722-2578 is an official publication of the Institute of Advanced Engineering and Science (IAES). The IJECE is an international open access refereed journal that has been published online since 2011. The IJECE is open to submission from scholars and experts in the wide areas of electrical, electronics, instrumentation, control, telecommunication and computer engineering from the global world, and publishes reviews, original research articles, and short communications. This journal is indexed and abstracted by SCOPUS (Elsevier), SCImago Journal Rank (SJR), and in Top Databases and Universities. Now, this journal has SNIP: 0.688; SJR: 0.376; CiteScore: 3.2; Q2 on Computer Science and Q3 on Electrical & Electronics Engineering). Our aim is to provide an international forum for scientists and engineers to share research and ideas, and to promote the crucial field of electrical & power engineering, circuits & electronics, power electronics & drives, automation, instrumentation & control engineering, digital Signal, image & video processing, telecommunication system & technology, computer science & information technology, internet of things, big data & cloud computing, and artificial intelligence & soft computing.
                IJECE uses a rolling submission process, allowing authors to submit at any time during the year without time restraints.</p>
                </div>
                
                    
            </div>
            <div class="row">
                <div style="margin: 0;
                        padding-top: 0;
                        font-weight: normal;
                        border: none;
                        font-family: Georgia, 'Times New Roman', Times, serif;
                        font-size: 1.6em;
                        text-shadow: 1px 1px 3px #000; ">Announcements</div> 
                <div class="h4 pb-2 mb-4 text-dark border-bottom border-dark" style="position: flex; width: 100%;"></div>
                <div class="sj-widgetcontent">
                <h3>IJCE does not accept any papers suggestion from conference organizers</h3>
 
                 <p>   Dear Sir/Madam,</p>

                <p>    Due to huge regular papers submission, we apologize that our journal does not accept any papers suggestion from other conference organizers. We sincerely apologize for any inconvenience. Critical suggestions are welcome for improvement of the contents and journal policies.</p>

                  <p>  Your attention and cooperation is very highly appreciated.</p>

                  <p>  Best Regards,</p>
                   <p> IJECE Editorial Office
                </p>
                </div>
                <div class="h4 pb-2 mb-4 text-dark border-bottom border-dark" style="position: flex; width: 100%;"></div>
                    
            </div>
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
    <div id="sj-twocolumns" class="sj-twocolumns">
        <div class="container">
            <div class="row">
                <?php if(!empty($published_articles)): ?>
                    <div class="col-12 col-sm-12 col-md-8 col-lg-9">
                        <div id="sj-content" class="sj-content">
                            <section class="sj-haslayout sj-sectioninnerspace">

                                    <div style="margin: 0;
                        padding-top: 0;
                        font-weight: normal;
                        border: none;
                        font-family: Georgia, 'Times New Roman', Times, serif;
                        font-size: 1.6em;
                        text-shadow: 1px 1px 3px #000; ">Articles</div> 
                    
                                   
                                
                            
                                <div id="sj-editorchoiceslider" class="sj-editorchoiceslider sj-editorschoice">
                                    <?php if(!empty($published_articles)): ?>
                                        <?php $__currentLoopData = $published_articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $edition_image = App\Helper::getEditionImage($article->edition_id,'medium') ;?>
                                            <article class="sj-post sj-editorchoice">
                                                <?php if(!empty($edition_image)): ?>
                                                    <figure class="sj-postimg">
                                                        <img src="<?php echo e(asset($edition_image)); ?>" alt="<?php echo e(trans('prs.article_img')); ?>">
                                                    </figure>
                                                <?php endif; ?>
                                                <div class="sj-postcontent">
                                                    <div class="sj-head">
                                                        <span class="sj-username"><?php echo e(App\User::getUserNameByID($article->corresponding_author_id)); ?></span>
                                                        <h3><a href="<?php echo e(url('article/'.$article->slug)); ?>"><?php echo e($article->title); ?></a></h3>
                                                    </div>
                                                    <div class="sj-description">
                                                        <?php echo str_limit($article->excerpt, 105); ?>
                                                    </div>
                                                    <a class="sj-btn" href="<?php echo e(url('article/'.$article->slug)); ?>"><?php echo e(trans('prs.btn_view_full_articles')); ?></a>
                                                </div>
                                            </article>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </section>
                        </div>
                    </div>
                    <!--
                    <div class="col-12 col-sm-12 col-md-4 col-lg-3">
                        <?php echo $__env->make('includes.widgetsidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                -->
                <?php endif; ?>
            </div>
        </div>
    </div>
    </div>
<?php if(Schema::hasTable('users')): ?>
                <?php echo $__env->make('includes.rightside-menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>