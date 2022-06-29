
<?php $breadcrumbs = Breadcrumbs::generate('editorArticleDetail', $article,$user_role,$user_id, $article->status,$slug); ?>
<?php $__env->startSection('breadcrumbs'); ?>
    <?php if(count($breadcrumbs)): ?>
        <ol class="sj-breadcrumb">
            <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($breadcrumb->url && !$loop->last): ?>
                    <li>
                        <a href="<?php echo e($breadcrumb->url); ?>">
                        <?php if($breadcrumb->title == "Home"): ?>
                            <?php echo e($breadcrumb->title); ?>

                        <?php else: ?>
                            <?php echo e(App\Helper::displayArticleBreadcrumbsTitle($breadcrumb->title)); ?>

                        <?php endif; ?>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="active"><?php echo e($breadcrumb->title); ?></li>
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
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-9 float-right" id="article_detail">
                    <?php if(Session::has('error')): ?>
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
                            <h2><?php echo e($article->title); ?></h2>
                        </div>
                        <ul id="accordion" class="sj-articledetails sj-articledetailsvtwo">
                            <?php
                                $category = App\Category::getCategoryByID($article->article_category_id);
                                $author = App\User::getUserDataByID($article->corresponding_author_id);
                            ?>
                            <li class="sj-articleheader">
                                <div class="sj-detailstime">
                                    <span><i class="ti-calendar"></i><?php echo e(Carbon\Carbon::parse($article->updated_at)->format('d-m-Y')); ?></span>
                                    <?php if(!empty($category)): ?>
                                        <span><i class="ti-layers"></i><?php echo e($category->title); ?></span>
                                    <?php endif; ?>
                                    <span><i class="ti-bookmark"></i><?php echo e(trans('prs.id')); ?>: <?php echo e($article->unique_code); ?></span>
                                    <span><i class="ti-bookmark-alt"></i><?php echo e(trans('prs.edition')); ?></span>
                                </div>
                                <div class="sj-nameandmail">
                                    <span><?php echo e(trans('prs.corresponding_author')); ?></span>
                                    <h4><?php echo e($author->name); ?></h4>
                                    <span class="sj-mailinfo"><?php echo e($author->email); ?></span>
                                </div>
                            </li>
                            <li class="sj-userinfohold sj-active">
                                <div class="sj-userinfoimgname">
                                    <figure class="sj-userinfimg">
                                        <img src="<?php echo e(asset(App\Helper::getUserImage($article->corresponding_author_id, $author->user_image, 'medium'))); ?>" alt="<?php echo e(trans('prs.user_img')); ?>">
                                    </figure>
                                    <div class="sj-userinfoname">
                                        <span><?php echo e(Carbon\Carbon::parse($article->created_at)->diffForHumans()); ?> <?php echo e(trans('prs.on')); ?> <?php echo e(Carbon\Carbon::parse($article->created_at)->format('l \\a\\t H:i:s')); ?></span>
                                        <h3><?php echo e($article->title); ?></h3>
                                    </div>
                                    <div class="sj-description">
                                        <?php echo e($article->excerpt); ?>

                                    </div>
                                    <div class="sj-downloadheader">
                                        <div class="sj-title">
                                            <h3><?php echo e(trans('prs.attached_doc')); ?></h3>
                                            <a href="<?php echo e(route('getfile', $article->submitted_document)); ?>"><i class="lnr lnr-download"></i><?php echo e(trans('prs.btn_download')); ?></a>
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
                                <?php $comments = App\Article::getArticleComments($article->id,'reviewer'); ?>
                                <?php if(!empty($comments)): ?>
                                <div class="sj-feedbacktitle">
                                    <h2><?php echo e(trans('prs.reviewer_feedback')); ?></h2>
                                </div>
                                <div id="subaccordion" class="sj-statusholder">
                                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div id="subheadingOne-<?php echo e($comment->id); ?>" class="sj-statusheaderholder sj-statuspadding" data-toggle="collapse"
                                            data-target="#subcollapseOne-<?php echo e($comment->id); ?>" aria-expanded="true" aria-controls="subcollapseOne-<?php echo e($comment->id); ?>" role="button">
                                            <div class="sj-reviewer-acronym">
                                                <span><?php echo e(App\Helper::getAcronym($comment->name)); ?></span>
                                            </div>
                                            <div class="sj-statusheader">
                                                <div class="sj-statusasidetitle">
                                                    <span><?php echo e(Carbon\Carbon::parse($comment->created_at)->format('F j, Y')); ?></span>
                                                    <h4><?php echo e($comment->name); ?></h4>
                                                </div>
                                                <div class="sj-statusasidetitle sj-statusasidetitlevtwo">
                                                    <span><?php echo e(trans('prs.status')); ?></span>
                                                    <h4>
                                                        <?php if($comment->status != "articles_under_review"): ?>
                                                            <?php echo e(App\Helper::displayReviewerCommentStatus($comment->status)); ?>

                                                        <?php endif; ?>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="subcollapseOne-<?php echo e($comment->id); ?>" class="sj-statusdescription collapse sj-active"
                                            aria-labelledby="subheadingOne-<?php echo e($comment->id); ?>" data-parent="#subaccordion">
                                            <div class="sj-description">
                                                <?php echo e($comment->comment); ?>

                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php endif; ?>
                                <?php if($article->status != "accepted_articles"): ?>
                                    <div class="sj-dashboardboxtitle sj-titlewithform">
                                        <h2><?php echo e(trans('prs.assign_reviewer')); ?></h2>
                                        <div class="provider-site-wrap" v-show="loading" v-cloak>
                                            <div class="provider-loader">
                                                <div class="bounce1"></div>
                                                <div class="bounce2"></div>
                                                <div class="bounce3"></div>
                                            </div>
                                        </div>
                                        <sticky_messages :message="this.success_message"></sticky_messages>
                                    </div>
                                    <?php if($existed_categories->count() > 0 && !empty($existed_reviewers)): ?>
                                        <?php echo Form::open(['url' => url('/'.$user_role.'/dashboard/assign-reviewer'), 'id' => 'assign_reviewer_article', 'class'=>'sj-formtheme sj-categorydetails', 'enctype' => 'multipart/form-data', '@submit.prevent' => 'assign_reviewer_article']); ?>

                                            <fieldset>
                                                <div class="form-group">
                                                    <span class="sj-select">
                                                        <select data-placeholder=" <?php echo e(($reviewers_categories->count() > 0) ? trans('prs.choose_reviewer') : trans('prs.assign_cat_reviewer')); ?> "
                                                            multiple class="chosen-select" name="reviewers[]">
                                                            <?php $count = 0; ?>
                                                            <?php $__currentLoopData = $reviewers_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $reviewers = App\User::getReviewersByCategory($category->id);
                                                                    $reviewersID = App\Article::getReviewerIdByArticle($article->id);
                                                                ?>
                                                                <optgroup label="<?php echo e($category->title); ?>">
                                                                    <?php $__currentLoopData = $reviewers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reviewer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($reviewer->id); ?>" <?php echo e(in_array($reviewer->id, $article_reviewers ) ? 'selected' : ''); ?> ><?php echo e($reviewer->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </optgroup>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <input type="hidden" name="reviewer_article" value="<?php echo e($article->id); ?>">
                                                    </span>
                                                </div>
                                                <div class="sj-popupbtn">
                                                    <input type="submit" class="sj-btn sj-btnactive" value="<?php echo e(trans('prs.btn_assign')); ?>">
                                                </div>
                                            </fieldset>
                                        <?php echo Form::close(); ?>

                                    <?php elseif($existed_categories->count() == 0 && !empty($existed_reviewers)): ?>
                                        <?php echo Form::open(['url' => url('/'.$user_role.'/dashboard/assign-reviewer'), 'id' => 'assign_reviewer_article',
                                        'class'=>'sj-formtheme sj-categorydetails', 'enctype' => 'multipart/form-data', '@submit.prevent' => 'assign_reviewer_article']); ?>

                                            <fieldset>
                                                <div class="form-group">
                                                    <span class="sj-select">
                                                        <select data-placeholder="<?php echo e(trans('prs.choose_reviewer')); ?>" multiple class="chosen-select" name="reviewers[]">
                                                            <?php $count = 0; ?>
                                                            <?php $__currentLoopData = $existed_reviewers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reviewers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($reviewers->id); ?>" <?php echo e(in_array($reviewers->id, $article_reviewers ) ? 'selected' : ''); ?> >
                                                                    <?php echo e($reviewers->name); ?> <?php echo e($reviewers->sur_name); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    <input type="hidden" name="reviewer_article" value="<?php echo e($article->id); ?>">
                                                    </span>
                                                </div>
                                                <div class="sj-popupbtn">
                                                    <input type="submit" class="sj-btn sj-btnactive" value="<?php echo e(trans('prs.btn_assign')); ?>">
                                                </div>
                                            </fieldset>
                                        <?php echo Form::close(); ?>

                                    <?php else: ?>
                                        <div class="form-group">
                                            <input type="text" value="<?php echo e(trans('prs.add_reviewers')); ?>" class="form-control" readonly>
                                        </div>
                                    <?php endif; ?>
                                    <?php echo Form::open(['url' => url('submit-editor-feedback/'.$article->id), 'class'=>'sj-formtheme sj-formsearchvthree','id'=>'admin_feedback']); ?>

                                        <fieldset>
                                            <div class="sj-dashboardboxtitle sj-titlewithform"><h2><?php echo e(trans('prs.reply_revision')); ?></h2></div>
                                            <div class="form-group sj-firstformgroup">
                                                <span class="sj-select">
                                                    <?php echo Form::select('status', array(
                                                        'accepted_articles' => trans('prs.accept_article'),
                                                        'minor_revisions' => trans('prs.minor_revision'),
                                                        'major_revisions'=>trans('prs.major_revision'),
                                                        'rejected' => trans('prs.reject_article'),
                                                        null)); ?>

                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <?php echo Form::textarea('comments', null, ['class' => 'form-control', 'placeholder' => trans('prs.ph_add_feedback')]); ?>

                                            </div>
                                            <?php echo Form::hidden('article', $article->id); ?>

                                        </fieldset>
                                        <div class="sj-popupbtn sj-popupbtnvtwo">
                                            <?php echo Form::submit(trans('prs.btn_submit'), ['class' => 'sj-btn sj-btnactive','v-on:click' => 'showloading']); ?>

                                        </div>
                                    <?php echo Form::close(); ?>

                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>