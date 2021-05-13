# TODO

## 7 February 2021 
+ make seeds for test data
+ install a frontend, vue, bootstrap
- install vuex, vue-Sortable
- create tree vue component based on vue-Sortable
- configure vue-router to display the selected page in a tree-view component

- create uri generation
- create logging of moved pages

```html
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="logoutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ Auth::user()->name }}
    </a>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="logoutDropdown">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="dropdown-item" type="submit">{{ __('Logout') }}</button>
        </form>
    </div>
</li>
```

## 9 April 2021

- aliases for jest and ts
- tree
  - give away tree to frontend throught middleware
  - make buttons on tree leaves
  - create handlers for moving tree elements
- make frontend routing 
- upload on test server

## Sanctum with socialite
<https://bipinmhz.medium.com/sanctum-with-socialite-api-authentication-via-social-networks-in-laravel-8-624cb1737e8>
