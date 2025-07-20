
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
</head>
<header>
  <!-- navbar goes here -->
<nav class="bg-gray-100 max-w-screen-xl mx-auto">
  <div class="max-w-screen-xl mx-auto px-4">
    <div class="flex justify-between">

      <div class="flex space-x-4">
        <!-- logo -->
        <div>
          <a href="<?= base_url() ?>song" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
            <img class="h-7 w-7" src='<?= base_url() ?>assets/images/logo.png'>
          </a>
        </div>

        <!-- primary nav -->
        <div class="hidden md:flex items-center space-x-1">
          <a href="<?= base_url() ?>song" class="py-5 px-3 text-gray-700 hover:text-gray-900">Music</a>
          <a href="<?= base_url() ?>album" class="py-5 px-3 text-gray-700 hover:text-gray-900">Album</a>
          <a href="<?= base_url() ?>singer" class="py-5 px-3 text-gray-700 hover:text-gray-900">Artist</a>
        </div>
      </div>

      <div class="flex flex-row space-x-4">
        <div class="flex items-center space-x-1">
          <?php if (session()->has('email')) { ?>
        <a href="<?= base_url() ?>logout" class="py-5 px-3">Log Out</a>
           <?php }else{ ?>
        <a href="<?= base_url() ?>login" class="py-5 px-3">Login</a>
        <a href="<?= base_url() ?>signup" class="py-2 px-3 bg-yellow-400 hover:bg-yellow-300 text-yellow-900 hover:text-yellow-800 rounded transition duration-300">Signup</a>
        <?php } ?>
      </div>

      <!-- mobile button goes here -->
      <div class="md:hidden flex items-center">
        <button class="mobile-menu-button">
          <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
      </div>
      

    </div>
  </div>

  <!-- mobile menu -->
  <div class="mobile-menu hidden md:hidden">
    <a href="<?= base_url() ?>song" class="block py-2 px-4 text-sm hover:bg-gray-200">Music</a>
    <a href="<?= base_url() ?>album" class="block py-2 px-4 text-sm hover:bg-gray-200">Album</a>
    <a href="<?= base_url() ?>singer" class="block py-2 px-4 text-sm hover:bg-gray-200">Artist</a>
  </div>
</nav>
</header>
<body>

<?= $this->renderSection('content') ?>

<script>
      // grab everything we need
      const btn = document.querySelector("button.mobile-menu-button");
      const menu = document.querySelector(".mobile-menu");

      // add event listeners
      btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
      });

    </script>
</body>
<footer class="bg-white">
    <div class="mx-auto w-full max-w-screen-xl p-4">
      <hr class="my-2 border-gray-200 sm:mx-auto" />
      <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-gray-500 sm:text-center ">© 2025 <span class="hover:underline">Evan Febrian</span>.
          </span>
          <div class="flex mt-4 sm:justify-center sm:mt-0">
              <a href="#" class="text-gray-500 hover:text-gray-900 ">
                  <!-- TO DO : ADD ICON -->
                  <span class="sr-only">Instagram Account</span>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900  ms-5">
                  <!-- TO DO : ADD ICON -->
                  <span class="sr-only">GitHub account</span>
              </a>
          </div>
      </div>
    </div>
</footer>
</html>
