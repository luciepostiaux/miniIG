<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#395922] dark:bg-[#E9F2EB] border border-transparent rounded-md font-semibold text-xs text-white dark:text-[#395922] uppercase tracking-widest hover:bg-[#6C8C6E] dark:hover:bg-white focus:bg-[#6C8C6E] dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-[#395922] transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
