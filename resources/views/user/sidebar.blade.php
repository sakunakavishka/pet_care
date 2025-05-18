<!-- Sidebar -->
<div class="sidebar">
    <h4 class="text-white text-center">Pet Care user</h4>
    <hr>
    <a href="{{ route('notifications.index') }}"><i class="fas fa-bell me-2"> Notifications</i></a>
    <a href="{{ route('pets') }}"><i class="fas fa-book me-2"> Pets</i></a>
    <a href="{{ route('schedule.index') }}"><i class="fas fa-home me-2"> Shedules</i></a>
    <a href="{{ route('health_records.index') }}"><i class="fas fa-home me-2">Health Records</i> </a>
    <a href="{{ route('supplies.index') }}"><i class="fas fa-home me-2">Supply management</i> </a>
    <a href="{{ route('community.index') }}"><i class="fas fa-home me-2">Community</i> </a>
    <a href="{{ route('shopnow') }}"><i class="fas fa-home me-2">Shop Now</i> </a>

    <hr>
    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
        @csrf
        <li class="nav-item">
            <button type="submit" class="fas fa-book me-2" style="border:none; padding:0; background:none; color:red;">
                Log Out
            </button>
        </li>
    </form>
</div>

