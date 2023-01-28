
<nav
class="relative z-0 w-screen"
x-data="{open:false,menu:false, lokasi:false}">
  <div class="relative z-10 bg-yellow-300 shadow">
    <div class="px-2 mx-auto max-w-7xl sm:px-4 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <div class="flex items-center px-2 lg:px-0">
          <a class="flex-shrink-0" href="#">
            <img class="block w-16 h-12 lg:hidden" src="https://imlovefood.com/wp-content/themes/mypanganthema/img/logo_small.png" alt="Logo">
            <img class="hidden w-auto h-12 lg:block" src="https://imlovefood.com/wp-content/themes/mypanganthema/img/logo_small_gray.png" alt="Logo">
          </a>
          <div class="hidden lg:block lg:ml-2">
            <div class="flex">
              <a href="#" class="px-3 py-2 ml-4 text-sm font-medium lg:font-semibold leading-5 text-gray-800 transition duration-150 ease-in-out rounded-md cursor-pointer hover:bg-yellow-500 hover:text-white focus:outline-none focus:text-white focus:bg-gray-700 "> Location </a>
              <a href="#" class="px-3 py-2 ml-4 text-sm font-medium lg:font-semibold leading-5 text-gray-800 transition duration-150 ease-in-out rounded-md cursor-pointer hover:bg-yellow-500 hover:text-white focus:outline-none focus:text-white focus:bg-gray-700 "> Article </a>
              <a href="#" class="px-3 py-2 ml-4 text-sm font-medium lg:font-semibold leading-5 text-gray-800 transition duration-150 ease-in-out rounded-md cursor-pointer hover:bg-yellow-500 hover:text-white focus:outline-none focus:text-white focus:bg-gray-700 "> Recipe </a>
              <a href="#" class="px-3 py-2 ml-4 text-sm font-medium lg:font-semibold leading-5 text-gray-800 transition duration-150 ease-in-out rounded-md cursor-pointer hover:bg-yellow-500 hover:text-white focus:outline-none focus:text-white focus:bg-gray-700 "> Promo </a>
            </div>
          </div>
        </div>
        <div class="flex justify-center flex-1 px-2 lg:ml-6 lg:justify-end">
          <div class="w-full max-w-lg lg:max-w-xs">
            <label for="search" class="sr-only">Search </label>
            <form methode="get" action="#" class="relative z-50">
              <button type="submit" id="searchsubmit" class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
              </button>
              <input type="text" name="s" id="s" class="block w-full py-2 pl-10 pr-3 leading-5 text-gray-300 placeholder-gray-400 transition duration-150 ease-in-out bg-yellow-200 border border-transparent rounded-md focus:outline-none focus:bg-white focus:text-gray-900 sm:text-sm" placeholder="Search">
            </form>
          </div>
        </div>
        <div class="flex lg:hidden">
          <button @click="menu=!menu" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white" aria-label="Main menu" aria-expanded="false">
            <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div x-show="menu" class="block md:hidden">
      <div class="px-2 pt-2 pb-3">
        <a href="#" class="block px-3 py-2 mt-1 font-medium lg:font-semibold text-white transition duration-150 ease-in-out rounded-md hover:bg-yellow-500 focus:outline-none focus:text-white focus:bg-gray-700">Location </a>
        <a href="#" class="block px-3 py-2 mt-1 font-medium lg:font-semibold text-white transition duration-150 ease-in-out rounded-md hover:bg-yellow-500 focus:outline-none focus:text-white focus:bg-gray-700">Article </a>
        <a href="#" class="block px-3 py-2 mt-1 font-medium lg:font-semibold text-white transition duration-150 ease-in-out rounded-md hover:bg-yellow-500 focus:outline-none focus:text-white focus:bg-gray-700">Recipe </a>
        <a href="#" class="block px-3 py-2 mt-1 font-medium lg:font-semibold text-white transition duration-150 ease-in-out rounded-md hover:bg-yellow-500 focus:outline-none focus:text-white focus:bg-gray-700">Promo </a>
      </div>
    </div>
  </div>
</nav>
