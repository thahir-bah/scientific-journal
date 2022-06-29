 
<?php $breadcrumbs = Breadcrumbs::generate('categorySetting'); ?> 
<?php $__env->startSection('breadcrumbs'); ?> 
    <?php if(count($breadcrumbs)): ?>
        <ol class="sj-breadcrumb">
            <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <?php if($breadcrumb->url && !$loop->last): ?>
                    <li><a href="<?php echo e($breadcrumb->url); ?>"><?php echo e($breadcrumb->title); ?></a></li>
                <?php else: ?>
                    <li class="active"><?php echo e($breadcrumb->title); ?></li>
                <?php endif; ?> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?> 
    <?php $counter = 0; ?>
    <div class="container">
        <div class="row">
            <div id="sj-twocolumns" class="sj-twocolumns">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-9 float-right" id="general_setting">
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
                    <sticky_messages :message="this.message"></sticky_messages>
                    <div id="sj-contentvtwo" class="sj-content sj-addarticleholdcontent sj-addarticleholdvtwo">
                        <div class="sj-dashboardboxtitle sj-titlewithform">
                            <h2><?php echo e(trans('prs.manage_category')); ?></h2>
                        </div>
                        <div class="sj-manageallsession">
                            <form class="sj-formtheme sj-managesessionform">
                                <fieldset>
                                    <div class="form-group">
                                        <a href="#" data-toggle="modal" data-target="#categoryModal" class="sj-btn sj-btnactive">
                                            <?php echo e(trans('prs.new_cat')); ?>

                                        </a>
                                    </div>
                                </fieldset>
                            </form>
                            <ul class="sj-allcategorys">
                                <?php if($categories->count() > 0): ?> 
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="sj-categorysinfo del-<?php echo e($category->id); ?>" v-bind:id="categoryID">
                                            <div class="sj-title">
                                                <h3><?php echo e($category->title); ?></h3>
                                            </div>
                                            <div class="sj-categorysrightarea">
                                                <?php 
                                                    $delete_title = trans("prs.ph_delete_confirm_title"); 
                                                    $delete_message = trans("prs.ph_category_delete_message");
                                                    $deleted = trans("prs.ph_delete_title"); 
                                                ?>
                                                <a href="#" class="sj-pencilbtn" data-toggle="modal" data-target="#categoryEditModal-<?php echo e($counter); ?>">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                                <a href="#" v-on:click.prevent="deleteCategory($event,'<?php echo e($delete_title); ?>','<?php echo e($delete_message); ?>','<?php echo e($deleted); ?>')" class="sj-trashbtn" id="<?php echo e($category->id); ?>">
                                                    <i class="ti-trash"></i>
                                                </a>
                                            </div>
                                        </li>
                                        <div class="sj-modalboxarea modal fade del-<?php echo e($category->id); ?>" tabindex="-1" role="dialog" 
                                            aria-labelledby="categoryEditModalLabel" aria-hidden="true" id="categoryEditModal-<?php echo e($counter); ?>">
                                            <div class="modal-dialog" role="document">
                                                <div class="sj-modalcontent modal-content cat-model">
                                                    <div class="sj-popuptitle">
                                                        <h2><?php echo e(trans('prs.edit_cat')); ?></h2>
                                                        <a href="javascript;void(0);" class="sj-closebtn close">
                                                            <i class="lnr lnr-cross" data-dismiss="modal" aria-label="Close"></i>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo Form::open(['url' => '/dashboard/general/settings/edit-category/'.$category->id,'class'=>'category_edit_form', 
                                                        'files' => true, 'enctype' => 'multipart/form-data']); ?>

                                                            <fieldset>
                                                                <div class="form-group">
                                                                    <?php echo Form::text('title', $category->title, ['class' => 'form-control', 'required' => 'required']); ?>

                                                                </div>
                                                                <div class="form-group">
                                                                    <?php echo Form::textarea('description', $category->description, ['class' => 'form-control', 'placeholder' => trans('prs.ph_cat_desc')]); ?>

                                                                </div>
                                                                <div class="form-group">
                                                                    <upload-files-field
                                                                        :field_title="this.uploadArticleTitle"
                                                                        :uploaded_file="'<?php echo e(App\UploadMedia::getImageName($category->image)); ?>'"
                                                                        :hidden_field_name="'hidden_category_image'"
                                                                        :doc_id="edit_category +'<?php echo e($category->id); ?>'"
                                                                        :file_name="this.file_input_name"
                                                                        :file_placeholder="'<?php echo e(trans("prs.ph_upload_file_label")); ?>'"
                                                                        :file_size_label="'<?php echo e(trans("prs.ph_article_file_size")); ?>'"
                                                                        :file_uploaded_label="'<?php echo e(trans("prs.ph_file_uploaded")); ?>'"
                                                                        :file_not_uploaded_label="'<?php echo e(trans("prs.ph_file_not_uploaded")); ?>'">
                                                                    </upload-files-field>
                                                                </div>
                                                            </fieldset>
                                                            <div class="sj-popupbtn">
                                                                <?php echo Form::submit(trans('prs.btn_save'), ['class' => 'sj-btn sj-btnactive']); ?>

                                                            </div>
                                                        <?php echo Form::close(); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $counter++; ?> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                <?php else: ?>
                                    <?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
                                <?php endif; ?>
                            </ul>
                            <div class="sj-modalboxarea modal fade" id="categoryModal" tabindex="-1" role="dialog" 
                                aria-labelledby="categoryModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="sj-modalcontent modal-content cat-model">
                                        <div class="sj-popuptitle">
                                            <h2><?php echo e(trans('prs.new_cat')); ?></h2>
                                            <a href="javascript;void(0);" class="sj-closebtn close">
                                                <i class="lnr lnr-cross" data-dismiss="modal" aria-label="Close"></i>
                                            </a>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo Form::open(['url' => '/dashboard/general/settings/create-category','id'=>'group_form', 
                                            'enctype' => 'multipart/form-data', 'multiple' => true]); ?>

                                                <fieldset>
                                                    <div class="form-group">
                                                        <?php echo Form::text('title', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('prs.ph_cat_title')]); ?>

                                                    </div>
                                                    <div class="form-group">
                                                        <?php echo Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => trans('prs.ph_cat_desc')]); ?>

                                                    </div>
                                                    <div class="form-group">
                                                        <upload-files-field
                                                            :field_title="'<?php echo e(trans("prs.ph_upload_file")); ?>'"
                                                            :doc_id="this.create_category"
                                                            :hidden_field_name="'hidden_category_image'"
                                                            :file_name="this.file_input_name"
                                                            :file_placeholder="'<?php echo e(trans("prs.ph_upload_file_label")); ?>'"
                                                            :file_size_label="'<?php echo e(trans("prs.ph_article_file_size")); ?>'"
                                                            :file_uploaded_label="'<?php echo e(trans("prs.ph_file_uploaded")); ?>'"
                                                            :file_not_uploaded_label="'<?php echo e(trans("prs.ph_file_not_uploaded")); ?>'" >
                                                        </upload-files-field>
                                                    </div>
                                                </fieldset>
                                                <div class="sj-popupbtn">
                                                    <?php echo Form::submit(trans('prs.btn_submit'), ['class' => 'sj-btn sj-btnactive']); ?>

                                                </div>
                                            <?php echo Form::close(); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if( method_exists($categories,'links') ): ?> <?php echo e($categories->links('pagination.custom')); ?> <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php echo $__env->make('includes.side-menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>