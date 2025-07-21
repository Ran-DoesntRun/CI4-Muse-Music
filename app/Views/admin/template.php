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
<nav class=" bg-teal-500 max-w-screen-xl mx-auto rounded-md font-semibold">
  <div class="max-w-screen-xl mx-auto px-4">
    <div class="flex justify-between">

      <div class="flex space-x-4">
        <!-- logo -->
        <div>
          <a href="<?= base_url() ?>admin/songs" class="flex items-center py-5 px-2 text-white hover:text-blue-950">
            <img class="h-7 w-7" src='<?= base_url() ?>assets/images/logo.png'>
          </a>
        </div>

        <!-- primary nav -->
        <div class="hidden md:flex items-center space-x-1">
          <a href="<?= base_url() ?>admin/songs" class="py-5 px-3 text-black hover:text-blue-950">Music</a>
          <a href="<?= base_url() ?>admin/albums" class="py-5 px-3 text-black hover:text-blue-950">Album</a>
          <a href="<?= base_url() ?>admin/artists" class="py-5 px-3 text-black hover:text-blue-950">Artist</a>
          <?php if(session()->get('type') == "administrator") { ?>
          <a href="<?= base_url() ?>admin/register" class="py-5 px-3 text-black hover:text-blue-950">Add Admin</a>
          <?php } ?>
        </div>
      </div>

      <div class="flex flex-row space-x-4">
        <div class="flex items-center space-x-1">
        <a href="<?= base_url() ?>admin/logout" class="py-5 px-3">Log Out</a>
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
    <a href="<?= base_url() ?>admin/songs" class="block py-2 px-4 text-sm hover:bg-gray-200">Music</a>
    <a href="<?= base_url() ?>admin/albums" class="block py-2 px-4 text-sm hover:bg-gray-200">Album</a>
    <a href="<?= base_url() ?>admin/artists" class="block py-2 px-4 text-sm hover:bg-gray-200">Artist</a>
    <?php if(session()->get('type') == "administrator") { ?>
          <a href="<?= base_url() ?>admin/register" class="block py-2 px-4 text-sm hover:bg-gray-200">Add Admin</a>
          <?php } ?>
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
<footer class="bg-white w-full max-w-screen-xl mx-auto">
    <div class="mx-auto w-full max-w-screen-xl p-4">
      <hr class="my-2 border-gray-200 sm:mx-auto" />
      <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-gray-500 sm:text-center ">© 2025 <span class="hover:underline">Evan Febrian</span>.
          </span>
          <div class="flex mt-4 sm:justify-center sm:mt-0">
              <a href="#" class="text-gray-500 hover:text-blue-950 ">
                  <!-- TO DO : ADD ICON -->
                  <span class="sr-only">Instagram Account</span>
              </a>
              <a href="#" class="text-gray-500 hover:text-blue-950  ms-5">
                  <!-- TO DO : ADD ICON -->
                  <span class="sr-only">GitHub account</span>
              </a>
          </div>
      </div>
    </div>
</footer>
</html>
