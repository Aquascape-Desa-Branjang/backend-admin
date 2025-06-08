<div class="flex items-center flex-row {{ request()->routeIs('filament.admin.auth.login') ? 'mb-8' : '' }}">
  <img src="{{ storage_url(setting('site.navbar_logo')) }}" alt="Logo Light" class="inline-block dark:hidden" style="height:42px">
  <img src="{{ storage_url(setting('site.navbar_logo')) }}" alt="Logo Dark" class="hidden dark:inline-block" style="height:42px">
</div>
