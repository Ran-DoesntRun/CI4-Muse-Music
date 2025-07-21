<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOG IN</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
</head>
<body>
  <div class="w-full max-w-lg flex flex-col bg-teal-300 mt-4 mx-auto space-y-2 pb-5 shadow items-center">
  <img class=" size-40" src='<?= base_url() ?>assets/images/logo.png'>
  <form action="<?= base_url() ?>admin/login/auth" class="w-full flex flex-col" method="post">
    <label for="email" class="ml-10 font-semibold">EMAIL</label>
    <input type="email" name="email" id="email" placeholder="email" class="mx-10 shadow px-3 py-0.5 bg-white">
    <label for="password" class="ml-10 font-semibold mt-4">PASSWORD</label>
    <input type="password" name="password" id="password" placeholder="password" class="mx-10 shadow px-3 py-0.5 bg-white">
    <input type="submit" value="LOGIN" class="mx-10 shadow text-center bg-emerald-100 mt-5 rounded-sm py-1">
  </form></div>
</body>
</html>
