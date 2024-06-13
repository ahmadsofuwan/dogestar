<div class="w-full">
    <div class="w-full text-center text-4xl font-black">History</div>
    <div class="grid grid-cols-2 gap-2 text-center ">
        <div id="hgeneral" class="border-b-4 border-solid border-green-500">General</div>
        <div id="hstake" class="">Stake</div>
    </div>
    <div class="grid grid-cols-1 gap-2 text-center mt-5 font-semibold" id="general">
        @foreach ($logs as $log)
        <div class="grid grid-cols-4 gap-2">
            <span class="truncate">{{ $log->users->username }}</span>
            <span class="{{ Str::contains($log->value,'-')?'text-red-500':'text-green-500' }}">{{ $log->value }}</span>
            <span>{{ $log->note }}</span>
            <span>{{ $log->created_at }}</span>
        </div>
        @endforeach
    </div>
    <div class="grid grid-cols-1 gap-2 text-center mt-5 font-semibold" id="stake" style="display: none">
        @foreach ($logstakes as $logs)
        <div class="grid grid-cols-4 gap-2">
            <span>{{ $logs->target->username}}</span>
            <span class="{{ Str::contains($logs->value,'-')?'text-red-500':'text-green-500' }}">{{ $logs->value }}</span>
            <span>{{ $logs->note }}</span>
            <span>{{ $logs->created_at }}</span>
        </div>
        @endforeach
    </div>
</div>