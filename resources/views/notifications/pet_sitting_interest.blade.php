<!-- resources/views/notifications/pet_sitting_interest.blade.php -->

<div class="notification">
    <p>{{ $notification->data['user_name'] }} is interested in pet sitting for {{ $notification->data['pet_name'] }}</p>
    <p>Date: {{ $notification->created_at->format('Y-m-d H:i:s') }}</p>
</div>
