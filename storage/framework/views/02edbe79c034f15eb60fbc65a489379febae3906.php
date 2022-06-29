
<?php $breadcrumbs = Breadcrumbs::generate('authorArticles',$user_id,$status); ?>
<?php $__env->startSection('breadcrumbs'); ?>
    <?php if(count($breadcrumbs)): ?>
        <ol class="sj-breadcrumb">
            <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($breadcrumb->url && !$loop->last): ?>
                    <li><a href="<?php echo e($breadcrumb->url); ?>"><?php echo e($breadcrumb->title); ?></a></li>
                <?php else: ?>
                    <li class="active"><?php echo e(App\Helper::displayArticleBreadcrumbsTitle($breadcrumb->title)); ?></li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div id="sj-twocolumns" class="sj-twocolumns">
                <?php echo $__env->make('includes.side-menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-9 float-right" id="author_article">
                    <?php if(Session::has('message')): ?>
                        <div class="toast-holder">
                            <flash_messages :message="'<?php echo e(Session::get('message')); ?>'" :message_class="'success'" v-cloak></flash_messages>
                        </div>
                    <?php elseif(Session::has('error')): ?>
                        <div class="toast-holder">
                            <flash_messages :message="'<?php echo e(Session::get('error')); ?>'" :message_class="'danger'" v-cloak></flash_messages>
                        </div>
                    <?php elseif($errors->any()): ?>
                        <div class="toast-holder">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <flash_messages :message="'<?php echo e($error); ?>'" :message_class="'danger'" v-cloak></flash_messages>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                <?php endif; ?>
                    <div id="sj-content" class="sj-content sj-addarticleholdcontent">
                        <div class="sj-dashboardboxtitle sj-titlewithform">
                            <h2><?php echo e($page_title); ?></h2>
                            <?php echo Form::open(['url' => url('author/user/'.$user_id.'/'.Request::segment(4).'/article-search'), 'method' => 'get', 'class' => 'sj-formtheme sj-formsearchvtwo']); ?>

                                <div class="sj-sortupdown">
                                    <a href="javascript:void(0);"><i class="fa fa-sort-amount-up"></i></a>
                                </div>
                                <fieldset>
                                    <input type="search" name="keyword" value="<?php echo e(!empty($_GET['keyword']) ? $_GET['keyword'] : ''); ?>" class="form-control" placeholder="<?php echo e(trans('prs.ph_search_here')); ?>">
                                    <button type="submit" class="sj-btnsearch"><i class="lnr lnr-magnifier"></i></button>
                                </fieldset>
                            <?php echo Form::close(); ?>

                        </div>
                        <ul id="accordion" class="sj-articledetails sj-articledetailsvtwo">
                            <?php if($articles->count() > 0): ?>
                                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $category = App\Category::getCategoryByID($article->article_category_id);
                                    $author = App\User::getUserDataByID($user_id);
                                ?>
                                <li v-on:click.prevent="author_notified($event)" id="headingOne-<?php echo e($article->id); ?>" class="sj-articleheader" data-toggle="collapse"
                                    data-target="#collapseOne-<?php echo e($article->id); ?>" aria-expanded="true" aria-controls="collapseOne-<?php echo e($article->id); ?>">
                                    <div class="sj-detailstime">
                                        <?php if($article->author_notify == 1): ?>
                                        <span class="notify-icon" v-if="notified"><i class="fas fa-comment"></i></span> <?php endif; ?>
                                        <span><i class="ti-calendar"></i><?php echo e(Carbon\Carbon::parse($article->created_at)->format('d-m-Y')); ?></span>                                <?php if(!empty($category->title)): ?>
                                        <span><i class="ti-layers"></i><?php echo e($category->title); ?></span> <?php endif; ?>
                                        <span><i class="ti-bookmark"></i>ID: <?php echo e($article->unique_code); ?></span>
                                        <h4><?php echo e($article->title); ?></h4>
                                    </div>
                                    <div class="sj-nameandmail">
                                        <span><?php echo e(trans('prs.corresponding_author')); ?></span>
                                        <h4><?php echo e($author->name); ?></h4>
                                        <span class="sj-mailinfo"><?php echo e($author->email); ?></span>
                                    </div>
                                </li>
                                <li id="collapseOne-<?php echo e($article->id); ?>" class="collapse sj-active sj-userinfohold" aria-labelledby="headingOne-<?php echo e($article->id); ?>" data-parent="#accordion">
                                    <div class="sj-userinfoimgname">
                                        <figure class="sj-userinfimg">
                                            <img src="<?php echo e(asset(App\Helper::getUserImage($article->corresponding_author_id, $author->user_image, 'medium'))); ?>" alt="<?php echo e(trans('prs.user_img')); ?>">
                                        </figure>
                                        <div class="sj-userinfoname">
                                            <span>
                                                <?php echo e(Carbon\Carbon::parse($article->created_at)->diffForHumans()); ?> on <?php echo e(Carbon\Carbon::parse($article->created_at)->format('l \\a\\t H:i:s')); ?>

                                            </span>
                                            <h3><?php echo e($article->title); ?></h3>
                                        </div>
                                        <?php if($article->status == "minor_revisions" || $article->status == "major_revisions"): ?>
                                            <?php $article_input_id = 'article_input_'.$article->id ?>
                                            <?php echo Form::open(['url' => 'author/resubmit-article', 'enctype' => 'multipart/form-data',
                                            'multiple' => true, 'class' => 'total-fields sj-formtheme sj-formarticle']); ?>

                                                <upload-files-field
                                                    :doc_id="'<?php echo e($article_input_id); ?>'"
                                                    :file_name="this.file_input_name"
                                                    :file_placeholder="'<?php echo e(trans("prs.ph_upload_file_label")); ?>'"
                                                    :file_size_label="'<?php echo e(trans("prs.ph_article_file_size")); ?>'"
                                                    :file_uploaded_label="'<?php echo e(trans("prs.ph_file_uploaded")); ?>'"
                                                    :file_not_uploaded_label="'<?php echo e(trans("prs.ph_file_not_uploaded")); ?>'" >
                                                </upload-files-field>
                                                <?php echo Form::hidden('article_id', $article->id); ?>

                                                <?php echo Form::submit(trans('prs.btn_submit'), ['class' => 'sj-btn sj-btnactive']); ?>

                                            <?php echo Form::close(); ?>

                                        <?php endif; ?>
                                        <div class="sj-description">
                                            <?php echo e(htmlspecialchars_decode(stripslashes($article->excerpt))); ?>

                                        </div>
                                        <div class="sj-downloadheader">
                                            <div class="sj-title">
                                                <h3><?php echo e(trans('prs.attached_doc')); ?></h3>
                                                <a href="<?php echo e(route('getfile', $article->submitted_document)); ?>">
                                                    <i class="lnr lnr-download"></i><?php echo e(trans('prs.btn_download')); ?>

                                                </a>
                                            </div>
                                            <div class="sj-docdetails">
                                                <figure class="sj-docimg">
                                                    <img src="<?php echo e(asset('images/thumbnails/doc-img.jpg')); ?>" alt="<?php echo e(trans('prs.doc_img')); ?>">
                                                </figure>
                                                <div class="sj-docdescription">
                                                    <h4><?php echo e(App\Article::getArticleFullName($article->submitted_document)); ?></h4>
                                                    <span>
                                                        <?php echo e(trans('prs.file_size')); ?>

                                                        <?php echo e(App\UploadMedia::getArticleSize($article->corresponding_author_id,$article->submitted_document)); ?>

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $comments = App\Article::getAdminArticleFeedbacks($article->id, $article->status); ?>
                                    <?php if(!empty($comments)): ?>
                                        <div class="sj-feedbacktitle">
                                            <h2><?php echo e(trans('prs.feedback')); ?></h2>
                                        </div>
                                        <div id="subaccordion" class="sj-statusholder">
                                            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div id="subheadingOne-<?php echo e($comment->id); ?>" class="sj-statusheaderholder sj-statuspadding"
                                                    data-toggle="collapse" data-target="#subcollapseOne-<?php echo e($comment->id); ?>" aria-expanded="true"
                                                    aria-controls="subcollapseOne-<?php echo e($comment->id); ?>" role="button">
                                                    <div class="sj-reviewer-acronym">
                                                        <span><?php echo e(App\Helper::getAcronym($comment->name)); ?></span>
                                                    </div>
                                                    <div class="sj-statusheader">
                                                        <div class="sj-statusasidetitle">
                                                            <span><?php echo e(Carbon\Carbon::parse($comment->created_at)->format('F j, Y')); ?></span>
                                                            <h4><?php echo e($comment->name); ?></h4>
                                                            <p><?php echo e($comment->role_type); ?></p>
                                                        </div>
                                                        <div class="sj-statusasidetitle sj-statusasidetitlevtwo">
                                                            <span>Status</span>
                                                            <h4><?php if($comment->status != "articles_under_review" ): ?> <?php echo e(App\Helper::displayReviewerCommentStatus($comment->status)); ?> <?php endif; ?></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="subcollapseOne-<?php echo e($comment->id); ?>" class="sj-statusdescription collapse sj-active" aria-labelledby="subheadingOne-<?php echo e($comment->id); ?>" data-parent="#subaccordion">
                                                    <div class="sj-description">
                                                        <?php echo e($comment->comment); ?>

                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php endif; ?>
                        </ul>
                        <?php if( method_exists($articles,'links') ): ?>
                            <?php echo e($articles->links('pagination.custom')); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>