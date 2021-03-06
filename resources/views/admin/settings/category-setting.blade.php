@extends('master') 
@php $breadcrumbs = Breadcrumbs::generate('categorySetting'); @endphp 
@section('breadcrumbs') 
    @if (count($breadcrumbs))
        <ol class="sj-breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb) 
                @if ($breadcrumb->url && !$loop->last)
                    <li><a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a></li>
                @else
                    <li class="active">{{{ $breadcrumb->title }}}</li>
                @endif 
            @endforeach
        </ol>
    @endif
@endsection
@section('content') 
    @php $counter = 0; @endphp
    <div class="container">
        <div class="row">
            <div id="sj-twocolumns" class="sj-twocolumns">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-9 float-right" id="general_setting">
                    @if (Session::has('message'))
                        <div class="toast-holder">
                            <flash_messages :message="'{{{ Session::get('message') }}}'" :message_class="'success'" v-cloak></flash_messages>
                        </div>
                    @elseif (Session::has('error'))
                        <div class="toast-holder">
                            <flash_messages :message="'{{{ Session::get('error') }}}'" :message_class="'danger'" v-cloak></flash_messages>
                        </div>
                    @elseif ($errors->any())
                        <div class="toast-holder">
                            @foreach ($errors->all() as $error)
                                <flash_messages :message="'{{{$error}}}'" :message_class="'danger'" v-cloak></flash_messages>
                            @endforeach
                        </div>
                   @endif
                    <sticky_messages :message="this.message"></sticky_messages>
                    <div id="sj-contentvtwo" class="sj-content sj-addarticleholdcontent sj-addarticleholdvtwo">
                        <div class="sj-dashboardboxtitle sj-titlewithform">
                            <h2>{{{trans('prs.manage_category')}}}</h2>
                        </div>
                        <div class="sj-manageallsession">
                            <form class="sj-formtheme sj-managesessionform">
                                <fieldset>
                                    <div class="form-group">
                                        <a href="#" data-toggle="modal" data-target="#categoryModal" class="sj-btn sj-btnactive">
                                            {{{trans('prs.new_cat')}}}
                                        </a>
                                    </div>
                                </fieldset>
                            </form>
                            <ul class="sj-allcategorys">
                                @if($categories->count() > 0) 
                                    @foreach($categories as $category)
                                        <li class="sj-categorysinfo del-{{{$category->id}}}" v-bind:id="categoryID">
                                            <div class="sj-title">
                                                <h3>{{{ $category->title }}}</h3>
                                            </div>
                                            <div class="sj-categorysrightarea">
                                                @php 
                                                    $delete_title = trans("prs.ph_delete_confirm_title"); 
                                                    $delete_message = trans("prs.ph_category_delete_message");
                                                    $deleted = trans("prs.ph_delete_title"); 
                                                @endphp
                                                <a href="#" class="sj-pencilbtn" data-toggle="modal" data-target="#categoryEditModal-{{{$counter}}}">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                                <a href="#" v-on:click.prevent="deleteCategory($event,'{{{$delete_title}}}','{{{$delete_message}}}','{{{$deleted}}}')" class="sj-trashbtn" id="{{{ $category->id }}}">
                                                    <i class="ti-trash"></i>
                                                </a>
                                            </div>
                                        </li>
                                        <div class="sj-modalboxarea modal fade del-{{{$category->id}}}" tabindex="-1" role="dialog" 
                                            aria-labelledby="categoryEditModalLabel" aria-hidden="true" id="categoryEditModal-{{{$counter}}}">
                                            <div class="modal-dialog" role="document">
                                                <div class="sj-modalcontent modal-content cat-model">
                                                    <div class="sj-popuptitle">
                                                        <h2>{{{trans('prs.edit_cat')}}}</h2>
                                                        <a href="javascript;void(0);" class="sj-closebtn close">
                                                            <i class="lnr lnr-cross" data-dismiss="modal" aria-label="Close"></i>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        {!! Form::open(['url' => '/dashboard/general/settings/edit-category/'.$category->id,'class'=>'category_edit_form', 
                                                        'files' => true, 'enctype' => 'multipart/form-data']) !!}
                                                            <fieldset>
                                                                <div class="form-group">
                                                                    {!! Form::text('title', $category->title, ['class' => 'form-control', 'required' => 'required']) !!}
                                                                </div>
                                                                <div class="form-group">
                                                                    {!! Form::textarea('description', $category->description, ['class' => 'form-control', 'placeholder' => trans('prs.ph_cat_desc')]) !!}
                                                                </div>
                                                                <div class="form-group">
                                                                    <upload-files-field
                                                                        :field_title="this.uploadArticleTitle"
                                                                        :uploaded_file="'{{{App\UploadMedia::getImageName($category->image)}}}'"
                                                                        :hidden_field_name="'hidden_category_image'"
                                                                        :doc_id="edit_category +'{{$category->id}}'"
                                                                        :file_name="this.file_input_name"
                                                                        :file_placeholder="'{{trans("prs.ph_upload_file_label")}}'"
                                                                        :file_size_label="'{{trans("prs.ph_article_file_size")}}'"
                                                                        :file_uploaded_label="'{{trans("prs.ph_file_uploaded")}}'"
                                                                        :file_not_uploaded_label="'{{trans("prs.ph_file_not_uploaded")}}'">
                                                                    </upload-files-field>
                                                                </div>
                                                            </fieldset>
                                                            <div class="sj-popupbtn">
                                                                {!! Form::submit(trans('prs.btn_save'), ['class' => 'sj-btn sj-btnactive']) !!}
                                                            </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php $counter++; @endphp 
                                    @endforeach 
                                @else
                                    @include('errors.no-record') 
                                @endif
                            </ul>
                            <div class="sj-modalboxarea modal fade" id="categoryModal" tabindex="-1" role="dialog" 
                                aria-labelledby="categoryModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="sj-modalcontent modal-content cat-model">
                                        <div class="sj-popuptitle">
                                            <h2>{{{trans('prs.new_cat')}}}</h2>
                                            <a href="javascript;void(0);" class="sj-closebtn close">
                                                <i class="lnr lnr-cross" data-dismiss="modal" aria-label="Close"></i>
                                            </a>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::open(['url' => '/dashboard/general/settings/create-category','id'=>'group_form', 
                                            'enctype' => 'multipart/form-data', 'multiple' => true]) !!}
                                                <fieldset>
                                                    <div class="form-group">
                                                        {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('prs.ph_cat_title')]) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => trans('prs.ph_cat_desc')]) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <upload-files-field
                                                            :field_title="'{{trans("prs.ph_upload_file")}}'"
                                                            :doc_id="this.create_category"
                                                            :hidden_field_name="'hidden_category_image'"
                                                            :file_name="this.file_input_name"
                                                            :file_placeholder="'{{trans("prs.ph_upload_file_label")}}'"
                                                            :file_size_label="'{{trans("prs.ph_article_file_size")}}'"
                                                            :file_uploaded_label="'{{trans("prs.ph_file_uploaded")}}'"
                                                            :file_not_uploaded_label="'{{trans("prs.ph_file_not_uploaded")}}'" >
                                                        </upload-files-field>
                                                    </div>
                                                </fieldset>
                                                <div class="sj-popupbtn">
                                                    {!! Form::submit(trans('prs.btn_submit'), ['class' => 'sj-btn sj-btnactive']) !!}
                                                </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if( method_exists($categories,'links') ) {{{ $categories->links('pagination.custom') }}} @endif
                        </div>
                    </div>
                </div>
                @include('includes.side-menu')
            </div>
        </div>
    </div>
@endsection
