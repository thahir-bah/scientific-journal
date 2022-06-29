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
                        text-shadow: 1px 1px 3px #000; ">International Journal of Computer Engineering(IJCE)</div> 
                <div class="h4 pb-2 mb-4 text-dark border-bottom border-dark" style="position: flex; width: 100%;"></div>
                <div class="sj-widgetcontent">
                <p>International Journal of Computer Engineering(IJCE), ISSN 2088-8708, e-ISSN 2722-2578 is an official publication of the Institute of Advanced Engineering and Science (IAES). The IJECE is an international open access refereed journal that has been published online since 2011. The IJECE is open to submission from scholars and experts in the wide areas of electrical, electronics, instrumentation, control, telecommunication and computer engineering from the global world, and publishes reviews, original research articles, and short communications. This journal is indexed and abstracted by SCOPUS (Elsevier), SCImago Journal Rank (SJR), and in Top Databases and Universities. Now, this journal has SNIP: 0.688; SJR: 0.376; CiteScore: 3.2; Q2 on Computer Science and Q3 on Electrical & Electronics Engineering). Our aim is to provide an international forum for scientists and engineers to share research and ideas, and to promote the crucial field of electrical & power engineering, circuits & electronics, power electronics & drives, automation, instrumentation & control engineering, digital Signal, image & video processing, telecommunication system & technology, computer science & information technology, internet of things, big data & cloud computing, and artificial intelligence & soft computing.
                IJECE uses a rolling submission process, allowing authors to submit at any time during the year without time restraints.</p>
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

