@extends('alp::examples.layout')
@section('content')
    <div class="grid grid-cols-1 gap-4">
        <div class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400">
            <div class="min-w-0 flex-1">
                <a href="{{ route('alp.examples.component', 'combobox') }}" class="focus:outline-none">
                    <p class="text-sm font-medium text-gray-900">combobox</p>
                </a>
            </div>
        </div>
    </div>
@endsection