
@extends('layouts')

@section('header')
    @parent
    header
@stop

@section('sidebar')
    sidebar
@stop

@section('content')
    content

    <!-- 1.模版中输出php变量 -->
    <p>{{$name}}</p>
    <!-- 2.模版中调用PHP代码 -->
    <p>{{time()}}</p>
    <p>{{date('Y-m-d H:i:s',time())}}</p>
    <p>{{in_array($name, $arr) ? 'true' : 'false'}}</p>
    <p>{{var_dump($arr)}}</p>
    <p>{{isset($name) ? $name : 'default'}}</p>
    <p>{{$name or 'default'}}</p>
    <!-- 3.原样输出 -->
    <p>@{{$name}}</p>
    {{--4.模版中的注释--}}

    {{--5.引入子视图--}}
    @include('student.common1',['message' => 'is success'])


    @if($name == 'JaCa')
        I'm JaCa
    @elseif($name == 'other')
        Who are you?
    @endif

    @if(in_array($name, $arr))
        True
    @else
        False
    @endif

    @unless( !$name == 'JaCa')
        I'm JaCa
    @endunless

    {{--@for($i = 0; $i < 10; $i++)--}}
        {{--<p>{{$i}}</p>--}}
    {{--@endfor--}}
    <br>
    @foreach($students as $student)
        <p>{{$student->name}}</p>
    @endforeach

    {{--@forelse($student as $students)--}}
        {{--{{var_dump($student)}}--}}
    {{--@empty--}}
        {{--null-->--}}
    {{--@endforelse--}}

    <a href="{{url('url')}}">url()</a>
    <a href="{{action('StudentController@urlTest')}}">action()</a>
    <a href="{{route('url')}}">route()</a>
@stop

