@extends('layouts.app')
@section('meta')
	@parent
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

    <div class="block content-top content-area orders-table " >
        <div class="columns">
            <div class="column is-3">
                <h1><i class="fi flaticon-commerce"></i>&nbsp;Total Students <span class="ordersCount"> {{$students->total()}}</span></h1>
            </div>
            <div class="column is-6">
                <div class="search-box">
                    <input type="text" class="input" id="search" name="search" placeholder="Type Class Room,Teachers Name , Students Name ,Gender or Year" style="height: 50px;">
                </div>
            </div>
            <div class="column">
                <a href="{{url('/students/create')}}">
                    <button class="button is-success is-pulled-right"><i class="fas fa-plus"></i>&nbsp;Add Students</button>
                </a>
            </div>
        </div>
    </div>


            <div class="block content-area orders-table" style="margin-top: 0;">
                <div class="columns">
                    <div class="column is-12 ">
                        <div class="content is-fluid">

                            @if(Session::has('success'))
                                <div class="notification is-warning" data-bulma="notification" data-dismiss-interval="30000">
                                    <button class="delete"></button>
                                    {{Session::get('success')}}
                                </div>
                            @endif

                            @if(Session::has('error'))
                                <div class="notification is-danger" data-bulma="notification" data-dismiss-interval="30000">
                                    <button class="delete"></button>
                                    {{Session::get('error')}}
                                </div>
                            @endif

                            <div class="tb is-active" data-content="4">
                               <div class="orders_container table__wrapper">
                                     @include('students.presult')
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


    <script type="text/javascript">

        $('#search').on('keyup',function(e){
            e.preventDefault();

            $('#general-content').append('<div style="position: absolute;background: rgba(247, 247, 247, 0.85);z-index: 99999999;width: 100%;height: 100%;top: 0;"><div style="position: absolute;left: 45%; top: 35%; z-index: 100000;" class="preloader-spinner">♥</div></div>');

            $value=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{route('Students.Search')}}',

                data:{'search':$value},
                success:function(data){
                    $('.orders_container').html(data);
                }

            });
        });

        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                }else{
                    getData(page);
                }
            }
        });

        $(document).ready(function()
        {
            $(document).on('click', '.pagination a',function(event)
            {
                event.preventDefault();
                $('#general-content').append('<div style="position: absolute;background: rgba(247, 247, 247, 0.85);z-index: 99999999;width: 100%;height: 100%;top: 0;"><div style="position: absolute;left: 45%; top: 35%; z-index: 100000;" class="preloader-spinner"></div></div>');
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                var myurl = $(this).attr('href');
                var page=$(this).attr('href').split('page=')[1];
                var page2=$(this).attr('href').split('aId=')[1];
                getData(myurl);
            });
        });
        function getData(myurl){
            $.ajax(
                {
                    url: myurl,
                    type: "get",
                    datatype: "html"
                })
                .done(function(data)
                {
                    $(".orders_container").html(data);

                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                {
                    alert('No response from server');
                }
            );
        }

	</script>

@endsection


