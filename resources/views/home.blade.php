@extends('base')

@section('content')



        <!--=================== Hero ====================-->
        
            @include('mine.hero')
        <!--=================== About ====================-->
            @include('mine.about')
        <!--=================== Qualification ====================-->
       
            @include('mine.qualification')

           
        <!--=================== Services (simplified for backend focus) ====================-->

            @include('mine.services')
        <!--=================== Projects ====================-->

            @include('mine.projects')

        <!--=================== Contact ====================-->
            @include('mine.contact')
  
@endsection