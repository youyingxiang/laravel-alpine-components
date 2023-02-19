@extends('alp::examples.layout')
@section('content')
    <div class="grid grid-cols-3 gap-4">
        <a href="{{ route('alp.examples.component', 'combobox') }}" class="focus:outline-none">
            <div class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400">
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-medium text-gray-900">combobox</p>
                </div>
            </div>
        </a>
        <a href="{{ route('alp.examples.component', 'remote-combobox') }}" class="focus:outline-none">
            <div class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400">
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-medium text-gray-900">remote-combobox</p>
                </div>
            </div>
        </a>
        <a href="{{ route('alp.examples.component', 'select') }}" class="focus:outline-none">
            <div class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400">
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-medium text-gray-900">select</p>
                </div>
            </div>
        </a>
    </div>
@endsection