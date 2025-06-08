<div class="flex items-center flex-row {{ request()->routeIs('filament.admin.auth.login') ? 'mb-8' : '' }}">
  <img src="{{ storage_url(setting('site.navbar_logo')) }}" alt="Logo Light" class="inline-block dark:hidden {{ request()->routeIs('filament.admin.auth.login') ? 'h-36' : 'h-12' }}">
  <img src="{{ storage_url(setting('site.navbar_logo')) }}" alt="Logo Dark" class="hidden dark:inline-block">
</div>
