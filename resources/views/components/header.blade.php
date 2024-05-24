<header class="bg-white shadow">
  <div class="container mx-auto px-4 py-6 flex justify-between items-center">
      <a href="/" class="text-xl font-semibold text-gray-800">E-Commerce</a>
      <nav>
          <ul class="flex space-x-4">
              <li><a href="/" class="text-gray-800 hover:text-gray-600">Home</a></li>
              <li><a href="#about" class="text-gray-800 hover:text-gray-600">About</a></li>
              <li><a href="#contact" class="text-gray-800 hover:text-gray-600">Contact</a></li>
          </ul>
      </nav>
      <div class="flex items-center space-x-4">
          <!-- Cart -->
          @auth

              <a href="/profile">{{ auth()->user()->name }}</a>

          @else
            <a href="/login" class="text-gray-800 hover:text-gray-600">
                Log In
            </a>
            <!-- Profile -->
            <a href="/register" class="text-gray-800 hover:text-gray-600">
                Register
            </a>
          @endauth
      </div>
  </div>
</header>