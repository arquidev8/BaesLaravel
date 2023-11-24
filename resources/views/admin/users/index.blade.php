
<script src="https://cdn.tailwindcss.com"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="container px-4 mx-auto mt-6 bg-white rounded-md shadow-md dark:bg-gray-800">
        <div class="flex flex-col my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Name') }}</th>

                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Email') }}</th>

                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Phone') }}</th>

                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Referral Email') }}</th>

                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Is Admin') }}</th>

                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Approved') }}</th>

                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">{{ __('Change Approval Status') }}</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                            @foreach ($users as $user)
                                <tr class="{{ $loop->even ? 'bg-gray-50 dark:bg-gray-800' : '' }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->name }}</td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->phone }}</td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->referral_email }}</td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->is_admin ? __('Yes') : __('No') }}</td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                            <form action="{{ route('users.changeApprovalStatus', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">

                                                <input type="checkbox" name="approved" id="approved{{ $user->id }}" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" {{ $user->approved ? 'checked' : '' }}>

                                                <label for="approved{{ $user->id }}" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>

                                                <button type="submit" class="absolute inset-0 w-full h-full z-20"></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>