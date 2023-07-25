@extends('layouts.layout')

@section('title')
    EventSync - Synchronize and Manage Events with Ease
@endsection

@section('content')
    @include('components.navbar')

    {{-- animated section --}}
    <div class="my-8 text-center text-5xl leading-snug font-bold font-mono">
        <p>The Platform to</p>
        <div class="h-[67px] overflow-hidden">
            <span class="relative animate-textChange">
                <span style="color:#4DAF00">Start</span>🔥<br>
                <span style="color:#0091BF">Manage</span>⚡️<br>
                <span style="color:#FF8515">Scale</span>🚀<br>
                <span style="color:#C03AFF">Automate</span>🤩<br>
            </span>
        </div>
        <p>your splendid Events</p>
    </div>
@endsection
