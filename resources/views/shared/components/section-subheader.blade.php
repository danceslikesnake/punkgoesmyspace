<div class="section-subheader level is-flex-touch">
    <div class="level-left is-flex-touch">
        <div class="level-item">
            <img src="{{ asset('img/blue-picks-logo.svg') }}" class="blue-picks-logo" alt="Blue Picks Logo" />
            <h1>{{ $title }}</h1>
        </div>
    </div>
    <div class="level-right is-flex-touch">
        <div class="level-item">
            <div class="has-text-right">
                {{ $slot  }}
            </div>
        </div>
    </div>
</div>