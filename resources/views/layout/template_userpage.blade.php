<section>
    <div class="container" id="user">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Dashboard</h5>
                    </div>
                    <div class="card-body user-navigation">
                        <ul>
                            <li><a href="#" class="link">Profile</a></li>
                            <li><a href="#" class="link">History</a></li>
                            <li><a href="{{ url('logout') }}" class="link">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                @yield('user')
            </div>
        </div>
    </div>
</section>