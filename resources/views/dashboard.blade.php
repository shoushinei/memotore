<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('認証中') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("ログイン成功！") }}
                </div>
            </div>
        </div>
    </div>

    <script>
        // 1秒後にリダイレクト
        setTimeout(function() {
            window.location.href = "{{ route('workoutlogs.index') }}";
        }, 1000);
    </script>
</x-app-layout>

