@extends('master')
@section('title'){{ config('app.name') }} @stop
@section('description', 'This is description tag')
@section('content')
    
    
    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-9 float-left ">
    <div id="sj-twocolumns" class="sj-twocolumns">
        <div class="container">
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
                   <p> IJCE Editorial Office
                </p>
                </div>
                <div class="h4 pb-2 mb-4 text-dark border-bottom border-dark" style="position: flex; width: 100%;"></div>
                    
            </div>
             <!--
                    <div class="col-12 col-sm-12 col-md-4 col-lg-3">
                        @include('includes.widgetsidebar')
                    </div>
                -->
            </div>
        </div>
</div>
@if(Schema::hasTable('users'))
                @include('includes.rightside-menu') 
@endif
@endsection

